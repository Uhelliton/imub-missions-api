<?php

namespace IGestao\Domains\Laboratory\GraphQL\Mutation;

use Folklore\GraphQL\Support\Mutation;
use IGestao\Domains\Laboratory\Product;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;

class CreateProductMutation extends Mutation
{
    protected $attributes = [
        'name' => 'CreateProduct',
        'description' => 'Product mutation'
    ];

    public function type()
    {
        return GraphQL::Type('Product');
    }

    public function args()
    {
        return [
            'nome' => [
                'type' => Type::nonNull(Type::string()),
                'rules' => ['min:2']
            ],
            
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        return Product::create($args);
    }
}
