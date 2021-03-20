<?php

namespace Kernel;

class Route
{
    static $routes = [];

    public static function name($name)
    {
        $index = \array_search($name, \array_column(self::$routes, "name"));
        $temparray = self::$routes[$index];
        return $temparray["route"];
    }

    public static function add($routes, $function, $method = "get", $name = \null)
    {
        array_push(self::$routes, [
            "name" => $name,
            "route" => $routes,
            "function" => $function,
            "method" => $method
        ]);
    }

    public static function run($path = "/")
    {
        $path = $_SERVER['REQUEST_URI'];
        $index = @\array_search($path, \array_column(self::$routes, "route"));

        if ($index >= 0 && $index!="") {
            if (self::checkRouteMethod(self::$routes[$index]["method"])) {
                self::$routes[$index]["function"]();
            } else {
                self::abort();
            }
        } else {
            self::abort();
        }
    }

    public static function redirect($path)
    {
        \header("location: {$path}");
    }

    public static function abort($errorcode = 404)
    {
        http_response_code(404);
    }

    private static function checkRouteMethod($method)
    {
        $serverMethod = \strtolower($_SERVER["REQUEST_METHOD"]);
        $routeMethod = \strtolower($method);
        return $serverMethod == $routeMethod;
    }
}
