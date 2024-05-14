<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';




//Create an instance; passing `true` enables exceptions

if (isset($_POST['contactUs'])) {
  $mail = new PHPMailer(true);

  //Server settings
  $mail->isSMTP();                              //Send using SMTP
  $mail->Host       = 'smtp.gmail.com';       //Set the SMTP server to send through
  $mail->SMTPAuth   = true;             //Enable SMTP authentication
  $mail->Username   = '';   //SMTP write your email
  $mail->Password   = 'ylwcusnenmukgsgn  ';      //SMTP password
  $mail->SMTPSecure = 'ssl';            //Enable implicit SSL encryption
  $mail->Port       = 465;

  //Recipients
  $mail->setFrom(''); // Sender Email and name
  $mail->addAddress($_POST["email"]);     //Add a recipient email  
  //$mail->addReplyTo($_POST["email"], $_POST["name"]); // reply to sender email

  //Content
  $mail->isHTML(true);               //Set email format to HTML
  $mail->Subject = $_POST["subject"];   // email subject headings
  $mail->Body    = $_POST["message"]; //email message

  // Success sent message alert
  $mail->send();

  if ($mail->send()) {
    echo '<div class="alert alert-success alert-dismissible fade show fixed-top" role="alert" style="margin-top:150px;width:370px;margin-left: auto;margin-right: 40px;font-size:18px;font-family: Montserrat,sans-serif;">
    Your message has been sent successfully !
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

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
  <title>Catlovers</title>

  <!-- LEAFLET CSS-->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

  <!-- LEAFLET JS-->
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

  <!-- BOOTSTRAP CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

  <!-- AJAX-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- CSS STYLESHEET-->
  <link rel="stylesheet" href="public/css/styles.css">

  <!-- GOOGLE FONTS-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">




</head>


<body>

  <nav class="navbar navbar-expand-lg bg-dark p-4">
    <div class="container-fluid bg-dark navbar-dark bg-dark">
      <a class="navbar-brand me-5 mb-3" href="././">Catlovers <i class="fa-solid fa-cat"></i> </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
          <li class="nav-item">
            <a class="nav-link" href="aboutUs">About Us</a>
          </li>
          <li class="nav-item">
            <a href="http://"><i class="fa-brands fa-facebook ms-1 me-3 mt-2"></i></a>
            <a href="http://"><i class="fa-brands fa-twitter me-3"></i></a>
            <a href="http://"><i class="fa-brands fa-instagram me-5"></i></a>
          </li>
        </ul>
        <form class="d-flex" role="search">
          <a href="login" type="button" class="btn btn-outline-primary btn-lg">Login</a>
        </form>
      </div>
    </div>
  </nav>

  <div class="container mt-3">
    <div class="row-content d-flex justify-content-center">
      <div class="col-md-5 w-50">
        <div class="box-shadow bg-white p-4" id="loginform">
          <h3 class="mb-4 text-center fs-1">Contact Us </h3>
          <div class="text-center">
            <a href="././" class="btn btn-primary back-cats w-50 mx-auto mt-2 mb-3">Back</a>
          </div>
          <form class="mb-3" action="" method="post">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" name="name" id="username" placeholder="Name">
              <label for="floatingInput">Name</label>
            </div>
            <div class="form-floating mb-3">
              <input type="email" class="form-control" name="email" id="email" placeholder="Type an email">
              <label for="floatingInput">Email</label>
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Type a subject">
              <label for="floatingInput">Subject</label>
            </div>
            <div class="form-group mt-3">
              <label for="exampleFormControlTextarea1" class="form-label">Message</label>
              <textarea class="form-control" name="message" id="message" rows="3"></textarea>
            </div>
            <hr>
            <div class="d-grid gap-2 mb-3">
              <button type="submit" name="contactUs" id="contactUs" class="btn btn-dark btn-lg border-0 rounded-0">Send</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <br>
  <br>



  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

  <!-- DATATABLES AND JQUERY -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>



</body>

</html>