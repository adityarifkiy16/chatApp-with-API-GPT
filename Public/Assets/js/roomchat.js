// fixed navbar
window.onscroll = function () {
  const header = document.querySelector("header");
  const fixedNav = header.offsetTop;

  if (window.pageYOffset > fixedNav) {
    header.classList.add("navbar-fixed");
  } else {
    header.classList.remove("navbar-fixed");
  }
};

// hamburger
const hamburger = document.querySelector("#hamburger");
const menu = document.querySelector("#nav-menu");
const html = document.querySelector("html");

hamburger.addEventListener("click", function (event) {
  event.stopPropagation();
  hamburger.classList.toggle("hamburger-active");
  menu.classList.toggle("translate-x-64");
});

document.addEventListener("click", function (event) {
  if (
    hamburger.classList.contains("hamburger-active") &&
    !menu.contains(event.target)
  ) {
    // Sembunyikan side bar jika kondisi terpenuhi
    hamburger.classList.remove("hamburger-active");
    menu.classList.remove("translate-x-64");
    console.log("window clicked!");
  }
});

const profilMenu = document.querySelector("#profile-menu");
const dotButton = document.querySelector("#dot-button");

dotButton.addEventListener("click", function () {
  profilMenu.classList.toggle("hidden");
});

// logout

const logoutBtn = document.querySelector("#logout");
logoutBtn.addEventListener("click", function () {
  swal({
    title: "Are you sure?",
    icon: "warning",
    dangerMode: true,
    buttons: true,
  }).then((value) => {
    if (value) {
      swal({
        title: "Logout success!",
        text: "thank you for visiting my app :D",
        icon: "success",
        timer: 3000,
        buttons: false,
      }).then(() => {
        setTimeout(() => {
          window.location.href = `${rootDir}/User/logout`;
        }, 1000);
      });
    } else {
      window.location.reload(true);
    }
  });
});
