<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <!-- FONT AWESOME-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- STYLES -->
    <link rel="stylesheet" href="public/css/styles.css">

    <!-- JS VALIDATIONS -->
    <script src="public/js/login.js"></script>

    <!--ALERTIFY CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />

    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Flex:opsz,wght@8..144,500&display=swap" rel="stylesheet">

    <!-- GOOGLE FONTS-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">

</head>





<body>

   <!-- <nav class="navbar navbar-expand-lg bg-dark p-4">
        <div class="container-fluid bg-dark navbar-dark bg-dark">
            <a class="navbar-brand" href="././">Catlovers <i class="fa-solid fa-cat"></i> </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="float-right " id="navbarSupportedContent">
                <ul class="navbar-nav me-4 mb-2 mb-lg-0 ">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="././">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../aboutUs">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../contactUs">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-success buttons" href="register">Register</a>
                    </li>

                </ul>

            </div>
        </div>
    </nav>-->

    <nav class="navbar navbar-expand-lg bg-dark p-4">
        <div class="container-fluid bg-dark navbar-dark bg-dark">
            <a class="navbar-brand me-5 mb-3" href="././">Catlovers <i class="fa-solid fa-cat"></i> </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                        <a class="nav-link" href="./">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="aboutUs">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contactUs">Contact Us</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">

                    <a href="singUp" type="button" class="btn btn-outline-primary btn-lg">Register</a>

                </form>
            </div>
        </div>
    </nav>

    <div class="container mt-3">
        <div class="row-content d-flex justify-content-center">
            <div class="col-md-5">
                <div class="box-shadow bg-white p-4" id="loginform">
                    <h3 class="mb-4 text-center fs-1">Login</h3>
                    <form class="mb-3" action="" method="post">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="username" id="username" placeholder="Type an username">
                            <label for="floatingInput">Username</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" name="user_password" id="password" placeholder="Password">
                            <label for="floatingInput">Password</label>
                        </div>
                        <div class="d-grid gap-2 mb-3">
                            <button type="submit" name="login" id="login" class="btn btn-dark btn-lg border-0 rounded-0">Login</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

    <!--ALERTIFY JS -->

    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <!--SWEET ALERT JS -->

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>

</html>