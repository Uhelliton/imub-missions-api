<?php
if (! function_exists('array_is_empty')) {
    /**
     * Checka se um array esta vazio
     *
     * @param array $collection
     * @return bool
     */
    function array_is_empty($collection )
    {
        if (count($collection) == 0)
            return true;

        return false;
    }
}

if (! function_exists('array_is_multi')) {

    /**
     * Verifique se uma matriz é uma matriz multidimensional.
     *
     * @param $object
     * @return bool
     */
    function array_is_multi( $object ) {
        return (is_array( current($object) ));
    }
}