document.addEventListener("DOMContentLoaded", function () {
  const esquerda = document.querySelector(".esquerda");
  const direita = document.querySelector(".direita");
  const urlParams = new URLSearchParams(window.location.search);

  esquerda.addEventListener("click", () => {
    const pagina = urlParams.has("pagina")
      ? parseInt(urlParams.get("pagina"))
      : 0;
    if (pagina > 0) {
      const novaPagina = pagina - 1;
      window.location.href = "?pagina=" + novaPagina;
    }
  });

  direita.addEventListener("click", () => {
    const pagina = urlParams.has("pagina")
      ? parseInt(urlParams.get("pagina"))
      : 0;
    if (pagina < limite - 1) {
      const novaPagina = pagina + 1;
      window.location.href = "?pagina=" + novaPagina;
    }
  });

  if (urlParams.has("pagina")) {
    const pagina = parseInt(urlParams.get("pagina"));
    if (pagina >= limite - 1) {
      direita.classList.add("desativado");
    }
    if (pagina <= 0) {
      esquerda.classList.add("desativado");
    }
  } else {
    const pagina = 0;
    if (pagina >= limite - 1) {
      direita.classList.add("desativado");
    }
    if (pagina <= 0) {
      esquerda.classList.add("desativado");
    }
  }
});
