<?php

namespace IGestao\Domains\Laboratory\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use IGestao\Domains\Laboratory\Product;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;

class ProductQuery extends Query
{
    protected $attributes = [
        'name' => 'Product',
        'description' => 'Product query'
    ];

    public function type()
    {
        return GraphQL::type('Product');
        // return Type::listOf(Type::string());
    }

    public function args()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int())
            ]

        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        return Product::find($args['id']);
    }
}
