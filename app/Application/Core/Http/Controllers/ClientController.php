<?php

namespace Latorre\Application\Core\Http\Controllers\Frontend;

use Illuminate\Support\Facades\Redirect;
use Latorre\Application\Core\Jobs\SendMailCustumerRegistration;
use Latorre\Support\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Latorre\Domains\Clients\Contracts\ClientRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    /*
     * @var  $clientRepository
     * @type instace class
     */
    protected  $clientRepository;



    /**
     * Reponsavel por inicializar  uma nova instância do controlador
     *
     * @param ClientRepositoryInterface $client
     */
    public function __construct(ClientRepositoryInterface $client)
    {
        $this->clientRepository = $client;
    }


    /**
     * Metodo responsavel para registrar  um novo cliente
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->validateRegisterNewClient( $request->all() );
        if ($validator->fails()) {
            return redirect()->to('identificacao/error')
                ->withErrors($validator)
                ->withInput();
        }

        $attributes = $request->except(['_token', 'password_confirm']);
        $insertClient = $this->clientRepository->create($attributes);

        if( $insertClient ) {
            $clientId = $insertClient->cod;
            dispatch( new SendMailCustumerRegistration( $clientId ) );
            $this->renderViewAnalyticsNewRegister($attributes);

            $credentials = ['email' => $request->get('email'), 'password' => $request->get('password')];
            if (Auth::guard('client')->attempt( $credentials )) {
                if( session()->has('sessionCartToken') ) {
                    return redirect()->intended('carrinho');
                }
                return redirect()->route('index-page');
            }
        }
    }


    /**
     * Responsavel para atualizar o usuário fornecido.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function updateRegister(Request $request, int $id)
    {
        $setAttributes = $request->except(['_token']);
        $update = $this->clientRepository->update($setAttributes, $id);

        if( $update ) {
            $request->session()->flash('success', 'Dados atualizados com sucesso!');
            return redirect()->to('/conta#registro');
        }
    }


    /**
     * Atualiza oa senha do usuairo fornecido
     *
     * @param  Request  $request
     * @param  string  $id
     * @return Response
     */
    public function updatePassword(Request $request, $id)
    {
        $formRequest = (object) $request->all();
        if( $this->validatePassword($formRequest, $id) ){

            $setAttributes = ['password' => $request->get('password_novo')];
            $update = $this->clientRepository->update($setAttributes, $id);

            if( $update ) {
                $request->session()->flash('success-password', 'Senha atualizada com sucesso!');
                return redirect()->to('/conta#senha');
            }
        }
        else{
            $request->session()->flash('error-password', 'A Senha digita não exitem em nosso sistema!');
            return redirect()->to('/conta#senha');
        }
    }


    /**
     * Verifica se a senha do cliente é uma senha valida no banco
     *
     * @param object $request
     * @param int $id
     * @return mixed
     */
    public function validatePassword($request, int $id) : bool
    {
        $credentials = ['cod' => $id, 'password' => $request->password];
        $validatePassword = \Auth::validate($credentials);

        return $validatePassword;
    }


    /**
     * informa ao analytic um novo registro de usuario
     *
     * @param $request
     */
    public function renderViewAnalyticsNewRegister($request)
    {
        $clientRequest = (object) $request;
        view('website::analytics.new-register-client')->with( compact('clientRequest') );
    }


    /**
     * informa ao analytic um novo registro de usuario
     *
     * @param $request
     * @return Redirect
     */
    public function validateRegisterNewClient($request)
    {
        $validator = Validator::make($request,
            [
                'nome'  => 'required',
                'email' => 'required|email|max:100|unique:clientes',
                'cpf  ' => 'max:11|unique:clientes',
                'pais'  => 'required',
                'password' => 'required|min:4'
            ]
        );
        return $validator;
    }


    /**
     * Método que remove a sessão de um usuário logado
     *
     * @return Response
     */
    public function logout()
    {
        \Auth::guard('client')->logout();
        return redirect('/');
    }

}
