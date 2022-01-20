<?php
if (!function_exists('htmlToText')) {
    function htmlToText($content, $length)
    {
        $str = substr(strip_tags($content), 0, $length);
        return !empty($str) ? (strlen($str) >= $length ? $str . '...' : $str) : null;
    }
}

if (!function_exists('getPageType')) {
    function getPageType()
    {
        $routeName = request()->route()->getName();
        if (strpos($routeName, 'edit') !== false) {
            return 'PUT';
        }
        return 'GET';
    }
}
