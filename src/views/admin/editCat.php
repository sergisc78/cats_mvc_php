<?php


require_once("./src/views/templates/adminNav.php");
//VARIABLES FROM DASHBOARD.PHP




/*



$cat_image = $_GET['image'];
$cat_sex = $_GET['sex'];
$cat_age = $_GET['age'];
$cat_category = $_GET['category'];
$cat_description = $_GET['descr'];*/





?>

<!-- FORM  VIEW /UPDATE  CAT -->




<div class="container mt-5" style="width: 15000px;">
    <div class="row  justify-content-center align-items-center ">
        <div class="col-5" id="editcat">
            <div class="card">
                <div class="card-body">
                    <form class="text-center" action="<?php echo URL ?>/admin/editCat/<?php echo $data['id'] ?>" method="post" enctype="multipart/form-data">
                        <h3 class="mb-4 text-center fs-1">View / Edit <?php echo $data['cat_name'] ?></h3><a href="<?php echo URL ?>/admin/dashboard" class="btn btn-primary">Dashboard</a>
                        <div class="form-group mt-3">
                            <input type="hidden" class="form-control" value="<?php echo $data['id'] ?>" name="id" id="id" placeholder="ID">
                        </div>
                        <div class="form-group mt-3">

                            <?php if (!empty($data['cat_image'])) { ?>

                                <img src="<?php echo URL ?>/public/img/<?php echo $data['cat_image'] ?>" alt="cat_image" width="70%">
                                <br><br>
                                <?php } ?>
                                <label for="newimage" class="form-label">If you wish,choose another image</label>
                                <br>
                                <input type="file" name="cat_image">
                            
                        </div>
                        <div class="form-group mt-3">
                            <label for="name" class="form-label">Name</label>
                            <input class="form-control text-muted" name="cat_name" type="text" id="name" value="<?php echo $data['cat_name'] ?>">
                        </div>
                        <div class="form-group mt-3">
                            <label for="formFile" class="form-label">Sex</label>
                            <input class="form-control text-muted" name="cat_sex" type="text" text id="sex" value="<?php echo $data['cat_sex'] ?>">
                        </div>
                        <div class="form-group mt-3">
                            <label for="formFile" class="form-label">Age</label>
                            <input class="form-control" name="cat_age" type="text" id="age" value="<?php echo $data['cat_age'] ?>">
                        </div>
                        <div class="form-group mt-3">
                            <label for="formFile" class="form-label">Category</label>
                            <input class="form-control" type="text" name="cat_category" id="category" value="<?php echo $data['cat_category'] ?>">
                        </div>
                        <div class="form-group mt-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                            <textarea class="form-control" name="cat_description" id="exampleFormControlTextarea1" rows="3"><?php echo $data['cat_description'] ?></textarea>
                        </div>

                        <div class="d-grid gap-2 mt-4">
                            <form action="dashboard.php" method="post">
                                <button type="submit" name="edit" class="btn btn-dark btn-lg border-0 rounded-0">Are you sure you want to update this cat?</button>
                            </form>
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