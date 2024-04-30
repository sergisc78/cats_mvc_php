<?php


require_once("./src/views/templates/adminNav.php");


?>

<!-- DELETE USER REQUEST/INTERESTED -->


<div class="container mt-5" style="width: 15000px;">
    <div class="row  justify-content-center align-items-center ">
        <div class="col-5" id="editcat">
            <div class="card">
                <div class="card-body">
                    <form class="text-center" action="<?php echo URL ?>/admin/user/deleteUserInterested/<?php echo $data['id'] ?>" method="post">
                        <h3 class="mb-4 text-center fs-1">Delete Request?</h3><a href="<?php echo URL ?>/admin/user/users-interested" class="btn btn-primary">Back to users interested</a>
                        <div class="form-group mt-3">
                            <input type="hidden" class="form-control" value="<?php echo $data['id'] ?>" name="id" id="id" placeholder="ID">
                        </div>

                        <div class="form-group mt-3">
                            <label for="name" class="form-label">Username</label>
                            <input class="form-control" name="username" type="text" id="username" value="<?php echo $data['username'] ?>">
                        </div>
                        <div class="form-group mt-3">
                            <label for="formFile" class="form-label">Cat Name</label>
                            <input class="form-control" readonly name="cat_name" type="text" text id="cat_name" value="<?php echo $data['cat_name'] ?>">
                        </div>
                        <div class="form-group mt-3">
                            <label for="formFile" class="form-label">Email</label>
                            <input class="form-control" readonly name="email" type="text" text id="cat_name" value="<?php echo $data['email'] ?>">
                        </div>
                        <div class="form-group mt-3">
                            <label for="formFile" class="form-label">Phone</label>
                            <input class="form-control" readonly name="phone" type="text" text id="phone" value="<?php echo $data['phone'] ?>">
                        </div>
                        <div class="form-group mt-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Comments</label>
                            <textarea class="form-control" name="comments" id="exampleFormControlTextarea1" rows="3"><?php echo $data['comments'] ?></textarea>
                        </div>
                        <div class="form-group mt-3">
                            <label for="formFile" class="form-label">Contacted</label>
                            <input class="form-control" name="contacted" type="text" text id="contacted" value="<?php echo $data['contacted'] ?>">
                        </div>

                        <div class="d-grid gap-2 mt-4">
                            <button type="submit" name="edit" class="btn btn-dark btn-lg border-0 rounded-0">Are you sure you want to delete this user request?</button>
                        </div>
                        <br>

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