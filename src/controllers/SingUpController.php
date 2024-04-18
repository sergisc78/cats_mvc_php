<?php

namespace Sergi\CatsMvc\controllers;

use Sergi\CatsMvc\lib\Controller;
use Sergi\CatsMvc\models\User;


class SingUpController extends Controller
{


    public static function index()
    {

        ini_set('display_errors', 1);

        ini_set('display_startup_errors', 1);

        error_reporting(E_ALL);

       
        $user=new User();
        $user->singUp($_POST);
        self::view('singUp');
    }

    

   
}
