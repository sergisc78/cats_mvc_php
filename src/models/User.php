<?php

namespace Sergi\CatsMvc\models;
use PDO;
use Sergi\CatsMvc\lib\Database;

class User{

    private $db;


    // GET CONNECTION

    public function getConnection()
    {

        $this->db = new Database();
        $this->db = $this->db->connect();
    }

    // CREATE USER

    public function singUp()
    {

        $username = isset($_POST['username'])   ? $_POST['username'] : '';
        $password = isset($_POST['user_password']) ? $_POST['user_password'] : '';
        $user_password = password_hash($password, PASSWORD_DEFAULT);

        $this->getConnection();

        // IF USER EXIST

        if (isset($_POST['register'])) {
            $sql_select = "SELECT * FROM users WHERE username=:username";
            $result = $this->db->prepare($sql_select);
            $result->bindParam(':username', $username);
            $result->execute();
            $count = $result->rowCount();


            if ($count != 0) {

                echo '<div class="alert alert-danger alert-dismissible fade show fixed-top" role="alert" style="margin-top:150px;width:370px;margin-left: auto;margin-right: 40px;font-size:18px; font-family: Montserrat, sans-serif;">
                Username exist ! . Choose another one !
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';

                header('refresh:1,url=singUp');
            }

            //INSERT USER INTO DATABASE

            else {
                $sql_insert = "INSERT INTO users (username, user_password) VALUES (:username,:user_password)";
                $result2 = $this->db->prepare($sql_insert);

                $result2->bindParam(":username", $username);
                $result2->bindParam(":user_password", $user_password);
                $result2->execute();


                echo '<div class="alert alert-success alert-dismissible fade show fixed-top" role="alert" style="margin-top:150px;width:370px;margin-left: auto;margin-right: 40px;font-size:18px;font-family: Montserrat, sans-serif;">
                User registered successfully ! . We will redirect you to login page !
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';

                header("refresh:5,url=login");
            }
        }
    }

    //LOGIN

    public function login()
    {

        $username = isset($_POST['username']) ? $_POST['username'] : '';
        $user_password = isset($_POST['user_password']) ? $_POST['user_password'] : '';
        $hash_password = password_hash($user_password, PASSWORD_DEFAULT);
        //$role = isset($_POST['role_id']) ? $_POST['role_id'] : '';
        $count = 0;

        $this->getConnection();

        if (isset($_POST['login'])) {


            $sql_select = "SELECT * FROM users WHERE username=:username";
            $result = $this->db->prepare($sql_select);
            $result->bindParam(':username', $username);

            // $result->bindParam(2, $admin_password);
            $result->execute();
            $count = $result->rowCount();


            // IF USER EXIST
            if ($count > 0) {

                //session_start(); 

                $_SESSION['username'] = $_POST['username'];// IF USER EXIST, SESSION STARTS

                while ($user = $result->fetch(PDO::FETCH_ASSOC)) {

                    // PASSWORD_VERIFY
                    if (password_verify($user_password, $user['user_password'])) {

                        // IF ROLE IS ADMIN
                        if ($user['role_id'] == 1) {

                            echo '<div class="alert alert-success alert-dismissible fade show fixed-top" role="alert" style="margin-top:150px;width:370px;margin-left: auto;margin-right: 40px;font-size:18px;font-family: Montserrat, sans-serif;">
                             Admin logged in sucessfully ! Wait ... 
                             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';

                            header("refresh:3,url=admin/dashboard");

                        } else { // IF ROLE IS USER

                            echo '<div class="alert alert-success alert-dismissible fade show fixed-top" role="alert" style="margin-top:150px;width:370px;margin-left: auto;margin-right: 40px;font-size:18px;font-family: Montserrat, sans-serif;">
                             User logged in sucessfully ! Wait ...
                             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                           </div>';

                            header("refresh:3,url=user/cats");
                        }
                    } else {
                        echo '<div class="alert alert-success alert-dismissible fade show fixed-top" role="alert" style="margin-top:150px;width:370px;margin-left: auto;margin-right: 40px;font-size:18px;font-family: Montserrat, sans-serif;">
                         Username or password wrong !
                         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                       </div>';
                        header('refresh:2,url=login');
                    }
                }
            }
        }
    }


}