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
class Categoria2 {
  constructor(btn, listas) {
    this.btn = document.querySelector(btn);
    this.listas = document.querySelectorAll(listas);

    if (this.btn) {
      this.btn.addEventListener("click", () => {
        this.categoria2();
      });
    }
  }

  categoria2() {
    this.listas.forEach((lista) => {
      if (lista.style.display === "block") {
        lista.style.display = "none";
        lista.style.height = "0";

        this.btn.querySelector(".button__icon i").classList.remove("bi-dash");
        this.btn.querySelector(".button__icon i").classList.add("bi-plus");
      } else {
        lista.style.display = "block";
        lista.style.height = "";

        this.btn.querySelector(".button__icon i").classList.remove("bi-plus");
        this.btn.querySelector(".button__icon i").classList.add("bi-dash");
      }
    });
  }
}

const heart = new Heart("[data-link]", ".icon__fav i");
const categoria = new Categoria("[data-title]", "[data-item='1']");
const hoverInstance = new Hover(
  ".card",
  ".card__img",
  "data-imagem12",
  "data-imagem22"
);
const categoriaInstance = new Categoria2("[data-filtros]", "[data-category2]");
