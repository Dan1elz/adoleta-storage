class Troca {
  constructor(card, imagens, imagem1, imagem2, imagem3, imagem4, radio) {
    this.card = document.querySelector(card);
    this.imagens = document.querySelectorAll(imagens);
    this.radios = document.querySelectorAll("[data-category-check]");

    this.imagem1 = this.card.getAttribute(imagem1);
    this.imagem2 = this.card.getAttribute(imagem2);
    this.imagem3 = this.card.getAttribute(imagem3);
    this.imagem4 = this.card.getAttribute(imagem4);

    this.imagens.forEach((imagem, index) => {
      imagem.addEventListener("click", () => {
        this.troca(index);
      });
    });

    this.radios.forEach((radio, index) => {
      radio.addEventListener("click", () => {
        this.InputSelect(index);
      });
    });
  }
  InputSelect(index) {
    this.radios.forEach((radio, i) => {
      const label = radio.nextElementSibling;

      radio.style.backgroundColor = "";
      radio.style.border = "";
      radio.style.boxShadow = "";
      label.style.color = "";

      if (i === index && radio.checked) {
        radio.style.backgroundColor = "#8EC5FC";
        radio.style.border = "1px solid #8EC5FC";
        radio.style.boxShadow = "0 0 2px #8EC5FC";
        label.style.color = "#FFFFFF";
      }
    });
  }

  troca(index) {
    this.imagens.forEach((imagem, i) => {
      imagem.style.filter = "";
      imagem.style.boxShadow = "";
    });

    if (index === 0) {
      this.card.src = this.imagem1;
      this.imagens[0].style.filter = "brightness(90%)";
      this.imagens[0].style.boxShadow = "2px 2px 2px rgba(0, 0, 0, 0.3)";
    } else if (index === 1) {
      this.card.src = this.imagem2;
      this.imagens[1].style.filter = "brightness(90%)";
      this.imagens[1].style.boxShadow = "2px 2px 2px rgba(0, 0, 0, 0.3)";
    } else if (index === 2) {
      this.card.src = this.imagem3;
      this.imagens[2].style.filter = "brightness(90%)";
      this.imagens[2].style.boxShadow = "2px 2px 2px rgba(0, 0, 0, 0.3)";
    } else if (index === 3) {
      this.card.src = this.imagem4;
      this.imagens[3].style.filter = "brightness(90%)";
      this.imagens[3].style.boxShadow = "2px 2px 2px rgba(0, 0, 0, 0.3)";
    }
  }
}

class Produto {
  constructor() {
    document.addEventListener("DOMContentLoaded", () => {
      this.getProdutos();
    });
  }

  getProdutos() {
    const urlParams = new URLSearchParams(window.location.search);
    const id = urlParams.get("id");

    const dados = {
      acao: "GetProdutos",
      idProduto: id,
    };
    fetch("../assets/php/produto.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(dados),
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.error) {
          console.log("Erro: " + data.message);
        } else if (data.produto && data.tamanho && data.departamento) {
          // console.log(data.produto);
          // console.log(data.tamanho);
          // console.log(data.departamento);

          const ImgElement = document.querySelectorAll(".lateral__img");

          ImgElement[0].src =
            "../assets/images/produtos/" + data.produto[0].img1_produtos;
          ImgElement[1].src =
            "../assets/images/produtos/" + data.produto[0].img2_produtos;
          ImgElement[2].src =
            "../assets/images/produtos/" + data.produto[0].img3_produtos;
          ImgElement[3].src =
            "../assets/images/produtos/" + data.produto[0].img4_produtos;

          const ImgPrincipal = document.querySelector(".card__img");
          ImgPrincipal.src =
            "../assets/images/produtos/" + data.produto[0].img1_produtos;

          ImgPrincipal.setAttribute(
            "data-imagem1",
            "../assets/images/produtos/" + data.produto[0].img1_produtos
          );
          ImgPrincipal.setAttribute(
            "data-imagem2",
            "../assets/images/produtos/" + data.produto[0].img2_produtos
          );
          ImgPrincipal.setAttribute(
            "data-imagem3",
            "../assets/images/produtos/" + data.produto[0].img3_produtos
          );
          ImgPrincipal.setAttribute(
            "data-imagem4",
            "../assets/images/produtos/" + data.produto[0].img4_produtos
          );
          const troca = new Troca(
            ".card__img",
            ".img__link",
            "data-imagem1",
            "data-imagem2",
            "data-imagem3",
            "data-imagem4"
          );
          const Titulo = document.querySelector(".card__titulo");
          Titulo.innerHTML = data.produto[0].nome_produtos;

          const ValorAntigo = document.querySelector(".valor__antigo");
          ValorAntigo.innerHTML = "R$ " + data.produto[0].precoAntigo_produtos;

          const Valor = document.querySelector(".valor");
          Valor.innerHTML = "R$ " + data.produto[0].preco_produtos;

          const Promocao = document.querySelector(".promoção");
          Promocao.innerHTML =
            "ou R$ " + data.produto[0].promocao_produtos + " sem juros";

          const Descricao = document.querySelector(".descrição__descrição");
          Descricao.lastChild.textContent = data.produto[0].descricao_produtos;

          const Genero = document.querySelector(".descrição__genero");
          Genero.lastChild.textContent = data.produto[0].genero_produtos;

          const Marca = document.querySelector(".descrição__marca");
          Marca.lastChild.textContent = data.produto[0].marca_produtos;

          const Departamento = document.querySelector(
            ".descrição__departamento"
          );
          const valor = data.departamento.join(", ");

          Departamento.lastChild.textContent = valor;

          const inputs = document.querySelectorAll(".category__checkbox");
          inputs.forEach((input) => {
            if (!data.tamanho.includes(input.nextElementSibling.textContent)) {
              input.disabled = true;
              input.classList.add("desativado");
            }
          });
          const form = document.querySelector("[data-form-compra]");
          form.addEventListener("submit", (e) => {
            e.preventDefault();
            this.PostCompra(data.produto[0].id_produtos);
          });
        }
      });
  }

  PostCompra(id) {
    const Tamanhos = document.querySelectorAll("[data-category-check]");
    var Valor = "";
    const alerta = document.querySelector(".Alerta");

    Tamanhos.forEach((tamanho) => {
      if (tamanho.checked) {
        Valor = tamanho.value;
      }
    });

    if (Valor != false) {
      alerta.textContent = "";

      const dados = {
        acao: "PostCompra",
        idProduto: id,
        Tamanho: Valor,
      };
      fetch("../assets/php/produto.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(dados),
      })
        .then((response) => response.json())
        .then((data) => {
          if (data.error) {
            console.log("Erro: " + data.message);
          } else if (data.produto) {
            console.log(data.produto);
            console.log(data.inicial);
            console.log(data.quantidade);

            const inputs = document.querySelectorAll(".category__checkbox");
            const radios = document.querySelectorAll("[data-category-check]");

            radios.forEach((radio, i) => {
              const label = radio.nextElementSibling;

              inputs.forEach((input) => {
                if (
                  !data.quantidade.includes(
                    input.nextElementSibling.textContent
                  )
                ) {
                  input.disabled = true;
                  input.classList.add("desativado");
                  radio.style.backgroundColor = "";
                  radio.style.border = "";
                  radio.style.boxShadow = "";
                  label.style.color = "";
                }
              });
            });
            alerta.classList.add("Sucess");
            alerta.textContent = "Adicionado com Sucesso!";
          }
        });
    } else {
      alerta.classList.add("Danger");
      alerta.textContent = "Selecione um Tamanho!";
    }
  }
}

const produto = new Produto();
