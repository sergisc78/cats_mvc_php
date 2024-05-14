<?php

namespace Sergi\CatsMvc\controllers;

use Sergi\CatsMvc\lib\Controller;

use Sergi\CatsMvc\models\Admin;


class HomeController extends Controller
{

    // HOME PAGE
    public static function index()
    {

        ini_set('display_errors', 1);

        ini_set('display_startup_errors', 1);

        error_reporting(E_ALL);

        self::view('home');
    }


    // ABOUT US PAGE
    public static function aboutUs()
    {

        self::view('aboutUs');
    }


    //CONTACT US PAGE
    public static function contactUs()
    {

        self::view('contactUs');
    }

    // SEND CONTACT FORM
    public static function contactUsMessage()
    {

        $user = new Admin();
        $user = $user->contactUsMessage($_POST);
        self::view('contactUs');
    }
}
