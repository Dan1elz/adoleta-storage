const buttons = document.querySelectorAll("[data-link]");
const icons = document.querySelectorAll(".icon__fav i");

buttons.forEach((button, index) => {
  button.addEventListener("click", () => {
    const icon = icons[index];
    const visible = buttons[index];

    if (icon.classList.contains("bi-heart")) {
      icon.classList.remove("bi-heart");
      icon.classList.add("bi-heart-fill");
      icon.style.color = "#A9D9D0";
      icon.style.transition = "200ms";
      visible.style.visibility = "visible";
    } else {
      icon.classList.remove("bi-heart-fill");
      icon.classList.add("bi-heart");
      icon.style.color = "#FFF";
      icon.style.transition = "200ms";
      visible.style.visibility = "";
    }
  });
});
