<?php


namespace Sergi\CatsMvc\models;

use PDO;
use Sergi\CatsMvc\lib\Database;


class UserAdopter
{


  private $db;


  // CONSTRUCT
  public function __construct()
  {
    $this->getConnection();
  }


  // GET CONNECTION

  public function getConnection()
  {

    $this->db = new Database();
    $this->db = $this->db->connect();
  }

  public function getCats()
  {

    $sql_select = "SELECT * FROM cats";
    $result = $this->db->prepare($sql_select);
    $result->execute();
  }

  public function getCatById($id)
  {

    $sql_select = "SELECT * FROM cats WHERE id=:id";
    $result = $this->db->prepare($sql_select);
    $result->bindValue(':id', $id);
    $result->execute();
    return $result->fetch();
  }


  public function adoptCat()
  {

    $user_id = isset($_POST['user_id']) ? $_POST['user_id'] : '';
    $cat_id = isset($_POST['cat_id']) ? $_POST['cat_id'] : '';

   /* $sql_select = "SELECT * FROM cats WHERE cat_name=?";
    $result = $this->db->prepare($sql_select);
    $result->bindParam(1, $cat_name);*/


    //pasta$result->execute();

    if (isset($_POST['like-to-know'])) {

      $sql = "INSERT INTO users_cats( user_id, cat_id) VALUES (user_id=:user_id,cat_id=:cat_id) ";
      $result = $this->db->prepare($sql);
      $result->bindValue(':user_id', $user_id);
      $result->bindValue(':cat_id', $cat_id);
      $result->execute();

      if ($result) {

        echo '<div class="alert alert-success alert-dismissible fade show fixed-top" role="alert" style="margin-top:150px;width:370px;margin-left: auto;margin-right: 40px;font-size:18px;font-family: Montserrat,sans-serif;">
     user successfully !
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>';
        header("refresh:3");
      } else {
        echo '<div class="alert alert-danger alert-dismissible fade show fixed-top" role="alert" style="margin-top:150px;width:370px;margin-left: auto;margin-right: 40px;font-size:18px;font-family: Montserrat, sans-serif;">
     usernot be updated !. Something wrong happened !
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>';

        header("refresh:3");
      }
    }
  }
}
