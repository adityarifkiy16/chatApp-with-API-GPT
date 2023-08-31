const rootDir = window.location.origin + "/ChatAI/Public";
window.onload = function () {
  document.getElementById("login").addEventListener("click", loginUser);
};

function loginUser(event) {
  event.preventDefault();

  var xhr = new XMLHttpRequest();
  xhr.open("POST", `${rootDir}/User/loginUser`, true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      var response = xhr.responseText;
      if (response === "success") {
        swal({
          title: "Success",
          text: "login successfully!",
          icon: "success",
          timer: 3000,
          button: false,
        }).then((value) => {
          window.location.href = `${rootDir}/Chat`;
        });
      } else if (response === "invalid") {
        swal({
          title: "Error",
          text: "Please fill out the field",
          icon: "error",
          timer: 3000,
          button: false,
        }).then((value) => {
          window.location.reload(true);
        });
      } else if (response === "failed") {
        swal({
          title: "Error",
          text: "wrong username or password!",
          icon: "error",
          timer: 3000,
          button: false,
        }).then((value) => {
          window.location.reload(true);
        });
      }
    }
  };
  var data =
    "username=" +
    encodeURIComponent(document.getElementById("username").value) +
    "&password=" +
    encodeURIComponent(document.getElementById("password").value);
  xhr.send(data);
}
