<?php
namespace IGestao\Domains\Laboratory\Resources\Rules;

class ProductRules
{
    public function setRules()
    {
        return [
            'year' => 'required|integer|min:2018|max:2099',
            'label' => 'required|string|max:255',
        ];
    }
}