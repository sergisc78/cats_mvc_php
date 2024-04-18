<?php

namespace Sergi\CatsMvc\models;

use Sergi\CatsMvc\lib\Database;

class Admin
{

    private $db;

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


    // CATS

    //SHOW ALL CATS
    public function getCats()
    {

        //$this->getConnection();

        $sql_select = "SELECT * FROM cats";
        $result = $this->db->prepare($sql_select);
        $result->execute();
        return $result->fetchAll();
    }

    // ADD A NEW CAT

    public function addCat()
    {


        // SOLUTION FOR MESSAGE: Cannot modify header information - headers already sent by


        $cat_name = isset($_POST['cat_name']) ? $_POST['cat_name'] : '';
        $cat_sex = isset($_POST['cat_sex']) ? $_POST['cat_sex'] : '';
        $cat_age = isset($_POST['cat_age']) ? $_POST['cat_age'] : '';
        $cat_category = isset($_POST['cat_category']) ? $_POST['cat_category'] : '';
        $cat_description = isset($_POST['cat_description']) ? $_POST['cat_description'] : '';

        //$cat_image = isset($_POST['cat_image']) ? $_POST['cat_image'] : '';


        if (isset($_POST['add'])) {


            $cat_image = isset($_FILES['cat_image']['name']) ? $_FILES['cat_image']['name'] : '';
            $type = isset($_FILES['cat_image']['type']) ? $_FILES['cat_image']['type'] : '';
            $size = isset($_FILES['cat_image']['size']) ? $_FILES['cat_image']['size'] : '';
            $temp = isset($_FILES['cat_image']['tmp_name']) ? $_FILES['cat_image']['tmp_name'] : '';
            $location = '/opt/lampp/htdocs/cats_mvc/public/img/' . $cat_image;


            // $cat_image = $_POST['cat_image'];

            //$this->getConnection();
            $sql_select = "SELECT * FROM cats WHERE cat_name=?";
            $result = $this->db->prepare($sql_select);
            $result->bindParam(1, $cat_name);


            $result->execute();
            $count = $result->rowCount();

            // IF CAT NAME EXIST

            if ($count != 0) {

                echo '<div class="alert alert-danger alert-dismissible fade show fixed-top" role="alert" style="margin-top:150px;width:370px;margin-left: auto;margin-right: 40px;font-size:18px;font-family: Montserrat, sans-serif;">
                Cat name exist on database ! . Choose another one !
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';

                header("refresh:5;url=addCat");

                //INSERT CAT ON DATABASE

            } else {



                /* if (!((strpos($type, "gif") || strpos($type, "jpeg") || strpos($type, "jpg") || strpos($type, "png")) && ($size < 20000000))) {
                     echo '<div style:"text-align:center"><b>Error ! extension or size is not right.<br/>
                 - Files allowed .gif, .jpg, .png. and 200 kb at most.</b></div>';
 
                     echo '<div class="alert alert-danger alert-dismissible fade show fixed-top" role="alert" style="margin-top:150px;width:370px;margin-left: auto;margin-right: 40px;">
                 "<div style:"text-align:center"><b>Error ! extension or size is not right.<br/>
                 - Files allowed .gif, .jpg, .png. and 200 kb at most.</b>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
                 } else {*/

                // IF IMAGE IS RIGHT

                if (move_uploaded_file($temp, $location)) {

                    // WE CHANGE PERMITS
                    chmod('/opt/lampp/htdocs/cats_mvc/public/img/' . $cat_image, 777);
                } else { // ERROR

                    echo '<div class="alert alert-danger alert-dismissible fade show fixed-top" role="alert" style="margin-top:150px;width:370px;margin-left: auto;margin-right: 40px;font-size:18px;font-family: Montserrat, sans-serif;">
                         There is an error uploading image
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                         </div>';
                    echo $temp;
                }


                // THEN INSERT CAT INTO DATABASE
                $sql_insert = "INSERT INTO cats (cat_image,cat_name,cat_age, cat_sex, cat_category,cat_description) VALUES (?,?,?,?,?,?)";
                $result2 = $this->db->prepare($sql_insert);

                $result2->bindParam(1, $cat_image);
                $result2->bindParam(2, $cat_name);
                $result2->bindParam(3, $cat_age);
                $result2->bindParam(4, $cat_sex);
                $result2->bindParam(5, $cat_category);
                $result2->bindParam(6, $cat_description);

                $result2->execute();

                echo '<div class="alert alert-success alert-dismissible fade show fixed-top" role="alert" style="margin-top:150px;width:370px;margin-left: auto;margin-right: 40px;font-size:18px;font-family: Montserrat, sans-serif;">
                 Cat added sucessfully
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                 </div>';

                header("refresh:6;url=dashboard");


                //require_once("../views/admin/dashboard.php")
            }
        }
    }

    // SHOW CAT DATA BY ID
    public function getCatById($id)
    {

        $sql = "SELECT * FROM cats WHERE id=:id";
        $result = $this->db->prepare($sql);
        $result->bindValue(':id', $id);
        $result->execute();
        return $result->fetch();
    }


    //UPDATE CAT
    public function editCat()
    {
        // SOLUTION FOR MESSAGE: Cannot modify header information - headers already sent by
        //ob_start();

        /*IMAGE VARIABLES */

        $cat_image = isset($_FILES['cat_image']['name']) ? $_FILES['cat_image']['name'] : '';
        $temp = isset($_FILES['cat_image']['tmp_name']) ? $_FILES['cat_image']['tmp_name'] : '';
        $location = '/opt/lampp/htdocs/cats_mvc/public/img/' . $cat_image;

        $id = isset($_POST['id']) ? $_POST['id'] : '';
        $cat_age = isset($_POST['cat_age']) ? $_POST['cat_age'] : '';
        $cat_category = isset($_POST['cat_category']) ? $_POST['cat_category'] : '';
        $cat_description = isset($_POST['cat_description']) ? $_POST['cat_description'] : '';



        if (isset($_POST['edit'])) {

            //UPDATE WITH IMAGE

            if (!empty($cat_image)) {
                //$this->getConnection();
                $sql_update = "UPDATE cats SET cat_image=:cat_image, cat_age =:cat_age, cat_category  = :cat_category, cat_description = :cat_description WHERE id = :id";
                $result = $this->db->prepare($sql_update);
                $result->bindParam(':id', $id);
                $result->bindParam(':cat_image', $cat_image);
                $result->bindParam(':cat_age', $cat_age);
                $result->bindParam(':cat_category', $cat_category);
                $result->bindParam(':cat_description', $cat_description);
                $result->execute();


                //IMAGE LOCATION


                move_uploaded_file($temp, $location);


                if ($result) {

                    echo '<div class="alert alert-success alert-dismissible fade show fixed-top" role="alert" style="margin-top:150px;width:370px;margin-left: auto;margin-right: 40px;font-size:18px;font-family: Montserrat,sans-serif;">
                 Cat updated successfully !
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                 </div>';
                    header("refresh:3");
                } else {
                    echo '<div class="alert alert-danger alert-dismissible fade show fixed-top" role="alert" style="margin-top:150px;width:370px;margin-left: auto;margin-right: 40px;font-size:18px;font-family: Montserrat, sans-serif;">
                 Cat can not be updated !. Something wrong happened !
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                 </div>';

                    header("refresh:3");
                }
            } else {

                //UPDATE WITHOUT IMAGE

                //$this->getConnection();
                $sql_update = "UPDATE cats SET cat_age =:cat_age, cat_category = :cat_category, cat_description = :cat_description WHERE id = :id";
                $result = $this->db->prepare($sql_update);
                $result->bindParam(':id', $id);
                $result->bindParam(':cat_age', $cat_age);
                $result->bindParam(':cat_category', $cat_category);
                $result->bindParam(':cat_description', $cat_description);

                $result->execute();

                if ($result) {

                    echo '<div class="alert alert-success alert-dismissible fade show fixed-top" role="alert" style="margin-top:150px;width:370px;margin-left: auto;margin-right: 40px;font-size:18px;font-family: Montserrat,sans-serif;">
                 Cat updated successfully !
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                 </div>';

                    header("refresh:3");
                } else {
                    echo '<div class="alert alert-danger alert-dismissible fade show fixed-top" role="alert" style="margin-top:150px;width:370px;margin-left: auto;margin-right: 40px;font-size:18px;font-family: Montserrat, sans-serif;">
                 Cat can not be updated !. Something wrong happened !
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                 </div>';

                    header("refresh:3");
                }
            }
        }
    }

    public function deleteCatById($id)
    {

        $sql = "DELETE FROM cats WHERE id=:id";
        $result = $this->db->prepare($sql);
        $result->bindValue(":id", $id);
        $result->execute();

        if ($result) {
            echo '<div class="alert alert-success alert-dismissible fade show fixed-top" role="alert" style="margin-top:150px;width:370px;margin-left: auto;margin-right: 40px;font-size:18px;font-family: Montserrat,sans-serif;">
            Cat delated successfully !
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';

            header("refresh:3,url=http://localhost:81/cats_mvc/admin/dashboard");
        } else {
            echo '<div class="alert alert-danger alert-dismissible fade show fixed-top" role="alert" style="margin-top:150px;width:370px;margin-left: auto;margin-right: 40px;font-size:18px;font-family: Montserrat, sans-serif;">
            Cat can not be delated !. Something wrong happened !
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';

            header("url=deleteCat");
        }
    }




    // USERS 


    //SHOW ALL USERS
    public function getUsers()
    {

        $sql_select = "SELECT u.id,u.username, u.role_id,r.role FROM roles r RIGHT JOIN users u ON r.id=u.role_id";
        $result = $this->db->prepare($sql_select);
        $result->execute();
        return $result->fetchAll();
    }

    public function getUserById($id)
    {

        $sql = "SELECT id, username,role_id from users where id=:id";
        $result = $this->db->prepare($sql);
        $result->bindValue(':id', $id);
        $result->execute();
        return $result->fetch();
    }

    public function editUser()
    {

        if (isset($_POST['edit'])) {


            $id = isset($_POST['id']) ? $_POST['id'] : '';
            $roleId = isset($_POST['role_id']) ? $_POST['role_id'] : '';



            $sql_update = "UPDATE users SET role_id=:roleId WHERE id=:id";
            $result = $this->db->prepare($sql_update);
            $result->bindParam(':id', $id);
            $result->bindParam(':roleId', $roleId);
            $result->execute();

            if ($result) {
                echo '<div class="alert alert-success alert-dismissible fade show fixed-top" role="alert" style="margin-top:150px;width:370px;margin-left: auto;margin-right: 40px;font-size:18px;font-family: Montserrat,sans-serif;">
                User updated successfully !
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';


                header("refresh:3;url=http://localhost:81/cats_mvc/admin/user/users");
            } else {
                echo '<div class="alert alert-danger alert-dismissible fade show fixed-top" role="alert" style="margin-top:150px;width:370px;margin-left: auto;margin-right: 40px;font-size:18px;font-family: Montserrat, sans-serif;">
                User can not be updated !. Something wrong happened !
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';

                header("refresh:3;");
            }
        }
    }



    public function deleteUserById($id)
    {

        $sql = "DELETE FROM users WHERE id=:id";
        $result = $this->db->prepare($sql);
        $result->bindValue(":id", $id);
        $result->execute();

        if ($result) {
            echo '<div class="alert alert-success alert-dismissible fade show fixed-top" role="alert" style="margin-top:150px;width:370px;margin-left: auto;margin-right: 40px;font-size:18px;font-family: Montserrat,sans-serif;">
            User delated successfully !
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';

            header("refresh:3,url=http://localhost:81/cats_mvc/admin/user/users");
        } else {
            echo '<div class="alert alert-danger alert-dismissible fade show fixed-top" role="alert" style="margin-top:150px;width:370px;margin-left: auto;margin-right: 40px;font-size:18px;font-family: Montserrat, sans-serif;">
            User can not be delated !. Something wrong happened !
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';

            header("refresh:3;url=http://localhost:81/cats_mvc/admin/user/deleteUser");
        }
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
