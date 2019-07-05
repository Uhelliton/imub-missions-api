<?php
namespace IGestao\Units\Auditing\Http\Controllers;

use Illuminate\Http\Request;
use IGestao\Support\Http\Controllers\Controller;
use IGestao\Domains\Auditing\Repositories\Contracts\LogAccessInterface;

class LogAccessController extends Controller
{
    /*
     * @var  $logAccessRepository
     * @type instace class
     */
    protected $logAccessRepository;


    /**
     * Injeta as dependencias da classe
     *
     * @param LogAccessInterface $logAccess
     */
    public function __construct(LogAccessInterface $logAccess)
    {
        $this->logAccessRepository = $logAccess;
    }


    /**
     * Responsável para listar todos os logs de acesso
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $log =  $this->logAccessRepository->all();

        if ( array_is_empty($log->resource) )
            $this->response404();

        return $this->response200($log);
    }



    /**
     * Responsalve para registrar um novo log de acesso
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $attributes = $this->setAttribues($request);
        $log = $this->logAccessRepository->create($attributes);

        if ( !$log )
            $this->response500();

        return $this->response201($log);
    }



    /**
     *
     *
     * @param Request $request
     * @return array
     */
    private function setAttribues(Request $request)
    {
        $attributes = [
            'url'                => $request->get('route'),
            'endereco_ip'        => $request->ip(),
            'agente_usuario'     => $request->header('User-Agent'),
            'hospede_reserva_id' => $request->get('guestBookingId'),
            'tipo_acesso_id'     => $request->get('typeAccessId'),
        ];

        return $attributes;
    }

}