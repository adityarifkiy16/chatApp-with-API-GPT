import RootDirectory from "./utils/rootdir.js";
import swal from "sweetalert";

const rootDir = new RootDirectory();

document.addEventListener("click", (event) => {
  if (event.target.id === "register") {
    event.preventDefault();
    registerUser();
  }
});

function registerUser() {
  const usernameInput = document.getElementById("username").value;
  const passwordInput = document.getElementById("password").value;

  var xhr = new XMLHttpRequest();
  xhr.open("POST", `${rootDir.getRootDirectory()}/User/registerHandling`, true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      var response = xhr.responseText;
      if (response === "success") {
        showSuccess("Registration successfull!");
      } else if (response === "invalid") {
        showError("Please fill out the field");
      } else if (response === "failed") {
        showError("Username already in use");
      }
    } else {
      showError(response);
    }
  };
  var data =
    "username=" +
    encodeURIComponent(usernameInput) +
    "&password=" +
    encodeURIComponent(passwordInput);
  xhr.send(data);
}

function showSuccess(message) {
  swal({
    title: "Success",
    text: message,
    icon: "success",
    timer: 3000,
    button: false,
    className: "w-3/4",
  }).then((value) => {
    window.location.href = `${rootDir.getRootDirectory()}/User`;
  });
}

function showError(message) {
  swal({
    title: "Error",
    text: message,
    icon: "error",
    timer: 3000,
    button: false,
    className: "w-3/4",
  }).then((value) => {
    window.location.reload(true);
  });
}
