<?php

namespace IGestao\Support\Services;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

abstract class ApiRequestService {

    /**
     * @var $clientHttpRequest
     * @type string
     */
    protected $clientHttpRequest;

    /*
     * @var  $clientHttp
     * @type instace class
     */
    protected $clientHttp;


    /**
     * @var $setUriBase
     * @type base url
     */
    protected $setUriBase;


    /**
     *
     */
    public function __construct()
    {
        $this->clientHttp = new Client(['base_uri' => $this->setUriBase]);
    }


    /**
     * Responsavel para gerar nova request para o servidor do tipo get
     *
     * @param string $uriPath
     * @return array
     */
    public function get(string $uriPath)
    {
        try {
            $this->clientHttpRequest = $this->clientHttp->get($uriPath, [
                'headers' => $this->setHeader(),
            ]);
            $response =  json_decode( $this->clientHttpRequest->getBody(), true );
        }
        catch (GuzzleException $e){
            return [
                'error' => $e->getMessage(),
                'line'  => $e->getLine(),
                'code'  => $e->getCode(),
                'message'   => 'Sem conexão com a API!'
            ];
        }

        return $response;
    }


    /**
     * Responsavel para gerar nova request para o servidor do tipo post
     *
     * @param string $uriPath
     * @param array $data
     * @return array
     */
    public function post(string $uriPath, array $data)
    {
        try {
            $this->clientHttpRequest = $this->clientHttp->post($uriPath, [
                'headers' => $this->setHeader(),
                'form_params' => $data
            ]);
            $response =  json_decode( $this->clientHttpRequest->getBody(), true );
        }
        catch (GuzzleException $e){
            return [
                'error' => $e->getMessage(),
                'line'  => $e->getLine(),
                'code'  => $e->getCode(),
                'message'   => 'Erro conexão com a API!'
            ];
        }

        return $response;
    }


    /**
     * Responsavel para gerar nova request para o servidor do tipo update <patch>
     *
     * @param string $uriPath
     * @return array
     */
    public function patch(string $uriPath)
    {
        try {
            $this->clientHttpRequest = $this->clientHttp->patch($uriPath, [
                'headers' => $this->setHeader()
            ]);
            $response =  json_decode( $this->clientHttpRequest->getBody(), true );
        }
        catch (GuzzleException $e){
            return [
                'error'    => $e->getMessage(),
                'line'     => $e->getLine(),
                'code'     => $e->getCode(),
                'message'  => 'Erro conexão com a API!'
            ];
        }

        return $response;
    }


    /**
     * Responsavel para gerar nova request para o servidor do tipo update <put>
     *
     * @param string $uriPath
     * @param array $data
     * @return array
     */
    public function put(string $uriPath, array $data)
    {
        try {
            $this->clientHttpRequest = $this->clientHttp->put($uriPath, [
                'headers' => $this->setHeader(),
                'form_params' => $data
            ]);
            $response =  json_decode( $this->clientHttpRequest->getBody(), true );
        }
        catch (GuzzleException $e){
            return [
                'error'   => $e->getMessage(),
                'line'    => $e->getLine(),
                'code'    => $e->getCode(),
                'message' => 'Erro conexão com a API!'
            ];
        }

        return $response;
    }

    /**
     * Responsavel para gerar nova request para o servidor do tipo delete
     *
     * @param string $uriPath
     * @return array
     */
    public function delete(string $uriPath)
    {
        try {
            $this->clientHttpRequest = $this->clientHttp->delete($uriPath, [
                'headers' => $this->setHeader()
            ]);
            $response =  json_decode( $this->clientHttpRequest->getBody(), true );
        }
        catch (GuzzleException $e){
            return [
                'error'   => $e->getMessage(),
                'line'    => $e->getLine(),
                'code'    => $e->getCode(),
                'message' => 'Erro conexão com a API!'
            ];
        }

        return $response;
    }


    /**
     * Seta o header do cabecalho para as requesicoes
     *
     * @return array
     */
    public function setHeader()
    {
        return [
            'Content-Type'  => 'application/x-www-form-urlencoded'
        ];
    }

}