// Evento para limpiar los filtros cuando se presiona el botón "Reset"
document
  .querySelectorAll('button[type="button"]')
  .forEach(function (resetButton) {
    resetButton.addEventListener("click", function () {
      // Encontrar los checkboxes dentro de la misma sección
      const checkboxes = this.closest("details").querySelectorAll(
        'input[type="checkbox"]'
      );
      checkboxes.forEach(function (checkbox) {
        checkbox.checked = false; // Desmarca los checkboxes
      });
    });
  });

// Evento para limpiar los filtros cuando se envía el formulario
document.getElementById("filtro-form").addEventListener("submit", function (e) {
  e.preventDefault(); // Evita que el formulario se envíe de inmediato

  // Ocultar los elementos `<details>` cuando se presiona el botón de "Aplicar Filtros"
  const openDetails = document.querySelectorAll("details[open]");
  openDetails.forEach(function (detail) {
    detail.removeAttribute("open"); // Cierra los detalles abiertos
  });

  // Simular que se están aplicando los filtros (puedes hacer la solicitud AJAX aquí)
  fetch("../../backend/adopcion/filtrar_mascotas.php", {
    method: "POST",
    body: new FormData(this),
  })
    .then((response) => response.text())
    .then((data) => {
      // Actualizar la lista de mascotas
      document.querySelector(".mascotas-list").innerHTML = data;

      // Desmarcar todos los checkboxes después de aplicar los filtros
      const checkboxes = document.querySelectorAll('input[type="checkbox"]');
      checkboxes.forEach(function (checkbox) {
        checkbox.checked = false; // Desmarca los checkboxes
      });
    })
    .catch((error) => console.error("Error:", error));
});

// Carrusel de imágenes de la galería
document.addEventListener("DOMContentLoaded", function () {
  const carouselImages = document.getElementById("carousel-images");
  const prevButton = document.getElementById("prev");
  const nextButton = document.getElementById("next");

  let currentIndex = 0;
  const totalImages = carouselImages.children.length;
  const visibleImages = 3;
  const imageWidth = carouselImages.children[0].offsetWidth + 16;

  function updateCarousel() {
    const offset = currentIndex * -imageWidth;
    carouselImages.style.transform = `translateX(${offset}px)`;
  }

  nextButton.addEventListener("click", function () {
    currentIndex = (currentIndex + 1) % (totalImages - visibleImages + 1);
    updateCarousel();
  });

  prevButton.addEventListener("click", function () {
    currentIndex =
      (currentIndex - 1 + (totalImages - visibleImages + 1)) %
      (totalImages - visibleImages + 1);
    updateCarousel();
  });

  document.querySelectorAll("#carousel-images img").forEach((img) => {
    img.addEventListener("click", function () {
      const modal = document.getElementById("image-modal");
      const modalImage = document.getElementById("modal-image");
      modalImage.src = this.src;
      modal.classList.remove("hidden");
    });
  });

  document.getElementById("close-modal").addEventListener("click", function () {
    document.getElementById("image-modal").classList.add("hidden");
  });
});
