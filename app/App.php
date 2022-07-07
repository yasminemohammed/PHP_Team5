<?php

declare(strict_types=1);

namespace App;

use Pecee\SimpleRouter\SimpleRouter;

class App
{
    private static DB $db;

    public function __construct(protected Config $config)
    {
        static::$db = new DB($config->db ?? []);
    }

    public static function db(): DB
    {
        return static::$db;
    }

    public function run()
    {
//        try {
//            SimpleRouter::start();
//        } catch (\Exception $e) {
//            http_response_code(404);
//            echo View::make('error/404');
//        }
        SimpleRouter::start();
    }
}
