<?php

if (! function_exists('cancel_route')) {
    function cancel_route($fallback_url = null)
    {
        $url = url()->previous();
        if (empty($fallback_url)) {
            return $url;
        }

        if ($url == url()->current()) {
            $url = $fallback_url;
        }
        return $url;
    }
}
