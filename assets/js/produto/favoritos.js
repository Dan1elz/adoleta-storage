class Favorito {
  constructor() {
    document.addEventListener("DOMContentLoaded", () => {
      this.GetProdutos();
    });
  }

  GetProdutos() {
    const dados = {
      acao: "GetProdutos",
    };
    fetch("../assets/php/utilidades.php", {
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
          const card__grid = document.querySelector(".card__grid");
          card__grid.innerHTML = "";

          if (data.message === "Sessão não existente!") {
            const alet = document.createElement("p");
            alet.textContent =
              "Usuário não está logado. Não pode usar esta função. ";
            card__grid.appendChild(alet);
            const link = document.createElement("a");
            link.href = "Untitled-4.php";
            link.textContent = "Clique Para Logar!";
            alet.appendChild(link);
          }
        } else if (data.produto) {
          console.log(data.produto);
          const card__grid = document.querySelector(".card__grid");
          card__grid.innerHTML = "";

          if (data.produto.length === 0) {
            const alet = document.createElement("p");
            alet.textContent = "Nenhum Produto Favoritado até o momento!";
            card__grid.appendChild(alet);
          } else {
            data.produto.forEach((produto) => {
              const card__favitos = document.createElement("div");
              card__favitos.className = "card__favitos";
              card__grid.appendChild(card__favitos);

              const link__produtos = document.createElement("a");
              link__produtos.className = "link__produtos";
              card__favitos.appendChild(link__produtos);

              const imagemElement = document.createElement("img");
              imagemElement.classList.add("favitos__img");
              imagemElement.src =
                "../assets/images/produtos/" + produto.img1_produtos;
              imagemElement.alt = "produto";
              link__produtos.appendChild(imagemElement);

              const formElement = document.createElement("form");
              formElement.setAttribute("data-favoritarForm", "");
              link__produtos.appendChild(formElement);

              formElement.addEventListener("submit", (e) => {
                e.preventDefault();
                this.Delet(inputElement.value);
              });

              const inputElement = document.createElement("input");
              inputElement.setAttribute("data-id", "");
              inputElement.type = "hidden";
              inputElement.name = "id";
              inputElement.value = produto.id_produtos_favoritos;
              formElement.appendChild(inputElement);

              const buttonElement = document.createElement("button");
              buttonElement.setAttribute("data-link", "");
              buttonElement.className = "icon__close";
              buttonElement.name = "favorito";
              buttonElement.type = "submit";
              formElement.appendChild(buttonElement);

              const iconElement = document.createElement("i");
              iconElement.className = "bi bi-x-circle";
              buttonElement.appendChild(iconElement);

              const divElement = document.createElement("div");
              divElement.className = "favitos__body";
              link__produtos.appendChild(divElement);

              const tituloElement = document.createElement("p");
              tituloElement.className = "favitos__titulo";
              tituloElement.textContent = produto.nome_produtos;
              divElement.appendChild(tituloElement);

              const itensDiv = document.createElement("div");
              itensDiv.className = "itens";
              divElement.appendChild(itensDiv);

              const precoAntigoElement = document.createElement("p");
              precoAntigoElement.className = "favitos__preço_antigo";
              precoAntigoElement.textContent =
                "R$ " + produto.precoAntigo_produtos;
              itensDiv.appendChild(precoAntigoElement);

              const precoElement = document.createElement("p");
              precoElement.className = "favitos_preço";
              precoElement.textContent = "R$ " + produto.preco_produtos;
              itensDiv.appendChild(precoElement);

              const promocaoElement = document.createElement("p");
              promocaoElement.className = "favitos__promoção";
              promocaoElement.textContent =
                "ou R$ " + produto.promocao_produtos + " sem juros";
              itensDiv.appendChild(promocaoElement);

              this.GetTamanhos(produto.id_produtos, link__produtos);
            });
          }
        }
      })
      .catch((error) => {
        console.log("Erro na verificação de favoritos: " + error);
      });
  }

  GetTamanhos(idProduto, link__produtos) {
    const id = idProduto;
    const dados = {
      idProduto: id,
      acao: "GetTamanhos",
    };
    fetch("../assets/php/utilidades.php", {
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
          const btn_div = document.createElement("div");
          btn_div.className = "bnt__div";
          link__produtos.appendChild(btn_div);

          const formElement = document.createElement("form");
          formElement.setAttribute("data-formcompra", "");
          btn_div.appendChild(formElement);

          const div_campo = document.createElement("div");
          div_campo.className = "campo";
          formElement.appendChild(div_campo);

          const selectElement = document.createElement("select");
          selectElement.setAttribute("data-input", "");
          selectElement.className = "form-control-end";
          selectElement.name = "estado";
          selectElement.required = true;
          div_campo.appendChild(selectElement);

          const optionElement = document.createElement("option");
          optionElement.value = "";
          optionElement.selected = true;
          optionElement.disabled = true;
          optionElement.textContent = "Tamanho";
          selectElement.appendChild(optionElement);

          data.produto.forEach((produto) => {
            const optionElement2 = document.createElement("option");
            optionElement2.value = produto;
            optionElement2.textContent = produto;
            selectElement.appendChild(optionElement2);
          });

          const div_campo2 = document.createElement("div");
          div_campo2.className = "campo";
          formElement.appendChild(div_campo2);

          const buttonElement = document.createElement("button");
          buttonElement.className = "btn__comprar";
          buttonElement.textContent = "COMPRAR PRODUTO";
          div_campo2.appendChild(buttonElement);

          //a
        }
      });
  }

  Delet(produto) {
    const dados = {
      idProduto: produto,
      acao: "desfavoritar",
    };
    console.log(dados);
    fetch("../assets/php/utilidades.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(dados),
    })
      .then(function (response) {
        return response.json();
      })
      .then(
        function (data) {
          if (data.error) {
            console.log("Erro: " + data.message);
          } else {
            console.log("Sucesso: " + data.message);

            this.GetProdutos();
          }
        }.bind(this)
      );
  }
}

const heart = new Favorito();
