$(document).ready(function () {
  $("#filtro-form").on("submit", function (e) {
    e.preventDefault(); // Evitar el envío normal del formulario

    $.ajax({
      url: "../../backend/adopcion/filtrar_mascotas.php", // Llama al archivo PHP que creaste
      type: "GET",
      data: $(this).serialize(), // Serializa los datos del formulario
      success: function (data) {
        // Reemplaza la lista de mascotas con los resultados filtrados
        $(".mascotas-list").html(data);
        // Limpiar los filtros
        $("#filtro-form")[0].reset();
      },
    });
  });
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
