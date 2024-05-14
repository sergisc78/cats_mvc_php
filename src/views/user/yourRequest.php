<?php require_once("./src/views/templates/adminUser.php");


?>



<h4 class="text-center mt-4" id="title">Your Request</h4>

<div class="container" id="allcats">

    <a href="<?php echo URL ?>/user/cats" class="btn btn-primary mb-5 add">Back to cats</a>

    <div class="row">

        <div class="col-lg-12">
            <table id="table" class="table table-bordered display" width="100%">
                <thead>
                    <tr>
                        <th>Cat</th>
                        <th>Your Email</th>
                        <th>Comments</th>
                        <th>Date of your request</th>

                    </tr>
                </thead>
                <tbody>
                    <?php

                    if ($data['user']) {

                        foreach ($data['user'] as $users) { ?>

                            <tr>
                                <td><?php echo $users['cat_name'] ?> </td>
                                <td><?php echo $users['email'] ?> </td>
                                <td><?php echo $users['comments'] ?> </td>
                                <td><?php echo $users['dateFormSent'] ?> </td>


                            </tr>
                    <?php }
                    } ?>
            </table>

        </div>
    </div>

    <br>
    <br>
    <br>



    <script>
        /*  $(document).ready(function() {

             $('.deleteButton').on('click', function(e) {

                 e.preventDefault();

                 var id = $(this).attr('href');
                 console.log(id);

                 swal({
                     title: "Are you sure you want to delete this cat?",
                     icon: "warning",
                     buttons: true,
                     dangerMode: true,
                 }).then((willDelete) => {
                     if (willDelete) {
                         $.ajax({
                             type: "POST",
                             url: "deleteCat",
                             data: {
                                 id: id
                             },

                             success: function(data) {
                                 if (data != 1) {

                                     swal("Cat deleted sucessfully!", {
                                         icon: "success",
                                         timer: 3000
                                     }).then(function() {
                                         location.reload();
                                     });
                                 } else {
                                     swal("Error ! Cat can't be deleted !");
                                 }


                             }
                         });
                     }

                 });



             });


         })*/
    </script>






    <?php


    require_once("./src/views/templates/footer.php");



    ?>