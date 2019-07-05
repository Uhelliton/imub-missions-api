<?php

namespace IGestao\Units\Auth\Http\Controllers;
use Illuminate\Http\Request;
use IGestao\Support\Http\Controllers\Controller;
use IGestao\Domains\User\Repositories\Contracts\UserInterface;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    /*
     * @var  $userRepository
     * @type instace class
     */
    protected $userRepository;


    /**
     * Injeta as dependencias da classe
     *
     * @param UserInterface $userRepository
     */
    public function __construct(UserInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }


    /**
     * Responsavel para efetivar a autenticacao na api via jwt
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->only(['email', 'password']);
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json([
                    'success' => false,
                    'error' => 'Não podemos encontrar uma conta com essas credenciais.'
                ], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['success' => false, 'error' => 'Falha ao fazer o login, por favor, tente novamente.'], 500);
        }

        return $this->response200(['user' => $this->getUserAuthenticate(), 'token' => $token]);
    }


    /**
     * @return \IGestao\Support\Contracts\Repositories\Model
     */
    public function getUserAuthenticate()
    {
        $userId = JWTAuth::user()->id;
        return $this->userRepository->find($userId);
    }

}