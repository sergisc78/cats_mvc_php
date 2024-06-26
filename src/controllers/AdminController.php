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

            // IF THERE IS AN IMAGE
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
            } else {  // IF THERE ISN'T AN IMAGE
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

    // SHOW USER BY ID
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


    // USERS INTERESTED TO ADOPT


    //SHOW ALL USERS INTERESTED TO ADOPT
    public static function getUsersInterested()
    {

        $user = new Admin();
        $user = $user->getUsersInterested();

        $data = [
            "user" => $user
        ];

        self::view('admin/user/users-interested', $data);
    }


    //SHOW USER INTERESTED TO ADOPT BY ID
    public static function getUserInterestedById($id)
    {

        ini_set('display_errors', 1);

        ini_set('display_startup_errors', 1);

        error_reporting(E_ALL);


        $user = new Admin();
        $user = $user->getUserInterestedById($id);


        $data = [
            "id" => $user['id'],
            "username" => $user['username'],
            "cat_name" => $user['cat_name'],
            "email" => $user['email'],
            "phone" => $user['phone'],
            "comments" => $user['comments'],
            "contacted" => $user['contacted']
        ];
        self::view('admin/user/view-user-interested', $data);
    }

    // VIEW OR EDIT USER TO INTERESTED TO ADOPT BY ID

    public static function viewEditUserInterested($id)
    {

        ini_set('display_errors', 1);

        ini_set('display_startup_errors', 1);

        error_reporting(E_ALL);

        //SEND DATA
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $user = new Admin();
            $user = $user->viewEditUserInterested($_POST);
            $data = [
                "id" => $_POST['id'],
                "username" => $_POST['username'],
                "cat_name" => $_POST['cat_name'],
                "email" => $_POST['email'],
                "phone" => $_POST['phone'],
                "comments" => $_POST['comments'],
                "contacted" => $_POST['contacted'],

            ];

            //SHOW DATA
        } else {
            $user = new Admin();
            $user = $user->getUserInterestedById($id);
            $data = [
                "id" => $user['id'],
                "username" => $user['username'],
                "cat_name" => $user['cat_name'],
                "email" => $user['email'],
                "phone" => $user['phone'],
                "comments" => $user['comments'],
                "contacted" => $user['contacted']

            ];
        }

        self::view('admin/user/view-user-interested', $data);
    }

    // DELETE USER TO INTERESTED TO ADOPT BY ID

    public static function deleteUserInterested($id)
    {

        // IF CLICK BUTTON, USER REQUEST IS DELETED
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = new Admin();
            $user = $user->deleteUserInterested($id);
            $data = [
                "id" => $_POST['id'],
                "username" => $_POST['username'],
                "cat_name" => $_POST['cat_name'],
                "email" => $_POST['email'],
                "phone" => $_POST['phone'],
                "comments" => $_POST['comments'],
                "contacted" => $_POST['contacted'],

            ];
        } else { // SHOW USER REQUEST INFO 
            $user = new Admin();
            $user = $user->getUserInterestedById($id);
            $data = [
                "id" => $user['id'],
                "username" => $user['username'],
                "cat_name" => $user['cat_name'],
                "email" => $user['email'],
                "phone" => $user['phone'],
                "comments" => $user['comments'],
                "contacted" => $user['contacted']

            ];
        }


        self::view('admin/user/deleteUserInterested', $data);
    }

    //SHOW ALL MESSAGES
    public static function getMessages()
    {
        $user = new Admin();
        $user = $user->getMessages();
        $data = ["user" => $user];
        self::view('admin/user/usersMessages', $data);
    }

    //GET MESSAGE BY ID TO DELETE IT OR NOT
    public static function getMessageById($id)
    {

        $user = new Admin();
        $user = $user->getMessageById($id);


        $data = [
            "id" => $user['id'],
            "name" => $user['name'],
            "email" => $user['email'],
            "subject" => $user['subject'],
            "message" => $user['message'],

        ];


        self::view('admin/user/deleteMessage', $data);
    }


    //DELETE MESSAGE
    public static function deleteMessage($id)
    {

        // SEND DATA
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = new Admin();
            $user = $user->deleteMessage($id);
            $data =
                [
                    "id" => $_POST['id']
                ];
        } else { // SHOW DATA
            $user = new Admin();
            $user = $user->getMessageById($id);
            $data =
                [
                    "id" => $user['id'],
                    "name" => $user['name'],

                ];
        }

        self::view('admin/user/deleteMessage', $data);
    }

    //LOGOUT
    public static function logout()
    {

        $user = new Admin();
        $user->logout();


        self::view('admin/logout');
    }
}
