<?php

namespace Yago\Modules\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserValidator extends FormRequest
{
    /**
     * Determine se o usuário está autorizado a fazer esse pedido.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Obtenha as regras de validação aplicáveis ao pedido
     *
     * @return array
     */
    public function rules()
    {
        return [
            'firstName'  => 'required',
            'email'      => 'required|email|max:100|unique:acl_users',
            'password'   => 'required|min:4'
        ];
    }
}
