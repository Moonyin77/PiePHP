<?php

namespace Core;

class Router
{
    private static $routes;

    public static function connect($url, $route)
    {
        $route['controller'] = "Controller\\".  ucfirst($route['controller']) . "Controller";
        $route['action'] = $route['action'] . "Action";
        self::$routes[$url] = $route;
    }
    public static function get()
    {
        $ur = $_SERVER["REQUEST_URI"];
        // var_dump($ur);
        $req = substr($ur, strlen(BASE_URI));
        return self::$routes[$req];
        // retourne un tableau associatif contenant
        // + le controller a instancier
        // + la méthode du controller a appeler
    }
}