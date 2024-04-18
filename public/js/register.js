window.onload = function () {
    document.getElementById("register").addEventListener("click", function (e) {

        /* VARIABLES */

        const username = document.getElementById("username").value,
            password = document.getElementById("password").value,
            confirm_password = document.getElementById("confirm_password").value;



        /* ERROR CONTROLS */


        if (username.length > 10) {
            swal(
                "Watch out !",
                "Username too long ! 10 characters maximum !",
                "error"
            );
            e.preventDefault();
        } else if (username == "" || password == "" || confirm_password == "") {
            swal("Watch out !", "All fields are required !", "warning");
            e.preventDefault();
        } else if (password.length < 8) {
            swal("Watch out !", "Password too much short and weak !", "error");
            e.preventDefault();
        } else if (password != confirm_password) {
            swal(
                "Watch out !",
                "Password and confirm password don't match!",
                "error"
            );
            e.preventDefault();
        }

    })
}