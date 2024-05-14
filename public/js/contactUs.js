window.onload = function () {
  document.getElementById("contactUs").addEventListener("click", function (e) {
    /* VARIABLES */

    const name = document.getElementById("name").value,
      email = document.getElementById("email").value,
      subject = document.getElementById("subject").value,
      message = document.getElementById("message").value,
      emailFormat = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

    /* ERROR CONTROL */

    if (name == "" || email == "" || subject == "" || message == "") {
      swal.fire("Watch out !", "All fields are required !", "warning");
      e.preventDefault();
    } else if (!emailFormat.test(email)) {
      swal.fire("Watch out !", "Email format is not valid !", "warning");
      e.preventDefault();
    }
  });
};
