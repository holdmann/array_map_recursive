<?php

if (!function_exists('array_map_recursive')) {

    /**
     * Make array_map() works with multidimensional arrays.
     *
     * @see https://stackoverflow.com/questions/22204254/applying-array-map-recursively-array-walk-recursive
     *
     * @param callable $callback
     * @param array $array
     * @return array
     */
    function array_map_recursive(callable $callback, array $array): array
    {
        $func = function ($item) use (&$func, &$callback) {
            return is_array($item) ? array_map($func, $item) : $callback($item);
        };

        return array_map($func, $array);
    }
}