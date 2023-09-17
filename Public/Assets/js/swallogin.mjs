import RootDirectory from "./utils/rootdir.js";
import swal from "sweetalert";
import slide from "./slider.mjs";

const slider = slide;
const rootDir = new RootDirectory();

document.addEventListener("click", (event) => {
  if (event.target.id === "login") {
    event.preventDefault();
    loginUser();
  }
});

function loginUser() {
  const usernameInput = document.getElementById("username").value;
  const passwordInput = document.getElementById("password").value;

  if (!usernameInput || !passwordInput) {
    showError("Please fill out all fields.");
    return;
  }

  var xhr = new XMLHttpRequest();
  xhr.open("POST", `${rootDir.getRootDirectory()}/User/loginUser`, true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      let response = xhr.responseText;
      if (response === "success") {
        showSuccess("Login successful!");
      } else if (response === "failed") {
        showError("Wrong username or password");
      } else {
        showError(response);
      }
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
    className: "w-1/2",
  }).then(() => {
    window.location.href = `${rootDir.getRootDirectory()}/Chat`;
  });
}

function showError(message) {
  swal({
    title: "Error",
    text: message,
    icon: "error",
    timer: 3000,
    button: false,
    className: "w-1/2",
  }).then(() => {
    window.location.reload(true);
  });
}
