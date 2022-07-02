<?php

namespace App\Helpers;

class Utils
{
    public static function parseUrl(string $requestUri): array
    {
        $uriArr = explode('/', trim(explode('?', $requestUri)[0], '/'));

        $params = [];
        for ($i = 0; $i < count($uriArr) - 1; $i++) {
            if ($i % 2 != 0)
                continue;
            $params[$uriArr[$i]] = $uriArr[$i + 1];
        }

        return $params;
    }
}