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

class Heart {
  constructor(buttons, icons) {
    this.buttons = document.querySelectorAll(buttons);
    this.icons = document.querySelectorAll(icons);

    this.buttons.forEach((button, index) => {
      button.addEventListener("click", () => {
        this.favoritar(index);
      });
    });
  }

  favoritar(index) {
    const icon = this.icons[index];
    const visible = this.buttons[index];

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
  }
}

class Categoria {
  constructor(btns, listas) {
    this.btns = document.querySelectorAll(btns);
    this.listas = document.querySelectorAll(listas);

    this.btns.forEach((btn, index) => {
      btn.addEventListener("click", () => {
        this.categoria(index);
      });
    });
  }

  categoria(index) {
    const btn = this.btns[index];

    if (this.listas[index].style.display === "block") {
      this.listas[index].style.display = "none";
      this.listas[index].style.height = "0px";

      btn.querySelector(".button__icon i").classList.remove("bi-dash");
      btn.querySelector(".button__icon i").classList.add("bi-plus");
    } else {
      this.listas[index].style.display = "block";
      this.listas[index].style.height = "";

      btn.querySelector(".button__icon i").classList.remove("bi-plus");
      btn.querySelector(".button__icon i").classList.add("bi-dash");
    }
  }
}

class Hover {
  constructor(cards, imagem, dataImagem1, dataImagem2) {
    this.cards = document.querySelectorAll(cards);

    this.cards.forEach((card) => {
      const cardImagem = card.querySelector(imagem);
      const imagem1 = cardImagem.getAttribute(dataImagem1);
      const imagem2 = cardImagem.getAttribute(dataImagem2);

      card.addEventListener("mouseover", () => {
        this.EmCima(cardImagem, imagem2);
      });

      card.addEventListener("mouseout", () => {
        this.Sair(cardImagem, imagem1);
      });
    });
  }

  EmCima(imagem, imagem2) {
    imagem.src = imagem2;
    imagem.style.filter = "brightness(90%)";
  }

  Sair(imagem, imagem1) {
    imagem.src = imagem1;
    imagem.style.filter = "brightness(80%)";
  }
}

const heart = new Heart("[data-link]", ".icon__fav i");
const categoria = new Categoria("[data-title]", "[data-item='1']");
const troca = new Troca(
  ".card__img",
  ".img__link",
  "data-imagem1",
  "data-imagem2",
  "data-imagem3",
  "data-imagem4"
);
const hoverInstance = new Hover(
  ".card",
  ".card__img",
  "data-imagem1",
  "data-imagem2"
);
