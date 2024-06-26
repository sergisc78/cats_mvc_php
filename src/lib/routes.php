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

$router->get('/', [HomeController::class, 'index']); // Matches The URL /homepage

$router->get('aboutUs',[HomeController::class,'aboutUs']);

$router->get('contactUs',[HomeController::class,'contactUs']);

$router->post('contactUs',[HomeController::class,'contactUsMessage']);

$router->get('/singUp', [SingUpController::class, 'index']);    // Matches The URL /singUp

$router->post('/singUp', [SingUpController::class, 'index']);   // Send data from sing up form

$router->get('/login', [LoginController::class, 'index']);  // Matches The URL /login

$router->post('/login', [LoginController::class, 'login']); // Send data from login form


//ADMIN ROUTES -> CATS

$router->get('admin/dashboard', [AdminController::class, 'index']); //Matches the URL /admin/dashboard

$router->get('admin/addCat', [AdminController::class, 'addCat']);

$router->post('admin/addCat', [AdminController::class, 'addCat']);

$router->get('admin/editCat/{id}', [AdminController::class, 'getCatById']);

$router->post('admin/editCat/{id}', [AdminController::class, 'editCat']);

$router->get('admin/deleteCat/{id}', [AdminController::class, 'deleteCatById']);

$router->post('admin/deleteCat/{id}', [AdminController::class, 'deleteCat']);

// ADMIN ROUTES ->USERS

$router->get('admin/user/users', [AdminController::class, 'getUsers']);

$router->get('admin/user/editUser/{id}', [AdminController::class, 'getUserById']);

$router->post('admin/user/editUser/{id}', [AdminController::class, 'editUser']);

$router->get('admin/user/deleteUser/{id}', [AdminController::class, 'deleteUserById']);

$router->post('admin/user/deleteUser/{id}', [AdminController::class, 'deleteUser']);

$router->get('admin/user/users-interested', [AdminController::class, 'getUsersInterested']);

$router->get('admin/user/view-user-interested/{id}', [AdminController::class, 'getUserInterestedById']);

$router->post('admin/user/view-user-interested/{id}', [AdminController::class, 'viewEditUserInterested']);

$router->get('admin/user/deleteUserInterested/{id}', [AdminController::class, 'deleteUserInterested']);

$router->post('admin/user/deleteUserInterested/{id}', [AdminController::class, 'deleteUserInterested']);

$router->get('admin/user/usersMessages', [AdminController::class, 'getMessages']);

$router->get('admin/user/deleteMessage/{id}', [AdminController::class, 'getMessageById']);

$router->post('admin/user/deleteMessage/{id}', [AdminController::class, 'deleteMessage']);

$router->get('admin/logout', [AdminController::class, 'logout']);


// USER ROUTES 

$router->get('user/cats', [UserAdopterController::class, 'getCats']);

$router->get('user/yourRequest/{username}', [UserAdopterController::class, 'yourRequestByUsername']);

$router->get('user/meetCat/{id}', [UserAdopterController::class, 'formMeetCat']);

$router->post('user/meetCat/{id}', [UserAdopterController::class, 'formMeetCat']);

$router->get('user/logout', [UserAdopterController::class, 'logout']);

// Run it!
$router->run();
