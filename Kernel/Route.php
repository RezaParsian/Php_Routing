<?php

namespace Kernel;

class Route
{
    static $routes = [];

    public static function add($routes, $function, $method = "get")
    {
        array_push(self::$routes, [
            "route" => $routes,
            "function" => $function,
            "method" => $method
        ]);
    }

    public static function run($path="/")
    {
        $path=$_SERVER['REQUEST_URI'];

        foreach (self::$routes as $route) {
            if ($route["route"]==$path) {
                $route["function"]();
            }
        }
    }
}
