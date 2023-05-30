class Validacao {
  constructor() {
    this.containers = document.querySelectorAll(".container__translate");
    this.btns = document.querySelectorAll("[data-btn]");
    this.form = document.querySelector("[data-user]");
    this.end = document.querySelector("[data-end]");
    this.button = document.querySelector("[data-um]");
    this.alertCloses = document.querySelectorAll("[data-close]");

    this.container0 = document.querySelector(".container");
    this.container1 = document.querySelector(".container__1");
    this.container2 = document.querySelector(".container__2");

    this.nome = document.querySelector("[data-nome]");
    this.sobrenome = document.querySelector("[data-sobrenome]");
    this.email = document.querySelector("[data-email]");
    this.CPF = document.querySelector("[data-cpf]");
    this.data = document.querySelector("[data-data]");
    this.telefone = document.querySelector("[data-telefone]");
    this.senha = document.querySelector("[data-senha]");
    this.senha2 = document.querySelector("[data-senha2]");
    this.Radios = document.querySelectorAll("[data-radio]");

    this.CEP = document.querySelector("[data-cep]");
    this.rua = document.querySelector("[data-rua]");
    this.numero = document.querySelector("[data-numero]");
    this.complemento = document.querySelector("[data-complemento]");
    this.bairro = document.querySelector("[data-bairro]");
    this.estado = document.querySelector("[data-estado]");
    this.cidade = document.querySelector("[data-cidade]");

    this.button.addEventListener("click", () => this.PassarValor());
    this.form.addEventListener("change", () => this.ValidarForm());
    this.end.addEventListener("change", () => this.ValidarEndereco());
    this.btns.forEach((btn) => {
      btn.addEventListener("click", () => this.Translate());
    });
    this.alertCloses.forEach((alertClose) => {
      alertClose.addEventListener("click", () => this.alert());
    });
    this.ValidarForm();
    this.ValidarEndereco();
  }

  alert() {
    const alert = document.querySelector("[data-alert]");
    alert.classList.remove("show");

    const alert2 = document.querySelector("[data-alert2]");
    alert2.classList.remove("show");

    const form = document.querySelector(".container__formulario");
    form.style.marginTop = "5.5rem";
  }

  PassarValor() {
    var nomeHidden = document.getElementById("nome-hidden");
    nomeHidden.value = this.nome.value;

    var sobrenomeHidden = document.getElementById("sobrenome-hidden");
    sobrenomeHidden.value = this.sobrenome.value;

    var emailHidden = document.getElementById("email-hidden");
    emailHidden.value = this.email.value;

    var cpfHidden = document.getElementById("cpf-hidden");
    cpfHidden.value = this.CPF.value;

    var dataHidden = document.getElementById("data-hidden");
    dataHidden.value = this.data.value;

    var telefoneHidden = document.getElementById("telefone-hidden");
    telefoneHidden.value = this.telefone.value;

    var senhaHidden = document.getElementById("senha-hidden");
    senhaHidden.value = this.senha.value;

    var generoHidden = document.getElementById("genero-hidden");
    generoHidden.value = this.genero;
  }
  Translate() {
    this.containers.forEach((container) => {
      if (
        container.style.transform === "" ||
        container.style.transform === "translateY(0px)"
      ) {
        container.style.transform = "translateY(-100vh)";
        this.container0.style.height = "100vh";
        this.container1.style.height = "100vh";
        this.container2.style.display = "flex";
      } else if (container.style.transform === "translateY(-100vh)") {
        container.style.transform = "translateY(0)";
        this.container0.style.height = "100%";
        this.container1.style.height = "100%";
        this.container2.style.display = "none";
      }
    });
  }

  ValidarForm() {
    let Todos = false;
    let Senhas = false;
    let Genero = false;

    if (this.Radios[0].checked) {
      this.genero = "M";
      Genero = true;
    } else if (this.Radios[1].checked) {
      this.genero = "F";
      Genero = true;
    } else if (this.Radios[2].checked) {
      this.genero = "O";
      Genero = true;
    } else {
      Genero = false;
    }

    if (
      this.nome.checkValidity() &&
      this.sobrenome.checkValidity() &&
      this.email.checkValidity() &&
      this.CPF.checkValidity() &&
      this.data.checkValidity() &&
      this.telefone.checkValidity()
    ) {
      Todos = true;
    }

    if (this.senha.value === this.senha2.value) {
      Senhas = true;
    }
    this.Desativar(Todos && Senhas && Genero);
  }
  ValidarEndereco() {
    let EnderecoV = false;
    let EstadoV = false;

    if (this.estado.selectedIndex !== -1) {
      EstadoV = true;
    }
    if (
      this.CEP.checkValidity() &&
      this.rua.checkValidity() &&
      this.numero.checkValidity() &&
      this.bairro.checkValidity() &&
      this.cidade.checkValidity()
    ) {
      EnderecoV = true;
    }

    this.Submit(EnderecoV && EstadoV);
  }
  Desativar(Usuario) {
    this.btns.forEach((btn) => {
      if (!Usuario) {
        btn.disabled = true;
        btn.classList.remove("ativado");
        this.form.addEventListener("submit", function (event) {
          event.preventDefault();
        });
      } else {
        btn.disabled = false;
        btn.classList.add("ativado");
      }
    });
  }

  Submit(Endereco) {
    const submit = document.querySelector("[data-submit]");
    if (!Endereco) {
      submit.disabled = true;
      submit.classList.remove("ativado");
      this.form.addEventListener("submit", function (event) {
        event.preventDefault();
      });
    } else {
      submit.disabled = false;
      submit.classList.add("ativado");
    }
  }
}

const formulario = new Validacao();

document.addEventListener("DOMContentLoaded", function () {
  const form = document.querySelector(".container__formulario");

  const urlParams = new URLSearchParams(window.location.search);

  const msg = document.querySelector("[data-msg]");

  if (urlParams.has("cadastro") && urlParams.get("cadastro") === "success") {
    const alert = document.querySelector("[data-alert]");
    alert.classList.add("show");
    form.style.marginTop = "0px";
  } else if (urlParams.get("cadastro") === "error") {
    const alert = document.querySelector("[data-alert2]");
    msg.innerHTML = "Erro! Cadastro nao efetuado!";
    alert.classList.add("show");
    form.style.marginTop = "0px";
  } else if (urlParams.get("cadastro") === "error1") {
    msg.innerHTML = "Erro! Email ja esta em uso!";
    const alert = document.querySelector("[data-alert2]");
    alert.classList.add("show");
    form.style.marginTop = "0px";
  } else if (urlParams.get("cadastro") === "error2") {
    msg.innerHTML = "Erro! CPF ja esta em uso!";
    const alert = document.querySelector("[data-alert2]");
    alert.classList.add("show");
    form.style.marginTop = "0px";
  } else if (urlParams.get("cadastro") === "error3") {
    msg.innerHTML = "Erro! Telefone ja esta em uso!";
    const alert = document.querySelector("[data-alert2]");
    alert.classList.add("show");
    form.style.marginTop = "0px";
  } else {
    form.style.marginTop = "5.5rem";
  }
});
