<?php require_once("./src/views/templates/adminNav.php");

  //session_start();

    if (!isset($_SESSION['username'])) { // IF USER IS NOT LOGGED IN 

        header("Location:http://localhost:81/cats_mvc/login");
    }
?>



<h4 class="text-center mt-4" id="title">All cats</h4>

<div class="container" id="allcats">

    <a href="<?php echo URL ?>/admin/addCat" class="btn btn-primary mb-5 add">Add new cat</a>

    <div class="row">

        <div class="col-lg-12">
            <table id="table" class="table table-bordered display" width="100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Sex</th>
                        <th>Age</th>
                        <th>Category</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($data['cat'] as $cats) {
                    ?>
                        <tr>
                            <td><?php echo $cats['id'] ?> </td>
                            <td><img src="../../../../cats_mvc/public/img/<?php echo $cats['cat_image'] ?>" alt="" width="140"></td>
                            <td><?php echo $cats['cat_name'] ?> </td>
                            <td><?php echo $cats['cat_sex'] ?> </td>
                            <td><?php echo $cats['cat_age'] ?> </td>
                            <td><?php echo $cats['cat_category'] ?> </td>
                            <td>
                                <!-- EDIT CAT -->
                                <a href="editCat/<?php echo $cats['id'] ?>" class="btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square edit" title="View / Edit Cat"></i></a>
                                <!-- DELETE CAT -->
                                <a href="deleteCat/<?php echo $cats['id'] ?>"  class="btn btn-small btn-danger"><i class="fa-solid fa-trash delete" title="Delete Cat"></i></a>
                               



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