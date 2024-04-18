window.onload = function () {

    document.getElementById("login").addEventListener("click", function (e) {


        /* VARIABLES*/
        const username = document.getElementById("username").value,
            password = document.getElementById("password").value;

        /*ERROR */
        if (username == "" || password == "") {
            swal("Watch out", "All fields are required", "warning");
            e.preventDefault();
        }


    });


}