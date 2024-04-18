<?php

namespace Sergi\CatsMvc\controllers;

use Sergi\CatsMvc\lib\Controller;

use Sergi\CatsMvc\models\UserAdopter;

use Sergi\CatsMvc\models\Admin;


class UserAdopterController extends Controller{



  public static function getCats(){

    $cats=new UserAdopter();
    $cats=$cats->getCats();

    self::view('user/cats',$cats);
  }

  public static function getCatById($id){

    $cat=new UserAdopter();
    $cat=$cat->getCatById($id);

    $data = [
      "id" => $cat['id'],
      "cat_name" => $cat['cat_name'],
      "cat_sex" => $cat['cat_sex'],
      "cat_age" => $cat["cat_age"],
      "cat_category" => $cat['cat_category'],
      "cat_image" => $cat['cat_image'],
      "cat_description" => $cat['cat_description']

  ];

    self::view('user/adoptCat',$data);
  }

  public static function adoptCat($id){

    $user=new Admin();
    $user=$user->getUserById($id);

    $cat=new UserAdopter();
    $cat=$cat->adoptCat($_POST);

    $data = [
      "user_id" => $cat['user_id'],
      "cat_id" => $cat['cat_id'],
      

  ];

    self::view('user/adoptCat',$data);
  }
}
