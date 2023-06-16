const imagem = document.querySelector(".card__img");
const imagens = document.querySelectorAll(".img__link");

const imagem1 = imagem.getAttribute("data-imagem1");
const imagem2 = imagem.getAttribute("data-imagem2");
const imagem3 = imagem.getAttribute("data-imagem3");
const imagem4 = imagem.getAttribute("data-imagem4");

imagens.forEach(function (link, index) {
  link.addEventListener("click", function () {
    if (index === 0) {
      imagem.src = imagem1;
    } else if (index === 1) {
      imagem.src = imagem2;
    } else if (index === 2) {
      imagem.src = imagem3;
    } else if (index === 3) {
      imagem.src = imagem4;
    }
  });
});
