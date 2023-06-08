class Modal {
  constructor(elemento, modal, btns) {
    this.elemento = document.querySelector(elemento);
    this.modal = document.querySelector(modal);
    this.btns = document.querySelectorAll(btns);

    this.elemento.addEventListener("click", () => this.abrir());

    this.btns.forEach((btn) => {
      btn.addEventListener("click", () => {
        this.modal.close();
        addEventListener("submit", function (event) {
          event.preventDefault();
        });
      });
    });
  }

  abrir() {
    this.modal.showModal();
  }
}

const modal = new Modal("[data-modal-elemento]", "[data-modal]", "[btn-close]");
const modal2 = new Modal(
  "[data-modal-elemento2]",
  "[data-modal2]",
  "[btn-close2]"
);
const modal3 = new Modal(
  "[data-modal-elemento3]",
  "[data-modal3]",
  "[btn-close3]"
);
const modal4 = new Modal(
  "[data-modal-elemento4]",
  "[data-modal4]",
  "[btn-close4]"
);
const modal5 = new Modal(
  "[data-modal-elemento5]",
  "[data-modal5]",
  "[btn-close5]"
);
const modal6 = new Modal(
  "[data-modal-elemento6]",
  "[data-modal6]",
  "[btn-close6]"
);
const modal7 = new Modal(
  "[data-modal-elemento7]",
  "[data-modal7]",
  "[btn-close7]"
);
const modal8 = new Modal(
  "[data-modal-elemento8]",
  "[data-modal8]",
  "[btn-close8]"
);
const modal9 = new Modal(
  "[data-modal-elemento9]",
  "[data-modal9]",
  "[btn-close9]"
);
const modal10 = new Modal(
  "[data-modal-elemento10]",
  "[data-modal10]",
  "[btn-close10]"
);
const modal11 = new Modal(
  "[data-modal-elemento11]",
  "[data-modal11]",
  "[btn-close11]"
);
const modal12 = new Modal(
  "[data-modal-elemento12]",
  "[data-modal12]",
  "[btn-close12]"
);
class Mascara {
  constructor(selector, formato) {
    this.element = document.querySelector(selector);
    this.formato = formato;

    this.element.addEventListener("keypress", this.aplicarMascara.bind(this));

    this.element.addEventListener("keypress", (e) => {
      this.ProbibirLetras(e);
    });
  }
  ProbibirLetras(e) {
    const ApenasNumeros = /[0-9]/;
    const teclas = String.fromCharCode(e.keyCode);

    if (!ApenasNumeros.test(teclas)) {
      e.preventDefault();
      return;
    }
  }
  aplicarMascara() {
    const length = this.element.value.length;

    if (this.formato === "XXX.XXX.XXX-XX") {
      if (length === 3 || length === 7) {
        this.element.value += ".";
      } else if (length === 11) {
        this.element.value += "-";
      }
    } else if (this.formato === "(XX) XXXX-XXXX") {
      if (length === 0) {
        this.element.value = "(" + this.element.value;
      } else if (length === 3) {
        this.element.value += ")";
      } else if (length === 9) {
        this.element.value += "-";
      }
    } else if (this.formato === "XXXXX-XXX") {
      if (length === 5) {
        this.element.value += "-";
      }
    }
  }
}
const inputTell = new Mascara("[data-telefone]", "(XX) XXXX-XXXX");
const inputCEP = new Mascara("[data-cep]", "XXXXX-XXX");
