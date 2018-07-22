<?php
namespace Yago\Modules\User\Services;

use Yago\Support\Services\ApiServiceRequest;

class AuthServices extends ApiServiceRequest
{
    /**
     * @const URI_PATH
     */
    const URI_PATH = 'auth/users/session/validate';


    /**
     * Responsavel para validar um usuario
     *
     * @see http://domain/api/auth/users
     * @param array $session
     * @return array
     */
    public function validateSessionUser(array $session)
    {
        $httpRequest = $this->post(self::URI_PATH, $session);
        return parse_object($httpRequest);
    }
}