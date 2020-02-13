<?php

namespace Core;

use Core\Router;

class Core
{
    public function run()
    {
        require "src/routes.php";
        $route = Router::get();

        $control = new $route['controller'];
        $action = $route['action'];

        // echo __CLASS__ . "[OK]" . PHP_EOL;
        $control->$action();
    }
}