<?php
namespace IGestao\Units\Setting\User\Http\Controllers;

use Illuminate\Http\Request;
use IGestao\Support\Http\Controllers\Controller;
use IGestao\Domains\User\Repositories\Contracts\RoleInterface;

class RoleController extends Controller
{
    /*
     * @var  $roleRepository
     * @type instace class
     */
    protected $roleRepository;


    /**
     * Injeta as dependencias da classe
     *
     * @param RoleInterface $roleRepository
     */
    public function __construct(RoleInterface $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }


    /**
     * Responsável para listar todas as funções de usuários
     *
     * @return \IGestao\Support\Contracts\Repositories\Collection
     */
    public function index()
    {
        $roles =  $this->roleRepository->all();

        if ( array_is_empty($roles->resource) )
            return $this->responseResourceEmpty();

        return $roles;
    }

}