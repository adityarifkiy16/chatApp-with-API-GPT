export default class NavbarService {
  constructor() {
    this.profilMenu = document.querySelector("#profile-menu");
    this.dotButton = document.querySelector("#dot-button");
    this.header = document.querySelector("header");
    this.hamburger = document.querySelector("#hamburger");
    this.menu = document.querySelector("#nav-menu");
    this.html = document.querySelector("html");

    // fixed navbar
    window.onscroll = () => {
      const fixedNav = this.header.offsetTop;
      if (window.scrollY > fixedNav) {
        this.header.classList.add("navbar-fixed");
      } else {
        this.header.classList.remove("navbar-fixed");
      }
    };

    document.addEventListener("click", (event) => {
      if (
        this.hamburger.classList.contains("hamburger-active") &&
        !this.menu.contains(event.target)
      ) {
        this.hamburger.classList.remove("hamburger-active");
        this.hamburger.classList.toggle("translate-x-64");
        this.menu.classList.remove("translate-x-64");
      }
    });
  }

  onDotbuttonClick(cb) {
    this.dotButton.addEventListener("click", cb);
  }

  onHamburgerClick(cb) {
    this.hamburger.addEventListener("click", cb);
  }
}
