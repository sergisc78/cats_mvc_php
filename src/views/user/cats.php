<?php require_once("./src/views/templates/adminUser.php");

if (!isset($_SESSION['username'])) { // IF USER IS NOT LOGGED IN 

  header("Location:http://localhost:81/cats_mvc/login");
}

?>


<?php

/* SQL SELECT */

$id = isset($_POST['id']) ? $_POST['id'] : '';
$user_id = isset($_POST['id']) ? $_POST['id'] : '';


$sql_select = "SELECT * FROM cats";
$result = $database->prepare($sql_select);
$result->execute();
//$count = $result->rowCount();
//return $result->fetchAll();




/* -------------------------------------------- PAGINATION CODE ------------------------------------------- */

$page = isset($_GET['page']) ? $_GET['page'] : '';

$size_page = 3; /* PAGINATION VARIABLE */

$countCats = $result->rowCount();


$pages = ceil($countCats / $size_page);

/* TO SHOW 3 CATS PER PAGE */

if (!$_GET) { // ALWAYS REDIRECT TO PAGE=1

  header("Location:cats?page=1");
}

if ($_GET['page'] > $size_page || $_GET['page'] <= 0) { // IF PAGE DOESN´T EXIST, REDIRECT TO PAGE=1

  header("Location:cats?page=1");
}

$beginToCount = ($_GET['page'] - 1) * $size_page;

$sql_cats = "SELECT * FROM cats LIMIT $beginToCount,$size_page";

$resultLimit = $database->prepare($sql_cats);

$resultLimit->execute();

$adultCountCats = $resultLimit->rowCount();



/* ----------------------------------------- END PAGINATION CODE ---------------------------------------------- */


?>

<h4 class="text-center m-5" id="title">Cats for adoption</h4>

<!-- BOOTSTRAP PAGINATION -->

<nav aria-label="Page navigation example">

  <ul class="pagination justify-content-center me-5 mb-5 pagination-lg">
    <li class="page-item <?php echo $_GET['page'] <= 1 ? 'disabled' : '' ?>">
      <a class="page-link" href="cats?page=<?php echo $_GET['page'] - 1 ?>">Previous</a>
    </li>

    <?php for ($i = 0; $i < $pages; $i++) : ?>
      <li class="page-item <?php echo $_GET['page'] == $i + 1 ? 'active' : '' ?>">
        <a class="page-link" href="cats?page=<?php echo $i + 1 ?>">
          <?php echo $i + 1 ?>
        </a>
      </li>
    <?php endfor ?>

    <li class="page-item" <?php echo $_GET['page'] >= $pages ? 'disabled' : '' ?>>
      <a class="page-link" href="cats?page=<?php echo $_GET['page'] + 1 ?>">Next</a>
    </li>
  </ul>
</nav>






<?php




foreach ($resultLimit as $cats) {



?>





  <!--<div class="container c-cats">

    <div class="card ms-4 mb-5" style="width: 18rem;float:left;width:30%;margin:auto;" id="catsforadoption">
      <img src="../../../../cats_mvc/public/img/<?php echo $cats['cat_image'] ?>" class="card-img-top text-center" alt="..." style=" width:  100%;
    height: 300px;">
      <div class="row h-100">
        <div class="col mt-2"  >
        <h5 class="text-center">Name</h5>
          <div class="card-body" >
            <h2 class=" text-center"><?php echo $cats['cat_name'] ?></h2>
          </div>
          <hr>
          <div class="col">
            <h5 class="text-center">Sex</h5>
            <p class="text-center"><?php echo $cats['cat_sex'] ?></p>
          </div>
          <hr>
          <div class="col">
            <h5 class="text-center">Age</h5>
            <p class="text-center"><?php echo $cats['cat_age'] ?></p>
          </div>
          <hr>
          <div class="col">
            <h5 class="text-center">Category</h5>
            <p class="text-center"><?php echo $cats['cat_category'] ?></p>
          </div>
          <hr>
          

          <a href="cat/<?php echo $cats['id'] ?>" class="btn btn-success d-grid gap-2 btn-lg">View Cat</a>
          
 
          <br>
        </div>
      </div>
    </div>

  </div>-->

  <div class="text-center container-cat w-100 ">
    <div class="row justify-content-center aling-items-center ">
      <div class="col-7">
        <div class="card">
          <img src="<?php echo URL ?>/public/img/<?php echo $cats['cat_image'] ?>" id="cat_img" alt="cat_image" width="100%">
          <a href="<?php echo URL ?>/user/cats" class="btn btn-primary back-to-cats mt-2">Back</a>
          <div class="card-body">
            <p class="card-text"><?php echo $cats['cat_name'] ?> (<?php echo $cats['cat_sex'] ?>) is <?php echo $cats['cat_age'] ?>.</p>
            <p class="description-text"><?php echo $cats['cat_description'] ?></p>
            <a href="<?php echo URL ?>/user/meetCat/<?php echo $cats['id'] ?>" type="submit" class="btn btn-success btn-lg like-to-know">Would you like to meet him /her?</a>
          </div>
        </div>
      </div>
      <br>

    </div>
  </div>
  </div>





<?php

}
?>

<!-- BOOTSTRAP PAGINATION -->

<nav aria-label="Page navigation example">

  <ul class="pagination justify-content-center me-5 mb-5 pagination-lg">
    <li class="page-item <?php echo $_GET['page'] <= 1 ? 'disabled' : '' ?>">
      <a class="page-link" href="cats?page=<?php echo $_GET['page'] - 1 ?>">Previous</a>
    </li>

    <?php for ($i = 0; $i < $pages; $i++) : ?>
      <li class="page-item <?php echo $_GET['page'] == $i + 1 ? 'active' : '' ?>">
        <a class="page-link" href="cats?page=<?php echo $i + 1 ?>">
          <?php echo $i + 1 ?>
        </a>
      </li>
    <?php endfor ?>

    <li class="page-item" <?php echo $_GET['page'] >= $pages ? 'disabled' : '' ?>>
      <a class="page-link" href="cats?page=<?php echo $_GET['page'] + 1 ?>">Next</a>
    </li>
  </ul>
</nav>



<br>
<br>
<br>




<?php


require_once("./src/views/templates/footer.php");



?>