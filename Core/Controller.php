<?php

namespace Core;

class Controller 
{
    private static $_render;

    protected function render($view, $scope = []) {

        extract($scope);//Importe les variables dans la table des symboles
        $f = implode(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'src', 'View', preg_replace('/Controller\\\?/', '', basename(get_class($this))), $view]) . '.php';
        if (file_exists($f)) {
            ob_start();//Mémorise toute la sortie HTML qui suit, 
            include($f);
            $view = ob_get_clean();//puis, à la fin, on récupère le contenu, puis l'efface
            ob_start();
            include(implode(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'src', 'View',
            'index']) . '.php');
            self::$_render = ob_get_clean();
        }
    }
    public function __destruct() {
        echo self::$_render;
    }
}