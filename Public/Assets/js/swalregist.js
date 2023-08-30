const rootDir = window.location.origin + "/ChatAI/Public";
window.onload = function () {
  document.getElementById("register").addEventListener("click", registerUser);
};

function registerUser(event) {
  event.preventDefault();

  var xhr = new XMLHttpRequest();
  xhr.open("POST", `${rootDir}/User/registerHandling`, true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      var response = xhr.responseText;
      if (response === "success") {
        swal({
          title: "Success",
          text: "register successfully!",
          icon: "success",
          timer: 3000,
          button: false,
        }).then((value) => {
          window.location.href = `${rootDir}/User`;
        });
      } else {
        swal({
          title: "Error",
          text: "register failure, probably caused by an existing username!",
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
