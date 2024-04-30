window.onload = function () {
  document.getElementById("meetCat").addEventListener("click", function (e) {
    /* VARIABLES */

    const email = document.getElementById("email").value;
    const emailFormat = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

    /* ERROR CONTROL */

    if (email == "") {
      swal(
        "Watch out !",
        "Email is required, cause we want to contact you !",
        "warning"
      );
      e.preventDefault();
   }  
  });


document.getElementById("meetCat").addEventListener("click", function (e) {

  const email = document.getElementById("email").value;
    const emailFormat = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

 if (!emailFormat.test(email)) {
  swal("Watch out !", "Email format is not valid !", "warning");
  e.preventDefault();
}

});

};
