<?php require_once("./src/views/templates/adminNav.php");


?>



<h4 class="text-center mt-4" id="title">Messages</h4>

<div class="container" id="allcats">

    <a href="<?php echo URL ?>/admin/dashboard" class="btn btn-primary mb-5 add">Back</a>

    <div class="row">

        <div class="col-lg-12">
            <table id="table" class="table table-bordered display" width="100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Date</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php



                    foreach ($data['user'] as $users) { ?>

                        <tr>
                            <td><?php echo $users['name'] ?> </td>
                            <td><?php echo $users['email'] ?> </td>
                            <td><?php echo $users['subject'] ?> </td>
                            <td><?php echo $users['message'] ?> </td>
                            <td><?php echo $users['date'] ?> </td>
                            <td>

                                <!-- DELETE MESSAGE -->
                                <a href="deleteMessage/<?php echo $users['id'] ?>" data-id="<?php echo $users['id'] ?>" class="btn btn-small btn-danger"><i class="fa-solid fa-trash delete" title="Delete Message"></i></a>




                            </td>


                        </tr>
                    <?php }
                    ?>
            </table>

        </div>
    </div>

    <br>
    <br>
    <br>



    <script>
        function deleteMessage(id) {

            Swal.fire({
                title: "Do you want to delete this message?",
                showCancelButton: true,
                confirmButtonText: "Delete it",
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    window.location = "usersMessages/" + id;
                    Swal.fire("Message deleted successfully!", "", "success");
                }
            });
        }



        /*    $(document).ready(function() {

                $('.delete').on('click', function(e) {

                    e.preventDefault();

                    var id = $(this).attr('data-id');
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
                                url: "deleteMessage.php="+id,
                                data: {
                                    id: id
                                },

                                success: function(data) {
                                    if (data != 1) {

                                        swal("Message deleted sucessfully!", {
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