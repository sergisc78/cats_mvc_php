<?php

ini_set('display_errors', 1);

ini_set('display_startup_errors', 1);

error_reporting(E_ALL);

require_once("./src/views/templates/adminUser.php");

?>

<?php
session_start();
session_unset();
session_destroy();




header("Location:http://localhost:81/cats_mvc/");

?>

<div class="container" id="welcome">
  <div class="row">
    <p class="text-center p-5 mb-0">Are you a catlover?. Would you like to adopt a cat?</p>
    <p class="text-center">Please, Login or Register. They're waiting for you !</p>

    <div class="d-grid gap-2 d-md-block text-center p-4">
      <a href="singUp" class="btn btn-success btn btn-lg" type="button">Register</a>
    </div>
  </div>
</div>



<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

<!-- DATATABLES AND JQUERY -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>



</body>

</html>

<?php


require_once("./src/views/templates/footer.php");



?>