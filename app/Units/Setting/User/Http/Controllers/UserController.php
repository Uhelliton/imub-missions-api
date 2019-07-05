<?php
namespace IGestao\Units\Setting\User\Http\Controllers;

use Illuminate\Http\Request;
use IGestao\Support\Http\Controllers\Controller;
use IGestao\Domains\User\Repositories\Contracts\UserInterface;
use Illuminate\Database\DatabaseManager;

class UserController extends Controller
{
    /*
     * @var  $pointSaleRepository
     * @type instace class
     */
    protected $userRepository;

    /*
     * @var  $dbManager
     * @type instace class
     */
    protected $dbManager;


    /**
     * Injeta as dependencias da classe
     *
     * @param UserInterface $userRepository
     * @param DatabaseManager $dbManager
     */
    public function __construct(UserInterface $userRepository, DatabaseManager $dbManager)
    {
        $this->userRepository = $userRepository;
        $this->dbManager = $dbManager;
    }


    /**
     * Responsável para listar todas os usuários
     *
     * @return \IGestao\Support\Contracts\Repositories\Collection
     */
    public function index() :Object
    {
        $users =  $this->userRepository->all();

        if ( array_is_empty($users->resource) )
            return $this->responseResourceEmpty();

        return $users;
    }


    /**
     * @param Request $request
     * @return Object
     * @throws \Exception
     */
    public function store(Request $request) :Object
    {
        $this->dbManager->beginTransaction();
        try {
            $attributesUser  = $this->setAttributesUser($request);
            $attributesUserRole  = $this->setAttributesUserRole($request);
            $attributesUserPointsale = $this->setAttributesUserPointSale($request);
            $user = $this->userRepository->createWithRalationship($attributesUser, $attributesUserRole, $attributesUserPointsale);

            $this->dbManager->commit();
            return $this->response201($user);
        }
        catch (Exception $exception) {
            $this->dbManager->rollBack();
            $errorMessage = [
                'message' => $exception->getMessage(),
                'line'    => $exception->getLine()
            ];
            $this->response500($errorMessage);
        }
    }


    /**
     * Reposável para retornar um usuário
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id) :Object
    {
        $user =  $this->userRepository->find($id);

        if ( !$user )
            return $this->responseResourceEmpty();

        return $this->response200($user);
    }


    /**
     * Seta os atributos do usário
     *
     * @param Request $request
     * @return Array
     */
    public function setAttributesUser(Request $request) :Array
    {
        $attributes = [
            'nome'      => $request->get('name'),
            'email'     => $request->get('email'),
            'password'  => bcrypt($request->get('password')),
        ];

        return $attributes;
    }

    /**
     * Seta os atributos para usario função
     *
     * @param Request $request
     * @return Array
     */
    public function setAttributesUserRole(Request $request) :Array
    {
        $attributes = [
            'funcao_id'  => $request->get('RoleId'),
        ];

        return $attributes;
    }

    /**
     * Seta os atributos usario ponto de vendas
     *
     * @param Request $request
     * @return Array
     */
    public function setAttributesUserPointSale(Request $request) :Array
    {
        foreach ($request->get('pointSales') as $value) {
            $attributes[] = [
                'ponto_venda_id'  => $value,
            ];
        }
        return $attributes ?? [];
    }

}