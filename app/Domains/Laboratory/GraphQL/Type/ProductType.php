<?php

namespace IGestao\Domains\Laboratory\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class ProductType extends BaseType
{
    protected $attributes = [
        'name' => 'Product',
        'description' => 'A type'
    ];

    /**
     * @return array
     */
    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int())
            ],
            'nome' => [
                'name' => 'nome',
                'type' => Type::nonNull(Type::string())
            ],
            'created_at' => [
                'type' => Type::nonNull(Type::string())
            ],
        ];
    }
}
