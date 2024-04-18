<?php

namespace Sergi\CatsMvc\controllers;

use Sergi\CatsMvc\lib\Controller;


class HomeController extends Controller
{


    public static function index()
    {

        ini_set('display_errors', 1);

        ini_set('display_startup_errors', 1);

        error_reporting(E_ALL);

        self::view('home');
    }
}
