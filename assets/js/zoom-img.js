const zoomImages = document.querySelectorAll(".zoom-image");

console.log(zoomImages);

zoomImages.forEach(function (zoomImage) {
  const img = zoomImage.querySelector("img");
  let nativeWidth = 0;
  let nativeHeight = 0;
  img.addEventListener("load", function () {
    nativeWidth = this.naturalWidth;
    nativeHeight = this.naturalHeight;
  });

  let isDragging = false;
  let startX = 0;
  let startY = 0;
  let translateX = 0;
  let translateY = 0;
  let scale = 1;

  zoomImage.addEventListener("onmousedown", function (event) {
    isDragging = true;
    startX = event.clientX - translateX;
    startY = event.clientY - translateY;
    zoomImage.style.cursor = "grabbing";
  });

  zoomImage.addEventListener("onmouseup", function () {
    isDragging = false;
    zoomImage.style.cursor = "grab";
  });

  zoomImage.addEventListener("onmousemove", function (event) {
    console.log(event);
    if (isDragging) {
      translateX = event.clientX - startX;
      translateY = event.clientY - startY;
      img.style.transform = `scale(${scale}) translate(${translateX}px, ${translateY}px)`;
      img.style.transition = "none";
    } else {
      const bounds = zoomImage.getBoundingClientRect();
      const x = event.clientX - bounds.left;
      const y = event.clientY - bounds.top;

      const zoomX = (x / bounds.width) * nativeWidth;
      const zoomY = (y / bounds.height) * nativeHeight;

      scale = 2; // altere o valor do zoom aqui
      img.style.transform = `scale(${scale}) translate(-${zoomX}px, -${zoomY}px)`;
      img.style.transition = "transform .3s ease-in-out";
    }
    zoomImage.addEventListener("onmouseleave", function () {
      scale = 1; // volta o zoom para o normal quando o mouse sai da imagem
      img.style.transform = `scale(${scale}) translate(0, 0)`;
      img.style.transition = "transform .3s ease-in-out";
    });
  });
});
