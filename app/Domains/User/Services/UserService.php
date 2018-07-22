<?php
namespace Yago\Modules\User\Services;

use Yago\Support\Services\ApiServiceRequest;

class UserService extends ApiServiceRequest
{
    /**
     * @const URI_PATH
     */
    const URI_PATH = 'users';

    /**
     * Responsavel para registrar um novo evento
     *
     * @param array $request
     * @return array
     */
    public function store(array $request)
    {
        $httpRequest = $this->post(self::URI_PATH, $request);
        return parse_object( $httpRequest );
    }

    /**
     * Responsavel para validar um usuario
     *
     * @see http://domain/api/users/types
     * @return array
     */
    public function getTypes()
    {
        $path = self::URI_PATH . '/types';
        $httpRequest = $this->get($path);
        return parse_object( $httpRequest );
    }
}