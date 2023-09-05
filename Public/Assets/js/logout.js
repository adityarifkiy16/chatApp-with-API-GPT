// logout
export default class Logout {
  constructor() {
    this.logoutBtn = document.querySelector("#logout");
  }

  onClick(callback) {
    this.logoutBtn.addEventListener("click", callback);
  }
}
