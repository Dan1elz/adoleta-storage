class Navbar {
  constructor() {
    this.largura = window.innerWidth || document.documentElement.clientWidth;
    this.divNav = document.querySelector(".Menu__Links");
    this.colunas = document.querySelectorAll(".Menu__Links ul li");
    this.pesquisa = document.querySelector(".Menu");

    if (this.largura < 625) {
      this.divNav.addEventListener("mouseenter", () => {
        this.pesquisa.style.display = "none";
      });

      this.divNav.addEventListener("mouseleave", () => {
        this.pesquisa.style.display = "";
      });
    } else if (this.largura > 625) {
      this.divNav.addEventListener("mouseenter", () => {
        this.pesquisa.style.display = "";
      });
    }
  }
}
function initNavbar() {
  const nav = new Navbar();
}

window.addEventListener("resize", initNavbar);
window.addEventListener("load", initNavbar);
