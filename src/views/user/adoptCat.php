<?php require_once("./src/views/templates/adminUser.php");

?>


<?php echo $data['user_id'] ?>

<div class="container-cat">
<form action="" method="post" enctype="multipart/form-data">
  <div class="card">
    <img src="<?php echo URL ?>/public/img/<?php echo $data['cat_image'] ?>" id="cat_img" alt="cat_image">
    <a href="<?php echo URL ?>/user/cats" class="btn btn-primary back-to-cats mt-2">Back</a>
    <div class="card-body">
      <p class="card-text"><?php echo $data['cat_name'] ?> (<?php echo $data['cat_sex'] ?>) is <?php echo $data['cat_age'] ?>.</p>
      <p class="description-text"><?php echo $data['cat_description'] ?></p>
      <button type="submit" class="btn btn-success btn-lg like-to-know">Would you like to kwow him /her?</a>
    </div>
  </div>
</form>
</div>






<?php


require_once("./src/views/templates/footer.php");



?>