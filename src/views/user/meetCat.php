<?php require_once("./src/views/templates/adminUser.php");

?>




<div class="container mt-3">
  <div class="row-content d-flex justify-content-center">
    <div class="col-md-5 w-50">
      <div class="box-shadow bg-white p-4" id="loginform">
        <h3 class="mb-4 text-center fs-1">Form to meet <?php echo $data['cat_name'] ?></h3>
        <div class="text-center">
          <a href="<?php echo URL ?>/user/cats" class="btn btn-primary back-cats w-50 mx-auto mt-2">Back</a>
        </div>
        <form class="mb-3" action="" method="post">
          <div class="form-floating mb-3">
            <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $data['id'] ?>">

          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" readonly name="username" id="username" placeholder="Type an username" value="<?php echo $_SESSION['username'] ?>">
            <label for="floatingInput">Username</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" readonly name="cat_name" id="cat_name" value="<?php echo $data['cat_name'] ?>">
            <label for="floatingInput">Cat</label>
          </div>
          <div class="form-floating mb-3">
            <input type="email" class="form-control" name="email" id="email" placeholder="Type an email">
            <label for="floatingInput">Email</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone">
            <label for="floatingInput">Phone (* Optional)</label>
          </div>
          <div class="form-group mt-3">
            <label for="exampleFormControlTextarea1" class="form-label">Comments (* Optional)</label>
            <textarea class="form-control" name="comments" id="comments" rows="3"></textarea>
          </div>
          <hr>
          <div class="d-grid gap-2 mb-3">
            <button type="submit" name="meetCat" id="meetCat" class="btn btn-dark btn-lg border-0 rounded-0">Send</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>







<?php


require_once("./src/views/templates/footer.php");



?>