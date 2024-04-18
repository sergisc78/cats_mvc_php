<?php


require_once("./src/views/templates/adminNav.php");


?>

<!-- FORM  VIEW /UPDATE  USER -->


<div class="container mt-5" style="width: 15000px;">
    <div class="row  justify-content-center align-items-center ">
        <div class="col-5" id="editcat">
            <div class="card">
                <div class="card-body">
                    <form class="text-center" action="<?php echo URL ?>/admin/user/editUser/<?php echo $data['id'] ?>" method="post">
                        <h3 class="mb-4 text-center fs-1">View / Edit <?php echo $data['username'] ?></h3><a href="<?php echo URL ?>/admin/user/users" class="btn btn-primary">Users</a>
                        <div class="form-group mt-3">
                            <input type="hidden" class="form-control" value="<?php echo $data['id'] ?>" name="id" id="id" placeholder="ID">
                        </div>
                        <div class="form-group mt-3">
                            <label for="name" class="form-label">Username</label>
                            <input class="form-control" name="username" type="text" id="username" value="<?php echo $data['username'] ?>">
                        </div>
                        <div class="form-group mt-3">
                            <label for="formFile" class="form-label">Role ( 1 -Admin || 2-User)</label>
                            <input class="form-control" name="role_id" type="text" text id="role_id" value="<?php echo $data['role_id'] ?>">
                        </div>

                        <div class="d-grid gap-2 mt-4">
                            <button type="submit" name="edit" class="btn btn-dark btn-lg border-0 rounded-0">Are you sure you want to update this user?</button>
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