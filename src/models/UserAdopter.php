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



  public function formMeetCat()
  {




    //pasta$result->execute();

    if (isset($_POST['meetCat'])) {


      $id = isset($_POST['id']) ? $_POST['id'] : '';
      $username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
      $email = isset($_POST['email']) ? $_POST['email'] : '';
      $cat_name = isset($_POST['cat_name']) ? $_POST['cat_name'] : '';
      $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
      $comments = isset($_POST['comments']) ? $_POST['comments'] : '';

      $sql_select = "SELECT username,cat_name FROM formMeetCat WHERE username=:username AND cat_name=:cat_name";
      $result = $this->db->prepare($sql_select);
      $result->bindParam(":username", $username);
      $result->bindParam(":cat_name", $cat_name);
      $result->execute();
      $count = $result->rowCount();

      if ($count != 0) {
        echo '<div class="alert alert-danger alert-dismissible fade show fixed-top" role="alert" style="margin-top:150px;width:370px;margin-left: auto;margin-right: 40px;font-size:18px;font-family: Montserrat, sans-serif;">
        You have already made a request for this cat. !
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';

        header("refresh:6;");
      } else {

        $sql = "INSERT INTO formMeetCat( id,username,cat_name,email,phone,comments) VALUES (:id,:username,:cat_name,:email,:phone,:comments) ";
        $result = $this->db->prepare($sql);
        $result->bindValue(':id', $id);
        $result->bindValue(':username', $username);
        $result->bindValue(':email', $email);
        $result->bindValue(':cat_name', $cat_name);
        $result->bindValue(':phone', $phone);
        $result->bindValue(':comments', $comments);
        $result->execute();

        if ($result) {

          echo '<div class="alert alert-success alert-dismissible fade show fixed-top" role="alert" style="margin-top:150px;width:370px;margin-left: auto;margin-right: 40px;font-size:18px;font-family: Montserrat,sans-serif;">
          Great ! We will connect with you as sonner as possible !
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
          header("refresh:5");
        } else {
          echo '<div class="alert alert-danger alert-dismissible fade show fixed-top" role="alert" style="margin-top:150px;width:370px;margin-left: auto;margin-right: 40px;font-size:18px;font-family: Montserrat, sans-serif;">
           Something went wrong ! Try it once again !
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';

          header("refresh:3");
        }
      }
    }
  }

  public function yourRequest(){
    
  }

  public function logout()
  {

    if (session_destroy()) {

      header("Location:http://localhost:81/cats_mvc");
    } else {
      echo '<div class="alert alert-danger alert-dismissible fade show fixed-top" role="alert" style="margin-top:150px;width:370px;margin-left: auto;margin-right: 40px;font-size:18px;font-family: Montserrat, sans-serif;">
          You can not logout !. Something wrong happened !
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';

      // header("refresh:3,url=http://localhost:81/cats_mvc/admin/dashboard");
    }
  }
}
