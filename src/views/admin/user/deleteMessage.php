<?php require_once("./src/views/templates/adminNav.php");


?>


<div class="container mt-3">
    <div class="row-content d-flex justify-content-center">
        <div class="col-md-5 w-50">
            <div class="box-shadow bg-white p-4" id="loginform">
                <h3 class="mb-4 text-center fs-1">Are you sure you want to delete <?php echo $data['name'] ?> message? </h3>
                <div class="text-center">

                </div>
                <form class="mb-3" action="" method="post">
                    <div class="form-group mt-3">
                        <input type="hidden" class="form-control" value="<?php echo $data['id'] ?>" name="id" id="id" placeholder="ID">
                    </div>
                    <div class="d-grid gap-2 mb-3">
                        <button type="submit" name="contactUs" id="contactUs" class="btn btn-warning btn-lg border-0 rounded-0">Yes</button>
                        <a href="././" class="btn btn-danger btn-lg back-cats w-100 mt-3 border-0 rounded-0">No</a>
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