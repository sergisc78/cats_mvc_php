<?php


require_once("./src/views/templates/adminNav.php"); ?>

<!-- FORM ADD ADULT CAT -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a new cat</title>

</head>

<body>

    <div class="container mt-5" style="width: 15000px;">
        <div class="row  justify-content-center align-items-center ">
            <div class="col-5">
                <div class="card">
                    <div class="card-body">
                        <form class="text-center" method="post" enctype="multipart/form-data">
                            <h3 class="mb-4 text-center fs-1">Add Cat</h3><a href="dashboard" class="btn btn-primary">Back</a>
                            <div class="form-group mt-3">
                                <label for="image" class="form-label">Image</label>
                                <input class="form-control" name="cat_image" type="file" id="image" size="20%">
                            </div>
                            <div class="form-group mt-3">
                                <label for="name" class="form-label">Name</label>
                                <input class="form-control" name="cat_name" type="text" id="name">
                            </div>
                            <div class="form-group mt-3">
                                <label for="formFile" class="form-label">Sex</label>
                                <input class="form-control" name="cat_sex" type="text" id="sex">
                            </div>
                            <div class="form-group mt-3">
                                <label for="formFile" class="form-label">Age</label>
                                <input class="form-control" name="cat_age" type="text" id="age">
                            </div>
                            <div class="form-group mt-3">
                                <label for="formFile" class="form-label">Category</label>
                                <input class="form-control" type="text" name="cat_category" id="category">
                            </div>

                            <div class="form-group mt-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                                <textarea class="form-control" name="cat_description" id="description" rows="3"></textarea>
                            </div>
                            <div class="d-grid gap-2 mt-4">
                                <button type="submit" name="add" id="add" class="btn btn-dark btn-lg border-0 rounded-0">Add</button>
                            </div>
                            <br>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
    <br>
    <br>

    <?php require_once("./src/views/templates/footer.php"); ?>