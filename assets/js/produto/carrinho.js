class Carrinho {
  constructor() {
    document.addEventListener("DOMContentLoaded", () => {
      this.GetProdutos();
    });
  }

  GetProdutos() {
    const dados = {
      acao: "GetProdutos",
    };
    fetch("../assets/php/carrinho.php", {
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

          const divAmarelo = document.querySelector(".amarelo");
          divAmarelo.textContent = "";

          if (data.produto.length === 0) {
            const alet = document.createElement("p");
            alet.textContent = "Nenhum Produto Adicionado até o momento!";
            card__grid.appendChild(alet);
          } else {
            data.produto.forEach((produto) => {
              const divCardCarrinho = document.createElement("div");
              divCardCarrinho.className = "card__carrinho";
              card__grid.appendChild(divCardCarrinho);

              const divCarrinhoGrid = document.createElement("div");
              divCarrinhoGrid.className = "carrinho__grid";
              divCardCarrinho.appendChild(divCarrinhoGrid);

              const grid1Div = document.createElement("div");
              grid1Div.className = "grid__1";
              grid1Div.setAttribute("data-position", "1");
              divCarrinhoGrid.appendChild(grid1Div);

              const imagemElement = document.createElement("img");
              imagemElement.className = "carrinho__img";
              imagemElement.src =
                "../assets/images/produtos/" + produto.img1_produtos;
              grid1Div.appendChild(imagemElement);

              const divCarrinhoBody = document.createElement("div");
              divCarrinhoBody.className = "carrinho__body";
              grid1Div.appendChild(divCarrinhoBody);

              const formClose = document.createElement("form");
              formClose.setAttribute("data-formClose", "");
              grid1Div.appendChild(formClose);

              const btnCloseIcon = document.createElement("button");
              btnCloseIcon.className = "close__icon";
              formClose.appendChild(btnCloseIcon);

              const iClose = document.createElement("i");
              iClose.classList.add("bi", "bi-x-circle");
              btnCloseIcon.appendChild(iClose);

              formClose.addEventListener("submit", (e) => {
                e.preventDefault();
                this.DeletProduto(
                  produto.id_carrinho,
                  produto.tamanho_carrinho,
                  produto.quantidade_carrinho,
                  produto.id_produtos_carrinho
                );
              });

              const pCarrinhoTitulo = document.createElement("p");
              pCarrinhoTitulo.className = "carrinho__titulo";
              pCarrinhoTitulo.textContent = produto.nome_produtos;
              divCarrinhoBody.appendChild(pCarrinhoTitulo);

              const divCarrinhoItens = document.createElement("div");
              divCarrinhoItens.className = "carrinho__itens";
              divCarrinhoBody.appendChild(divCarrinhoItens);

              const pTamanho = document.createElement("p");
              pTamanho.innerHTML =
                "<span class='opção'>Tamanho:</span>" +
                produto.tamanho_carrinho;
              divCarrinhoItens.appendChild(pTamanho);

              const pPreco = document.createElement("p");
              pPreco.innerHTML =
                "<span class='opção2'>Preço:</span>R$ " +
                produto.preco_produtos;
              divCarrinhoItens.appendChild(pPreco);

              const divGridRepeticao = document.createElement("div");
              divGridRepeticao.className = "grid__reparticao";
              divGridRepeticao.setAttribute("data-position", "2");
              divCarrinhoGrid.appendChild(divGridRepeticao);

              const div = document.createElement("div");
              divGridRepeticao.appendChild(div);

              const divGridQuantidades = document.createElement("div");
              divGridQuantidades.className = "grid__quantidades";
              divGridQuantidades.setAttribute("data-position", "3");
              divCarrinhoGrid.appendChild(divGridQuantidades);

              const div2 = document.createElement("div");
              divGridQuantidades.appendChild(div2);

              const pQuantidade = document.createElement("p");
              pQuantidade.textContent = "Quantidade: ";
              div2.appendChild(pQuantidade);

              const formDash = document.createElement("form");
              formDash.setAttribute("data-formDash", "");
              div2.appendChild(formDash);

              const btnDash = document.createElement("button");
              btnDash.className = "btn__i";
              formDash.appendChild(btnDash);

              const iDash = document.createElement("i");
              iDash.className = "bi bi-dash-circle";
              btnDash.appendChild(iDash);

              const inputElement = document.createElement("input");
              inputElement.type = "text";
              inputElement.value = produto.quantidade_carrinho;
              inputElement.readOnly = true;
              div2.appendChild(inputElement);

              const formPlus = document.createElement("form");
              formPlus.setAttribute("data-formPlus", "");
              div2.appendChild(formPlus);

              const btnPlus = document.createElement("button");
              btnPlus.className = "btn__i";
              formPlus.appendChild(btnPlus);

              const iPlus = document.createElement("i");
              iPlus.className = "bi bi-plus-circle";
              btnPlus.appendChild(iPlus);

              formPlus.addEventListener("submit", (e) => {
                e.preventDefault();
                this.AddQuantidade(
                  produto.id_carrinho,
                  produto.tamanho_carrinho,
                  produto.quantidade_carrinho,
                  produto.id_produtos_carrinho
                );
              });
              formDash.addEventListener("submit", (e) => {
                e.preventDefault();
                this.DeletQuantidade(
                  produto.id_carrinho,
                  produto.tamanho_carrinho,
                  produto.quantidade_carrinho,
                  produto.id_produtos_carrinho
                );
              });

              const pPrecoFinal = document.createElement("p");

              const precoProduto = parseFloat(
                produto.preco_produtos.replace(",", ".")
              );
              const quantidadeCarrinho = parseFloat(
                produto.quantidade_carrinho
              );

              if (!isNaN(precoProduto) && !isNaN(quantidadeCarrinho)) {
                const precoFinal = precoProduto * quantidadeCarrinho;
                const preco = precoFinal.toFixed(2);
                pPrecoFinal.textContent = "R$ " + preco.replace(".", ",");
              }
              divGridQuantidades.appendChild(pPrecoFinal);
            });
            const divAmarelo = document.querySelector(".amarelo");
            divAmarelo.textContent = "";

            const divCardCompras = document.createElement("div");
            divCardCompras.className = "card__compras";
            divAmarelo.appendChild(divCardCompras);

            const divComprasSubtotal = document.createElement("div");
            divComprasSubtotal.classList = "compras__subtotal";
            divCardCompras.appendChild(divComprasSubtotal);

            const pSubtotalQuantidade = document.createElement("p");
            pSubtotalQuantidade.classList = "subtotal__quantidade";
            pSubtotalQuantidade.textContent =
              "Subtotal (" + data.produto.length + " Itens)";
            divComprasSubtotal.appendChild(pSubtotalQuantidade);

            const pSubtotalValor = document.createElement("p");
            pSubtotalValor.className = "subtotal__valor";

            divComprasSubtotal.appendChild(pSubtotalValor);

            var Total = 0;

            data.produto.forEach((produto) => {
              const divComprasProduto = document.createElement("div");
              divComprasProduto.className = "compras__produto";
              divCardCompras.appendChild(divComprasProduto);

              const pNomeProduto = document.createElement("p");
              pNomeProduto.className = "produto__nome";
              pNomeProduto.textContent = produto.nome_produtos;
              divComprasProduto.appendChild(pNomeProduto);

              const pValorProduto = document.createElement("p");
              pValorProduto.className = "produto__valor";

              const num = parseFloat(produto.preco_produtos.replace(",", "."));

              const quantidade = parseFloat(produto.quantidade_carrinho);

              if (!isNaN(num) && !isNaN(quantidade)) {
                const resultado = num * quantidade;
                Total += resultado;
                const preco = resultado.toFixed(2);
                pValorProduto.textContent = "R$ " + preco.replace(".", ",");
              }
              divComprasProduto.appendChild(pValorProduto);
            });

            const formCompra = document.createElement("form");
            formCompra.setAttribute("data-formCompra", "");
            divCardCompras.appendChild(formCompra);

            const divComprasBtn = document.createElement("div");
            divComprasBtn.className = "compras__btn";
            formCompra.appendChild(divComprasBtn);

            const BtnElement = document.createElement("button");
            BtnElement.textContent = "FINALIZAR COMPRA";
            divComprasBtn.appendChild(BtnElement);

            formCompra.addEventListener("submit", (e) => {
              e.preventDefault();
              this.PostCompra(data.produto[0].id_usuario_carrinho);
            });

            const valor = Total.toFixed(2);
            pSubtotalValor.textContent = "R$ " + valor.replace(".", ",");
          }
        }
      })
      .catch((error) => {
        console.log("Erro na verificação de favoritos: " + error);
      });
  }
  AddQuantidade(idCarrinho, Tamanho, Quantidade, idProduto) {
    const dados = {
      acao: "AddQuantidade",
      idCarrinho: idCarrinho,
      idProduto: idProduto,
      Tamanho: Tamanho,
      Quantidade: Quantidade,
    };
    fetch("../assets/php/carrinho.php", {
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
        } else if (data.message) {
          console.log(data.message);
          this.GetProdutos();
        }
      });
  }
  DeletQuantidade(idCarrinho, Tamanho, Quantidade, idProduto) {
    const dados = {
      acao: "DeletQuantidade",
      idCarrinho: idCarrinho,
      idProduto: idProduto,
      Tamanho: Tamanho,
      Quantidade: Quantidade,
    };

    fetch("../assets/php/carrinho.php", {
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
        } else if (data.message) {
          console.log(data.message);
          this.GetProdutos();
        }
      });
  }
  DeletProduto(idCarrinho, Tamanho, Quantidade, idProduto) {
    const dados = {
      acao: "DeletProduto",
      idCarrinho: idCarrinho,
      idProduto: idProduto,
      Tamanho: Tamanho,
      Quantidade: Quantidade,
    };
    fetch("../assets/php/carrinho.php", {
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
        } else if (data.message) {
          console.log(data.message);
          this.GetProdutos();
        }
      });
  }
  PostCompra(idUsuario) {
    const dados = {
      acao: "PostCompra",
      idUsuario: idUsuario,
    };

    fetch("../assets/php/carrinho.php", {
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
        } else if (data.message) {
          console.log(data.message);
        }
      });
  }
}

const carrinho = new Carrinho();
