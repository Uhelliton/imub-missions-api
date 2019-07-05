<?php
namespace IGestao\Units\Core\Http\Traits;

trait ResponseTrait {


    /**
     * Resposta 200
     * indica que a solicitação do cliente foi aceita com sucesso.
     *
     * @param array $data
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function response200($data = array('*'), string $message = 'Registro solicitado com sucesso')
    {
        return response()->json([
            'data'     => $data,
            'success'  => true,
        ], 200);
    }

    /**
     * Resposta 200
     * indica que a solicitação do cliente foi aceita com sucesso.
     *
     * @param array $data
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function responseResourceEmpty($data = array(), string $message = 'Registro solicitado com sucesso')
    {
        return response()->json([
            'data'     => $data,
            'success'  => false,
        ], 200);
    }


    /**
     * Retorno registro retornado com sucesso, porem vazio
     *
     * @param array $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function response200Empty($data = array('*'))
    {
        return response()->json($data, 200);
    }


    /**
     * Resposta 201
     * responde com o código de status 201 sempre que um recurso é criado dentro de uma coleção
     *
     * @param array $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function response201($data = array('*'))
    {
        return response()->json([
            'success'  => true,
            'data'     => $data,
        ], 201);
    }


    /**
     * Resposta 401
     * Indica qua a solicitacao nao foi autorizada
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function response401()
    {
        return response()->json([
            'status'  =>  'unauthorized',
            'message' =>  'Não autorizado',
        ], 401) ;
    }



    /**
     * Retorno registro nao encontrado
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function response404()
    {
        return response()->json([
            'success'   => false,
            'message'   => 'Registro não encontrado'
        ], 404);
    }



    /**
     * Retorno Erro interno do servidor
     *
     * @param array $error
     * @return \Illuminate\Http\JsonResponse
     */
    protected function response500($error = array('*'))
    {
        return response()->json([
            'success'   => false,
            'message'   => 'Erro interno do servidor',
            'error'     => $error,
        ], 500);
    }

}