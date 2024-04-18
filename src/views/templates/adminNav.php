<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin dashboard</title>

    <!-- JQUERY -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

   <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>-->

    <!-- SWEET ALERT -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.7/sweetalert2.min.js" integrity="sha512-csaTzpLFmF+Zl81hRtaZMsMhaeQDHO8E3gBkN3y3sCX9B1QSut68NxqcrxXH60BXPUQ/GB3LZzzIq9ZrxPAMTg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- BOOTSTRAP CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <!-- FONT AWESOME-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- STYLES -->
    <link rel="stylesheet" href="../../../../cats_mvc/public/css/styles.css">

   

    <!--DATATABLES CSS-->

    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">


    <!-- FONT AWESOME -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- GOOGLE FONTS-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">

    <style>
        table thead {
            background: #373B44;
            /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #4286f4, #373B44);
            /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #4286f4, #373B44);
            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */


            margin-top: 100px;
        }

        #table_filter {
            margin-bottom: 20px;
        }

        .sorting {
            width: 160px;
        }
    </style>

</head>

<body>

    <?php

    use Sergi\CatsMvc\lib\Database;

    ob_start();

    // GET CONNECTION AND SHOW USERNAME AFTER LOGIN

    
    $db = new Database();
    $database = $db->connect();

    $sql_username = "SELECT username FROM users WHERE username=:username";
    $result = $database->prepare($sql_username);
    $result->bindValue(':username', $_SESSION['username']);
    $result->execute();

    ?>


    <nav class="navbar navbar-expand-lg bg-dark p-4">
        <div class="container-fluid bg-dark navbar-dark bg-dark">
            <a class="navbar-brand me-5 mb-3" href="<?php echo URL ?>/admin/dashboard">Catlovers <i class="fa-solid fa-cat"></i> </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                    <li class="nav-item">
                        <!-- <a class="nav-link active" aria-current="page" href="../../views/admin/dashboard.php">Home</a>-->
                        <a class="nav-link" href="#">User: <?php echo " " . $_SESSION["username"]; ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URL?>/admin/user/users">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URL?>/admin/dashboard">Cats</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <a href="<?php echo URL?>/admin/logout" type="button" class="btn btn-outline-primary btn-lg">Logout</a>
                </form>
            </div>
        </div>
    </nav>

    

   