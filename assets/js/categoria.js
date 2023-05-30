const btns = document.querySelectorAll("[data-title]");
const listas = document.querySelectorAll("[data-item='1']");

btns.forEach((btn, index) => {
  btn.addEventListener("click", () => {
    if (listas[index].style.display == "block") {
      listas[index].style.display = "none";
      listas[index].style.height = "0px";

      btn.querySelector(".button__icon i").classList.remove("bi-dash");
      btn.querySelector(".button__icon i").classList.add("bi-plus");
    } else {
      listas[index].style.display = "block";
      listas[index].style.height = "";

      btn.querySelector(".button__icon i").classList.remove("bi-plus");
      btn.querySelector(".button__icon i").classList.add("bi-dash");
    }
  });
});
