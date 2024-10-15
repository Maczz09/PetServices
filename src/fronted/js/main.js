
// Mostrar/Ocultar perfil
document.getElementById("profileBtn").addEventListener("click", function () {
  let profileDiv = document.getElementById("profileDiv");
  if (profileDiv.classList.contains("hidden")) {
    profileDiv.classList.remove("hidden");
  } else {
    profileDiv.classList.add("hidden");
  }
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
