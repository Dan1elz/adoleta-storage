class Troca {
  constructor(card, imagens, imagem1, imagem2, imagem3, imagem4) {
    this.card = document.querySelector(card);
    this.imagens = document.querySelectorAll(imagens);

    this.imagem1 = this.card.getAttribute(imagem1);
    this.imagem2 = this.card.getAttribute(imagem2);
    this.imagem3 = this.card.getAttribute(imagem3);
    this.imagem4 = this.card.getAttribute(imagem4);

    this.imagens.forEach((imagem, index) => {
      imagem.addEventListener("click", () => {
        this.troca(index);
      });
    });
  }

  troca(index) {
    if (index === 0) {
      this.card.src = this.imagem1;
    } else if (index === 1) {
      this.card.src = this.imagem2;
    } else if (index === 2) {
      this.card.src = this.imagem3;
    } else if (index === 3) {
      this.card.src = this.imagem4;
    }
  }
}
const troca = new Troca(
  ".card__img",
  ".img__link",
  "data-imagem1",
  "data-imagem2",
  "data-imagem3",
  "data-imagem4"
);
