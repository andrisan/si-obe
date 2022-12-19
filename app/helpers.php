<?php

if (! function_exists('route_back_with_fallback')) {
    function route_back_with_fallback($name, $parameters = [], $absolute = true): string
    {
        $url = url()->previous();
        if ($url == url()->full()) {
            $url = route($name, $parameters, $absolute);
        }
        return $url;
    }
}
