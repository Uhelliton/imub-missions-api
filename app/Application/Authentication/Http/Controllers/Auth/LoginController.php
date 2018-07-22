<?php

namespace IGestao\Application\Authentication\Http\Controllers\Auth;

use IGestao\Support\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | Este controlador lida com usuários de autenticação para o aplicativo e
    | Redirecionando-os para a sua tela inicial
    |
    |
    */

    /*
     * @var  $cartService
     * @type instace class
     */
    protected  $cartService;

    /*
     * @var  $mailService
     * @type instace service
     */
    protected $mailService;

    /*
     * @var  $clientRepository
     * @type instace repository
     */
    protected $clientRepository;


    /**
     * @methd __construct
     * Reponsavel por inicializar  uma nova instância do controlador
     *
     * @param BookingCartService $cart
     */
    public function __construct(BookingCartService $cart)
    {
        $this->cartService = $cart;
    }



    /**
     * Métoodo que faz a autenticação de usuário na aplicacao
     * Apos o usuario autenticado, verifica se o mesmo possui um token do carrinho
     * e vincula o carrinho se o mesmo possuir algum item
     *
     * @param Request $request
     * @return Redirect
     */
    public function authenticate(Request $request)
    {
        $request = (object) $request->only(['email_cpf', 'password']);
        $credentials = $this->setCredentials($request);

        if ( Auth::guard('client')->attempt( $credentials )) {
            if( session()->has('sessionCartToken') ) {
                if( !$this->cartService->checkIfCartHasAssociateCustomer()  ){
                    $clientId = auth()->guard('client')->user()->cod;
                    $this->cartService->associateCartWithCustomer( $clientId );
                }
            }
            return redirect()->intended('carrinho');
        }
        else {
            session()->flash('error','Usuário e Senha não conferem!');
            return redirect()->back()->withInput();
        }
    }


    /**
     * Seta as credencias para o tipo de acesso via email ou cpf
     *
     * @param $request
     * @return array
     */
    public function setCredentials($request) : array
    {
        if( filter_var($request->email_cpf, FILTER_VALIDATE_EMAIL)){
            $credentials = [
                'email'    => $request->email_cpf,
                'password' => $request->password,
            ];
        }
        else {
            $credentials = [
                'cpf'      => $request->email_cpf,
                'password' => $request->password,
            ];
        }
        return $credentials;
    }

}
