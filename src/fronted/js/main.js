// Mostrar/Ocultar barra lateral
document.getElementById("sidebarBtn").addEventListener("click", function () {
  let sidebar = document.getElementById("sidebar");
  if (sidebar.classList.contains("hidden")) {
    sidebar.classList.remove("hidden");
  } else {
    sidebar.classList.add("hidden");
  }
});

// Mostrar/Ocultar perfil
document.getElementById("profileBtn").addEventListener("click", function () {
  let profileDiv = document.getElementById("profileDiv");
  if (profileDiv.classList.contains("hidden")) {
    profileDiv.classList.remove("hidden");
  } else {
    profileDiv.classList.add("hidden");
  }
});

// Funcionalidad del carrusel
const carousel = document.getElementById("carousel");
const totalSlides = carousel.children.length;
let currentIndex = 0;

document.getElementById("prev").addEventListener("click", () => {
  if (currentIndex > 0) {
    currentIndex--;
  } else {
    currentIndex = totalSlides - 1;
  }
  updateCarousel();
});

document.getElementById("next").addEventListener("click", () => {
  if (currentIndex < totalSlides - 1) {
    currentIndex++;
  } else {
    currentIndex = 0;
  }
  updateCarousel();
});

function updateCarousel() {
  carousel.style.transform = `translateX(-${currentIndex * 100}%)`;
}

// Inicializa el carrusel para que muestre el primer slide
updateCarousel();

// Funcionalidad del modal de imágenes del carrusel
const modal = document.getElementById("modal");
const modalImage = document.getElementById("modalImage");
const closeModal = document.getElementById("closeModal");

// Abre el modal con la imagen seleccionada
carousel.addEventListener("click", (event) => {
  if (event.target.tagName === "IMG") {
    modal.classList.remove("hidden");
    modalImage.src = event.target.src;
  }
});

// Cierra el modal
closeModal.addEventListener("click", () => {
  modal.classList.add("hidden");
});

// Mostrar/Ocultar detalles del directorio de servicios
document.querySelectorAll(".service-toggle").forEach((button) => {
  button.addEventListener("click", function () {
    const serviceDetails = this.nextElementSibling;
    if (serviceDetails.classList.contains("hidden")) {
      serviceDetails.classList.remove("hidden");
    } else {
      serviceDetails.classList.add("hidden");
    }
  });
});

// Funcionalidad de la barra de búsqueda de servicios
document.querySelector(".search-button").addEventListener("click", function () {
  const query = document.querySelector(".search-input").value;
  const district = document.querySelector(".district-input").value;
  const category = document.querySelector(".category-select").value;

  // Redirigir a la página de resultados con parámetros de búsqueda
  const searchURL = `/buscar?query=${encodeURIComponent(
    query
  )}&district=${encodeURIComponent(district)}&category=${encodeURIComponent(
    category
  )}`;
  window.location.href = searchURL;
});
