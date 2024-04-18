window.onload = function () {

    document.getElementById("add").addEventListener("click", function (e) {


        const name = document.getElementById("name").value,
            sex = document.getElementById("sex").value,
            age = document.getElementById("age").value,
            category = document.getElementById("category").value,
            description = document.getElementById("description").value;


        if (name == "" || sex == "" || age == "" || category == "" || description == "") {
            swal("Watch out !", "All fields, except image, are required !", "warning");
            e.preventDefault();

        }
    })
}