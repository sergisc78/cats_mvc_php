<?php

namespace Sergi\CatsMvc\controllers;

use Sergi\CatsMvc\lib\Controller;

use Sergi\CatsMvc\models\Admin;


class AdminController extends Controller
{


    //CATS

    // SHOW ALL CATS OF DATABASE

    public static function index()
    {

        ini_set('display_errors', 1);

        ini_set('display_startup_errors', 1);

        error_reporting(E_ALL);

        // INSTANCIEM MODEL ADMIN
        $cat = new Admin();
        $cat = $cat->getCats();

        $data = ["cat" => $cat];
        self::view('admin/dashboard', $data);
    }


    // ADD CAT

    public static function addcat()
    {
        $cat = new Admin();
        $cat->addCat($_POST);
        self::view('admin/addCat');
    }

    // SHOW CAT BY ID
    public static function getCatById($id)
    {

        ini_set('display_errors', 1);

        ini_set('display_startup_errors', 1);

        error_reporting(E_ALL);


        $cat = new Admin();
        $cat = $cat->getCatById($id);


        $data = [
            "id" => $cat['id'],
            "cat_name" => $cat['cat_name'],
            "cat_sex" => $cat['cat_sex'],
            "cat_age" => $cat["cat_age"],
            "cat_category" => $cat['cat_category'],
            "cat_image" => $cat['cat_image'],
            "cat_description" => $cat['cat_description']

        ];


        self::view('admin/editCat', $data);
    }


    // UPDATE CAT BY ID
    public static function editCat($id)
    {

        //SEND DATA
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $cat = new Admin();
            $cat = $cat->editCat($_POST);

            if (!empty($_POST['cat_image'])) {


                $data = [
                    "id" => $_POST['id'],
                    "cat_name" => $_POST['cat_name'],
                    "cat_sex" => $_POST['cat_sex'],
                    "cat_age" => $_POST["cat_age"],
                    "cat_category" => $_POST['cat_category'],
                    "cat_image" => $_POST['cat_image'],
                    "cat_description" => $_POST['cat_description']
                ];
            } else {
                $data = [
                    "id" => $_POST['id'],
                    "cat_name" => $_POST['cat_name'],
                    "cat_sex" => $_POST['cat_sex'],
                    "cat_age" => $_POST["cat_age"],
                    "cat_category" => $_POST['cat_category'],
                    "cat_description" => $_POST['cat_description']
                ];
            }

            //SHOW DATA
        } else {
            $cat = new Admin();
            $cat = $cat->getCatById($id);
            $data = [
                "id" => $cat['id'],
                "cat_name" => $cat['cat_name'],
                "cat_sex" => $cat['cat_sex'],
                "cat_age" => $cat["cat_age"],
                "cat_category" => $cat['cat_category'],
                "cat_image" => $cat['cat_image'],
                "cat_description" => $cat['cat_description']
            ];
        }

        self::view('admin/editCat', $data);
    }


    // SHOW CAT BY ID TO DELETE OR NOT
    public static function deleteCatById($id)
    {

        ini_set('display_errors', 1);

        ini_set('display_startup_errors', 1);

        error_reporting(E_ALL);


        $cat = new Admin();
        $cat = $cat->getCatById($id);


        $data = [
            "id" => $cat['id'],
            "cat_name" => $cat['cat_name'],
            "cat_sex" => $cat['cat_sex'],
            "cat_age" => $cat["cat_age"],
            "cat_category" => $cat['cat_category'],
            "cat_image" => $cat['cat_image'],
            "cat_description" => $cat['cat_description']

        ];


        self::view('admin/deleteCat', $data);
    }


    //DELETE CAT
    public static function deleteCat($id)
    {

        ini_set('display_errors', 1);

        ini_set('display_startup_errors', 1);

        error_reporting(E_ALL);


        // IF CLICK BUTTON, THE CAT IS DELETED
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                "id" => $id,
                "cat_name" => "",
                "cat_sex" => "",
                "cat_age" => "",
                "cat_category" => "",
                "cat_image" => "",
                "cat_description" => ""

            ];

            $cat = new Admin();
            $cat = $cat->deleteCatById($id);
        } else { // SHOW CAT'S INFO ONLY
            $cat = new Admin();
            $cat = $cat->deleteCatById($_GET);

            $data = [
                "id" => $cat['id'],
                "cat_name" => $cat['cat_name'],
                "cat_sex" => $cat['cat_sex'],
                "cat_age" => $cat["cat_age"],
                "cat_category" => $cat['cat_category'],
                "cat_image" => $cat['cat_image'],
                "cat_description" => $cat['cat_description']

            ];
        }

        self::view('admin/deleteCat', $data);
    }


    //USERS


    // SHOW ALL USERS OF DATABASE

    public static function getUsers()
    {

        ini_set('display_errors', 1);

        ini_set('display_startup_errors', 1);

        error_reporting(E_ALL);

        // INSTANCIEM MODEL ADMIN
        $user = new Admin();
        $user = $user->getUsers();

        $data = ["user" => $user];
        self::view('admin/user/users', $data);
    }


    public static function getUserById($id)
    {

        ini_set('display_errors', 1);

        ini_set('display_startup_errors', 1);

        error_reporting(E_ALL);


        $user = new Admin();
        $user = $user->getUserById($id);


        $data = [
            "id" => $user['id'],
            "username" => $user['username'],
            "role_id" => $user['role_id'],



        ];


        self::view('admin/user/editUser', $data);
    }

    // UPDATE USER

    public  static function editUser($id)
    {

        ini_set('display_errors', 1);

        ini_set('display_startup_errors', 1);

        error_reporting(E_ALL);

        //SEND DATA
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $user = new Admin();
            $user = $user->editUser($_POST);
            $data = [
                "id" => $_POST['id'],
                "username" => $_POST['username'],
                "role_id" => $_POST['role_id']
            ];

            //SHOW DATA
        } else {
            $user = new Admin();
            $user = $user->getUserById($id);
            $data = [
                "id" => $user['id'],
                "username" => $user['username'],
                "role_id" => $user['role_id'],

            ];
        }

        self::view('admin/user/editUser', $data);
    }

    // SHOW CAT BY ID TO DELETE OR NOT
    public static function deleteUserById($id)
    {

        ini_set('display_errors', 1);

        ini_set('display_startup_errors', 1);

        error_reporting(E_ALL);


        $user = new Admin();
        $user = $user->getUserById($id);


        $data = [
            "id" => $user['id'],
            "username" => $user['username'],
            "role_id" => $user['role_id'],



        ];


        self::view('admin/user/deleteUser', $data);
    }


    //DELETE USER
    public static function deleteUser($id)
    {

        ini_set('display_errors', 1);

        ini_set('display_startup_errors', 1);

        error_reporting(E_ALL);


        // IF CLICK BUTTON, THE CAT IS DELETED
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = new Admin();
            $user = $user->deleteUserById($id);
            $data = [
                "id" => $_POST['id'],
                "username" => $_POST['username'],
                "role_id" => $_POST['role_id'],
            ];
        } else { // SHOW CAT'S INFO ONLY
            $user = new Admin();
            $user = $user->deleteUserById($_GET);
            $data = [
                "id" => $user['id'],
                "username" => $user['username'],
                "role_id" => $user['role_id'],

            ];
        }

        self::view('admin/user/deleteUser', $data);
    }

    public static function logout()
    {

        $user = new Admin();
        $user->logout();


        self::view('admin/logout');
    }
}
