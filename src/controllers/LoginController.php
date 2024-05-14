<?php

namespace Sergi\CatsMvc\controllers;

use Sergi\CatsMvc\lib\Controller;
use Sergi\CatsMvc\models\User;



class LoginController extends Controller
{

    // LOGIN PAGE
    public static function index()
    {

        ini_set('display_errors', 1);

        ini_set('display_startup_errors', 1);

        error_reporting(E_ALL);

        self::view('login');
    }


    //LOGIN FUNCTION
    public static function login()
    {
        $login = new User();

        $login->login($_POST);

        ini_set('display_errors', 1);

        ini_set('display_startup_errors', 1);

        error_reporting(E_ALL);

        self::view('login');
    }
}
