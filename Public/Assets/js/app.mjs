import ChatApp from "./chatapp.mjs";
import NavbarService from "./navbar.mjs";
import swal from "sweetalert";
import Logout from "./logout.js";
import RootDirectory from "./utils/rootdir.js";

const rootDir = new RootDirectory();
const chatapp = new ChatApp(rootDir.getRootDirectory());
const navbarservice = new NavbarService();
const logout = new Logout();

navbarservice.onHamburgerClick((event) => {
  event.stopPropagation();
  navbarservice.hamburger.classList.toggle("hamburger-active");
  navbarservice.menu.classList.toggle("translate-x-64");
});

navbarservice.onDotbuttonClick((event) => {
  navbarservice.profilMenu.classList.toggle("hidden");
});

logout.onClick(() => {
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
          window.location.href = `${rootDir.getRootDirectory()}/User/logout`;
        }, 1000);
      });
    } else {
      window.location.reload(true);
    }
  });
});
