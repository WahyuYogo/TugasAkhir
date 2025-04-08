<?php

if (!function_exists('getUsernameFromUrl')) {
    function getUsernameFromUrl($url)
    {
        $parsed = parse_url($url);
        if (!isset($parsed['path'])) return '-';
        return trim($parsed['path'], '/');
    }
}
