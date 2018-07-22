<?php
/*
|--------------------------------------------------------------------------
| RoutesFile
|--------------------------------------------------------------------------
|
| resposavel para criar as rotas da aplicacao
| modelo utlizar um padrao de rotas por classes
*/

namespace IGestao\Support\Http\Routing;


abstract class RoutesFile
{
    /*
     * @var  $options
     * @type array
     */
    protected $options;

    /*
     * @var  $router
     * \Illuminate\Routing\Router
     */
    protected $router;

    /**
     * RouteFile constructor.
     * @param array $options
     */
    public function __construct($options = [])
    {
        $this->options = $options;

        $this->router = app('router');
    }

    /*
     * Resposavel para registar as rotas criadas
     *
     */
    public function register()
    {
        $this->router->group($this->options, function (){
            $this->routes();
        });
    }

    /*
     * metodo herdado pela class filha para fornecer as rotas
     *
     * @return Mixed
     */
    abstract function routes();

}