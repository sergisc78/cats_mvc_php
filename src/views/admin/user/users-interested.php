<?php require_once("./src/views/templates/adminNav.php");


?>


<h4 class="text-center mt-4" id="title">Users interested to adopt</h4>

<div class="container" id="allcats">

    <a href="<?php echo URL ?>/admin/dashboard" class="btn btn-primary mb-5 add">Back</a>

    <div class="row">

        <div class="col-lg-12">
            <table id="table" class="table table-bordered display" width="100%">
                <thead>
                    <tr>

                        <th>Username</th>
                        <th>Cat Name</th>
                        <th>Data of request</th>
                        <th>Contacted</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($data['user'] as $users) {
                    ?>
                        <tr>
                            <td><?php echo $users['username'] ?></td>
                            <td><?php echo $users['cat_name'] ?></td>
                            <td><?php echo $users['dateFormSent'] ?> </td>
                            <td><?php echo $users['contacted'] ?> </td>


                            <td>
                                <!-- EDIT CAT -->
                                <a href="view-user-interested/<?php echo $users['id'] ?>" class="btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square edit" title="View / Edit Request"></i></a>
                                <!-- DELETE CAT -->
                                <a href="deleteUserInterested/<?php echo $users['id'] ?>" data-id="<?php echo $users['id'] ?>" name="deleteRequest" class="btn btn-small btn-danger deleteButton"><i class="fa-solid fa-trash delete" title="Delete Request"></i></a>

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