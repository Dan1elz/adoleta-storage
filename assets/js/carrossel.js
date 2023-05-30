const images = document.querySelectorAll("[data-img]");
const leftButton = document.querySelector("[data-left]");
const rightButton = document.querySelector("[data-right]");
const label1 = document.querySelector("[for=imagem1]");
const label2 = document.querySelector("[for=imagem2]");
const label3 = document.querySelector("[for=imagem3]");

label1.addEventListener("click", function () {
  images.forEach((image) => (image.style.transform = "translateX(0px)"));
  atualizaLabel(images[0]);
});
label2.addEventListener("click", function () {
  images.forEach((image) => (image.style.transform = "translateX(-930px)"));
  atualizaLabel(images[1]);
});
label3.addEventListener("click", function () {
  images.forEach((image) => (image.style.transform = "translateX(-1860px)"));
  atualizaLabel(images[2]);
});

rightButton.addEventListener("click", function () {
  images.forEach((image) => {
    if (image.style.transform === "") {
      image.style.transform = "translateX(-930px)";
      atualizaLabel(image);
    } else if (image.style.transform === "translateX(-930px)") {
      image.style.transform = "translateX(-1860px)";
      atualizaLabel(image);
    } else if (image.style.transform === "translateX(-1860px)") {
      image.style.transform = "translateX(0px)";
      atualizaLabel(image);
    } else if (image.style.transform === "translateX(0px)") {
      image.style.transform = "translateX(-930px)";
      atualizaLabel(image);
    }
  });
});

leftButton.addEventListener("click", function () {
  images.forEach((image) => {
    if (image.style.transform === "") {
      image.style.transform = "translateX(-1860px)";
      atualizaLabel(image);
    } else if (image.style.transform === "translateX(-1860px)") {
      image.style.transform = "translateX(-930px)";
      atualizaLabel(image);
    } else if (image.style.transform === "translateX(-930px)") {
      image.style.transform = "translateX(0px)";
      atualizaLabel(image);
    } else if (image.style.transform === "translateX(0px)") {
      image.style.transform = "";
    }
  });
});

function atualizaLabel(image) {
  if (image.style.transform === "translateX(0px)") {
    label1.classList.add("on");
    label2.classList.remove("on");
    label3.classList.remove("on");
  } else if (image.style.transform === "translateX(-930px)") {
    label1.classList.remove("on");
    label2.classList.add("on");
    label3.classList.remove("on");
  } else if (image.style.transform === "translateX(-1860px)") {
    label1.classList.remove("on");
    label2.classList.remove("on");
    label3.classList.add("on");
  }
}
function avança() {
  rightButton.click();
}
let timer = setInterval(avança, 5000);

images.forEach((image) => {
  image.addEventListener("mouseover", () => clearInterval(timer));
});
images.forEach((image) => {
  image.addEventListener("mouseout", () => {
    timer = setInterval(avança, 5000);
  });
});
