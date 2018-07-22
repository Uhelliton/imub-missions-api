<?php

namespace Yago\Modules\User\Http\Controllers;

use Illuminate\Http\Request;
use Yago\Modules\User\Http\Requests\UserValidator;
use Yago\Support\Http\Controllers\Controller;
use Sentinel;
use Cartalyst\Sentinel\Roles\IlluminateRoleRepository;
use Yago\Support\Services\ImageManageService;
use Illuminate\Database\DatabaseManager;
use Yago\Modules\User\Services\UserService;

class UserController extends Controller
{
    /*
      * @var  $aclRoleRepository
      * @type instace class repository
      */
    protected $aclRoleRepository;

    /*
     * @var  $intervention, Image
     * @type instace class
     */
    protected  $imageManagerService;

    /*
    * @var  $userService
    * @type instace class services
    */
    protected  $userService;

    /*
     * @var  $dbManager
     * @type instace class
     */
    protected $dbManager;



    /**
     * Injeta as dependencias da classe
     *
     * @param IlluminateRoleRepository $role
     * @param ImageManageService $image
     * @param UserService $userService
     * @param DatabaseManager $database
     */
    public function __construct(IlluminateRoleRepository $role, ImageManageService $image, UserService $userService, DatabaseManager $database)
    {
        $this->aclRoleRepository = $role;
        $this->imageManagerService = $image;
        $this->userService = $userService;
        $this->dbManager = $database;
    }


    /**
     * Responsavel para exibir a view index
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userTypes =  $this->userService->getTypes()->data;
        $users = Sentinel::getUserRepository()->with('roles')->get();
        $roles = $this->aclRoleRepository->all();

        return view('user::index')->with( compact('users', 'roles', 'userTypes') );
    }


    /**
     * Resposavel para registrar um novo usuario
     * Etapas:
     * Registrar imagem caso exista
     * Registrar usuario
     *
     * @param Request $request
     * @param UserValidator $validator
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function store(Request $request, UserValidator $validator)
    {
        if ($request->file()) {
            $this->imageManagerService->setSize(100);
            $this->imageManagerService->setPath('uploads/adm/media/img/users');
            $thumb = $this->imageManagerService->store($request);
        }

        $this->dbManager->beginTransaction();
        try {
            $attributes = [
                'email'       => $request->get('email'),
                'password'    => $request->get('password'),
                'permissions' => ['admin' => true],
                'first_name'  => $request->get('firstName'),
                'last_name'   => $request->get('lastName'),
                'thumb'       => $thumb ?? ''
            ];

            $user = Sentinel::registerAndActivate($attributes);
            $role = Sentinel::findRoleById( $request->get('roleId') );
            $role->users()->attach($user);

            $insertUserGlobal = $this->userService->store( $request->all() );

            if ($insertUserGlobal->status == 'error') {
                $this->dbManager->rollback();
                session()->flash('error', 'O usuário não pode ser cadastrado, tente novamente');
                return redirect()->back();
            }

            $this->dbManager->commit();
            session()->flash('success', 'O usuário foi cadastrado com sucesso!');
            return redirect()->back();
        }
        catch (Exception $exception) {
            $this->dbManager->rollback();
            session()->flash('error', 'O usuário não pode ser cadastrado, tente novamente');
            return redirect()->back();
        }
    }


    /**
     * Exibi o formulário para editar um profile de um usuario
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $user = Sentinel::getUserRepository()->with('roles')->find($id);
        $roles = $this->aclRoleRepository->all();
        return view('user::profile')->with( compact('user', 'roles') );
    }


    /**
     * Responsavel para atualizar um usuario
     *
     * @param  Request  $request
     * @param  int     $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        if ($request->file()) {
            $this->imageManagerService->setSize(100);
            $this->imageManagerService->setPath('uploads/adm/media/img/users');
            $thumb = $this->imageManagerService->store($request);
        }

        try {
            $attributes = [
                'email'       => $request->get('email'),
                'first_name'  => $request->get('firstName'),
                'last_name'   => $request->get('lastName')
            ];
            if( $request->file() ) {
                $attributes = array_add($attributes, 'thumb', $thumb);
            }

            $user =  Sentinel::findById($id);
            $user->fill($attributes);
            $user->save();

            if ($this->verifyHasChangeRoleUser($id, $request->get('roleId'))) {
                $this->changeRoleByUserId($id, $request->get('roleId'));
            }

            $this->dbManager->commit();

            session()->flash('success', 'O usuário foi alterado com sucesso!');
            return redirect()->back();
        }
        catch (Exception $exception) {
            $this->dbManager->rollback();

            session()->flash('error', 'O usuário não pode ser alterado, tente novamente');
            return redirect()->back();
        }
    }


    /**
     * Altera o nivel de acesso de um usuario expecifico
     *
     * @param int $userId
     * @param int $roleId
     */
    public function changeRoleByUserId(int $userId, int $roleId)
    {
        $user = Sentinel::getUserRepository()->with('roles')->find($userId);
        $currentUserRoleId = $user->roles[0]->id;

        $roleDetach = Sentinel::findRoleById( $currentUserRoleId );
        $roleDetach->users()->detach($user);

        $roleAttach = Sentinel::findRoleById( $roleId );
        $roleAttach->users()->attach($user);
    }


    /**
     *  Verifica se o usuario solicitou a mudanca do nivel de acesso
     *
     * @param int $userId
     * @param int $roleId
     * @return bool
     */
    public function verifyHasChangeRoleUser(int $userId, int $roleId)
    {
        $user = Sentinel::getUserRepository()->with('roles')->find($userId);
        $currentUserRoleId = $user->roles[0]->id;

        if($currentUserRoleId != $roleId) {
            return true;
        }

        return false;
    }

    /***
     * Responsavel para alterar a senha de um usuario
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changePassword(Request $request, int $id)
    {
        $attributes = [
            'password' => $request->get('password')
        ];

        $user   = Sentinel::findById($id);
        $update = Sentinel::update($user, $attributes);

        session()->flash('success', 'A senha foi alterada com sucesso!');
        return redirect()->back();
    }

    /**
     * Resposável para remover um usuario
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {

    }

}
