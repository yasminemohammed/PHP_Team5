<?php

namespace App\Helpers;

class Utils
{
    public static function parseUrl(string $requestUri): array
    {
       return explode('/', trim(explode('?', $requestUri)[0], '/'));
    }
}