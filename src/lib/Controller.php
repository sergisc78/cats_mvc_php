<?php


namespace Sergi\CatsMvc\lib;


// CARREGA MODEL I VISTES

class Controller
{
    public static function model($model)
    {
        require_once 'src/models/' . $model . '.php';

        return new $model;
    }

    public static function view($view, $data = [])
    {
        if (file_exists('src/views/' . $view . '.php')) {
            require_once 'src/views/' . $view . '.php';
        } else {
            //die("404 NOT FOUND");
            // require_once("../app/views/pageNotFound.php");
        }
    }
}
