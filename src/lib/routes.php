<?php

ini_set('display_errors', 1);

ini_set('display_startup_errors', 1);

error_reporting(E_ALL);

use Sergi\CatsMvc\controllers\AdminController;
use Sergi\CatsMvc\controllers\HomeController;
use Sergi\CatsMvc\controllers\LoginController;
use Sergi\CatsMvc\controllers\SingUpController;
use Sergi\CatsMvc\controllers\UserAdopterController;




// Require composer autoloader
require './vendor/autoload.php';

// Create Router instance
$router = new \Bramus\Router\Router();
session_start();


// ROUTES


// HOME, LOGIN AND REGISTER

$router->get('/', [HomeController::class,'index' ]); // Matches The URL /homepage

$router->get('/singUp',[SingUpController::class,'index'] );    // Matches The URL /singUp

$router->post('/singUp', [SingUpController::class,'index']);   // Send data from sing up form

$router->get('/login',[LoginController::class, 'index']) ;  // Matches The URL /login

$router->post('/login',[LoginController::class, 'login']) ;// Send data from login form


//ADMIN ROUTES -> CATS

$router->get('admin/dashboard',[AdminController::class ,'index']); //Matches the URL /admin/dashboard

$router->get('admin/addCat',[AdminController::class ,'addCat']);  

$router->post('admin/addCat',[AdminController::class ,'addCat']); 

$router->get('admin/editCat/{id}',[AdminController::class ,'getCatById']); 

$router->post('admin/editCat/{id}',[AdminController::class ,'editCat']); 

$router->get('admin/deleteCat/{id}',[AdminController::class ,'deleteCatById']); 

$router->post('admin/deleteCat/{id}',[AdminController::class ,'deleteCat']); 

// ADMIN ROUTES ->USERS

$router->get('admin/user/users',[AdminController::class ,'getUsers']);

$router->get('admin/user/editUser/{id}',[AdminController::class,'getUserById']);

$router->post('admin/user/editUser/{id}',[AdminController::class,'editUser']);

$router->get('admin/user/deleteUser/{id}',[AdminController::class ,'deleteUserById']); 

$router->post('admin/user/deleteUser/{id}',[AdminController::class ,'deleteUser']);

$router->get('admin/logout',[AdminController::class,'logout']);


// USER ROUTES 

$router->get('user/cats',[UserAdopterController::class ,'getCats']);
$router->get('user/adoptCat/{id}',[UserAdopterController::class ,'getCatById']);
$router->post('user/adoptCat/{id}',[UserAdopterController::class ,'adoptCat']);


// Run it!
$router->run();
