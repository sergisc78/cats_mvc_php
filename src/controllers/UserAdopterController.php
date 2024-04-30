<?php

namespace Sergi\CatsMvc\controllers;

use Sergi\CatsMvc\lib\Controller;

use Sergi\CatsMvc\models\UserAdopter;

use Sergi\CatsMvc\models\Admin;






class UserAdopterController extends Controller
{



  public static function getCats()
  {

    $cats = new UserAdopter();
    $cats = $cats->getCats();




    self::view('user/cats', $cats);
  }

  public static function getCatById($id)
  {

    $cat = new UserAdopter();
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


    self::view('user/cat', $data);
  }

  public static function formMeetCat($id)
  {


    $cat = new UserAdopter();
    $cat = $cat->getCatById($id);

    $user = new UserAdopter();
    $user->formMeetCat($_POST);


    $data = [
      "id" => $cat['id'],
      "cat_name" => $cat['cat_name'],



    ];


    self::view('user/meetCat', $data);
  }

  public static function yourRequest()
  {

    /*$user = new Admin();
    $user = $user->viewEditUserInterested($username);*/

   /* $data = [
      "username" => $user['username'],
      "cat_name" => $user['cat_name'],
      "email" => $user['email'],
      "comments" => $user['comments'],

    ];*/

    self::view('user/yourRequest');
  }

  public static function logout()
  {

    $user = new UserAdopter();
    $user->logout();


    self::view('user/logout');
  }
}
