<?php

namespace Sergi\CatsMvc\controllers;

use Sergi\CatsMvc\lib\Controller;

use Sergi\CatsMvc\models\UserAdopter;

use Sergi\CatsMvc\models\Admin;






class UserAdopterController extends Controller
{


  // SHOW ALL CATS
  public static function getCats()
  {

    $cats = new UserAdopter();
    $cats = $cats->getCats();




    self::view('user/cats', $cats);
  }


  //SHOW CAT BY ID
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


  //FORM TO MEET CAT
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


  // SHOW USERS CAT´S REQUEST

  public static function yourRequestByUsername($username)
  {

    $user = new UserAdopter();
    $user = $user->yourRequestByUsername($username);


    $data = ["user" => $user];

    self::view("user/yourRequest", $data);
  }

  // LOGOUT
  public static function logout()
  {

    $user = new UserAdopter();
    $user->logout();


    self::view('user/logout');
  }
}
