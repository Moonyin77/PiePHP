<?php

spl_autoload_register(function ($name) {
    // echo "Tentative de chargement de $name. <br>";
    // require('Core\Core.php');
    $nspace = explode('\\', $name)[0];//Récupère le premier élèments de l'explode de $name
    $space = explode('\\', $name)[1];//Récupère le second élèments de l'explode de $name

    $arr = array(
    "Core" => "/Core",
    "Controller" => "/src/Controller",
    "Model" => "/src/Model",
    "View" => "/src/View",
    );

    include ("." . $arr[$nspace] . "/" . $space . ".php");
});
?>