<?php

namespace Sergi\CatsMvc\models;

use Sergi\CatsMvc\lib\Database;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';


class Admin
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


    // CATS

    //SHOW ALL CATS
    public function getCats()
    {

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


        if (isset($_POST['add'])) {


            $cat_image = isset($_FILES['cat_image']['name']) ? $_FILES['cat_image']['name'] : '';
            $type = isset($_FILES['cat_image']['type']) ? $_FILES['cat_image']['type'] : '';
            $size = isset($_FILES['cat_image']['size']) ? $_FILES['cat_image']['size'] : '';
            $temp = isset($_FILES['cat_image']['tmp_name']) ? $_FILES['cat_image']['tmp_name'] : '';
            $location = '/opt/lampp/htdocs/cats_mvc/public/img/' . $cat_image;


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

    public function getUsersInterested()
    {

        $sql = "SELECT * FROM formMeetCat; ";
        $result = $this->db->prepare($sql);
        $result->execute();
        return $result->fetchAll();
    }

    public function getUserInterestedById($id)
    {

        $sql = "SELECT * FROM formMeetCat WHERE id=:id ";
        $result = $this->db->prepare($sql);
        $result->bindValue(":id", $id);
        $result->execute();
        return $result->fetch();
    }

    public function viewEditUserInterested()
    {


        if (isset($_POST['edit'])) {


            $id = isset($_POST['id']) ? $_POST['id'] : '';
            $contacted = isset($_POST['contacted']) ? $_POST['contacted'] : '';

            $sql_update = "UPDATE formMeetCat SET contacted=:contacted WHERE id=:id";
            $result = $this->db->prepare($sql_update);
            $result->bindParam(':id', $id);
            $result->bindParam(':contacted', $contacted);
            $result->execute();

            if ($result) {
                echo '<div class="alert alert-success alert-dismissible fade show fixed-top" role="alert" style="margin-top:150px;width:370px;margin-left: auto;margin-right: 40px;font-size:18px;font-family: Montserrat,sans-serif;">
                User Interested updated successfully !
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';


                header("refresh:3;url=http://localhost:81/cats_mvc/admin/user/users-interested");
            } else {
                echo '<div class="alert alert-danger alert-dismissible fade show fixed-top" role="alert" style="margin-top:150px;width:370px;margin-left: auto;margin-right: 40px;font-size:18px;font-family: Montserrat, sans-serif;">
                 Something wrong happened !
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';

                header("refresh:3;");
            }
        }
    }

    public function deleteUserInterested($id)
    {


        $sql_delete = "DELETE FROM formMeetCat WHERE id=:id";
        $result = $this->db->prepare($sql_delete);
        $result->bindParam(':id', $id);
        $result->execute();

        if ($result) {
            echo '<div class="alert alert-success alert-dismissible fade show fixed-top" role="alert" style="margin-top:150px;width:370px;margin-left: auto;margin-right: 40px;font-size:18px;font-family: Montserrat,sans-serif;">
            User request delated successfully !
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';

            header("refresh:3,url=http://localhost:81/cats_mvc/admin/user/users-interested");
        } else {
            echo '<div class="alert alert-danger alert-dismissible fade show fixed-top" role="alert" style="margin-top:150px;width:370px;margin-left: auto;margin-right: 40px;font-size:18px;font-family: Montserrat, sans-serif;">
            User request can not be delated !. Something wrong happened !
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';

            header("refresh:3;url=http://localhost:81/cats_mvc/admin/user/deleteUserInterested");
        }
    }


    public function contactUsMessage()
    {

        if (isset($_POST['contactUs'])) {

            $name = isset($_POST['name']) ? $_POST['name'] : '';
            $email = isset($_POST['email']) ? $_POST['email'] : '';
            $subject = isset($_POST['subject']) ? $_POST['subject'] : '';
            $message = isset($_POST['message']) ? $_POST['message'] : '';

            $sql = "INSERT INTO usersMessages (name,email,subject, message) VALUES(:name,:email,:subject,:message)";
            $result = $this->db->prepare($sql);
            $result->bindParam(':name', $name);
            $result->bindParam(':email', $email);
            $result->bindParam(':subject', $subject);
            $result->bindParam(':message', $message);
            $result->execute();


            if ($result) {
                echo '<div class="alert alert-success alert-dismissible fade show fixed-top" role="alert" style="margin-top:150px;width:370px;margin-left: auto;margin-right: 40px;font-size:18px;font-family: Montserrat,sans-serif;">
                The message has been sent successfully !
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                header("refresh:5,url=http://localhost:81/cats_mvc");
            } else {
                echo '<div class="alert alert-danger alert-dismissible fade show fixed-top" role="alert" style="margin-top:150px;width:370px;margin-left: auto;margin-right: 40px;font-size:18px;font-family: Montserrat, sans-serif;">
                Something wrong happened !
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                header("refresh:5,url=http://localhost:81/cats_mvc/contactUs");
            }
        }
    }

    public function getMessages()
    {

        $sql = "SELECT * FROM usersMessages";
        $result = $this->db->prepare($sql);
        $result->execute();
        return $result->fetchAll();
    }

    public function getMessageById($id)
    {
        $sql = "SELECT * FROM usersMessages WHERE id=:id";
        $result = $this->db->prepare($sql);
        $result->bindParam(':id', $id);
        $result->execute();
        return $result->fetch();
    }

    public function deleteMessage($id)
    {

        $sql = "DELETE FROM usersMessages WHERE id=:id";
        $result = $this->db->prepare($sql);
        $result->bindParam(':id', $id);
        $result->execute();

        if ($result) {
            echo '<div class="alert alert-success alert-dismissible fade show fixed-top" role="alert" style="margin-top:150px;width:370px;margin-left: auto;margin-right: 40px;font-size:18px;font-family: Montserrat,sans-serif;">
            Your message has been deleted successfully !
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            header("refresh:3,url=http://localhost:81/cats_mvc/admin/user/usersMessages");
        } else {
            echo '<div class="alert alert-danger alert-dismissible fade show fixed-top" role="alert" style="margin-top:150px;width:370px;margin-left: auto;margin-right: 40px;font-size:18px;font-family: Montserrat, sans-serif;">
            Something wrong happened !
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            header("refresh:3,url=http://localhost:81/cats_mvc/admin/user/deleteMessage");
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
