<?php require_once("./src/views/templates/adminNav.php");

?>


<h4 class="text-center mt-4" id="title">All users</h4>

<div class="container" id="allcats">

    <div class="row">

        <div class="col-lg-12">
            <table id="table" class="table table-bordered display" width="100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Role ID</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($data['user'] as $users) {
                    ?>
                        <tr>
                            <td><?php echo $users['id'] ?> </td>
                            <td><?php echo $users['username'] ?> </td>
                            <td><?php echo $users['role_id'] ?> </td>
                            <td><?php echo $users['role'] ?> </td>

                            <td>
                                <!-- EDIT CAT -->
                                <a href="editUser/<?php echo $users['id'] ?>" class="btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square edit" title="View / Edit User"></i></a>
                                <!-- DELETE CAT -->
                                <a href="deleteUser/<?php echo $users['id'] ?>" class="btn btn-small btn-danger"><i class="fa-solid fa-trash delete" title="Delete Cat"></i></a>




                            </td>

                        </tr>
                    <?php
                    }
                    ?>
            </table>

        </div>
    </div>

    <br>
    <br>
    <br>




    <?php


    require_once("./src/views/templates/footer.php");



    ?>