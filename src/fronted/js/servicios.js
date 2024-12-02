document.addEventListener('DOMContentLoaded', function () {
    // Elementos del DOM
    const loader = document.getElementById('pageLoader');
    const citaForm = document.getElementById('citaForm');
    const botonesVerMas = document.querySelectorAll('.servicecard-button');
    const formularioContainer = document.getElementById('formularioCita');
    const idServicioInput = document.getElementById('idservicio');
    const nombreServicioInput = document.getElementById('nombre');
    const closeModalButton = document.getElementById('closeModal');
    const modalLoginPrompt = document.getElementById('loginPromptModal');
    const closeLoginPromptButton = document.getElementById('closeLoginPrompt');
  
    // Obtener el estado del usuario logueado desde el DOM
    const usuarioLogeado = JSON.parse(document.getElementById('usuarioLogeado').textContent);
  
    // Manejar el evento de los botones "Ver más"
    botonesVerMas.forEach((boton) => {
      boton.addEventListener('click', function (e) {
        e.preventDefault();
  
        if (usuarioLogeado) {
          const serviceCard = this.closest('.servicecard');
          const idServicio = serviceCard.dataset.idservicio;
          const nombreServicio = serviceCard.dataset.service;
  
          if (idServicio && nombreServicio) {
            idServicioInput.value = idServicio;
            nombreServicioInput.value = nombreServicio;
          }
  
          formularioContainer.classList.remove('formservicio-hidden');
          formularioContainer.classList.add('formservicio-visible');
        } else {
          // Mostrar el modal si no está logueado
          modalLoginPrompt.classList.add('modal-visible');
        }
      });
    });
  
    // Cerrar el modal de inicio de sesión
    closeLoginPromptButton.addEventListener('click', function () {
      modalLoginPrompt.classList.remove('modal-visible');
    });
  
    // Manejar el cierre del formulario al hacer clic fuera de él
    formularioContainer.addEventListener('click', function (e) {
      if (e.target === formularioContainer) {
        formularioContainer.classList.remove('formservicio-visible');
        formularioContainer.classList.add('formservicio-hidden');
      }
    });
  
    // Evitar que el clic dentro del formulario lo cierre
    document.querySelector('.formservicio-container').addEventListener('click', function (e) {
      e.stopPropagation();
    });
  
    // Manejar el evento submit del formulario
    if (citaForm) {
      citaForm.addEventListener('submit', function (e) {
        e.preventDefault(); // Evitar el comportamiento predeterminado del formulario
  
        // Mostrar el loader dinámicamente
        if (loader) {
          loader.style.display = 'flex';
        }
  
        // Simular un retraso antes de enviar el formulario
        setTimeout(() => {
          this.submit(); // Envía el formulario al servidor
        }, 1500);
      });
    }
  
    // Manejar el cierre del modal de éxito
    if (closeModalButton) {
      closeModalButton.addEventListener('click', function () {
        const successModal = document.getElementById('successModal');
        if (successModal) {
          successModal.style.display = 'none'; // Ocultar el modal al hacer clic en "Aceptar"
        }
      });
    }
  
    // Reproducir sonido al cargar la página
    const sound = new Audio('serv_sounds/meow1.mp3');
    sound.play().catch((error) => {
      console.warn('El sonido no se pudo reproducir automáticamente:', error);
    });
  });

  const apiKey = 'live_DuqaSkfzJV6LPfd7rn7FT3uyJfTgFzVIXYujCHet1hdniJ2AaHd2D6Du4yZXEkLd';

// Función para obtener una imagen de gato desde la API
function getCatImage() {
  return fetch('https://api.thecatapi.com/v1/images/search', {
    headers: {
      'x-api-key': apiKey
    }
  })
    .then(response => response.json())
    .then(data => data[0].url)
    .catch(error => console.error('Error al obtener la imagen de gato:', error));
}

// Función para actualizar las imágenes del banner
async function updateBannerImages() {
  // Obtener el contenedor de las imágenes del banner
  const banner = document.querySelector('.banner');

  // Limpiar las imágenes existentes
  banner.innerHTML = '';

  // Crear una promesa para obtener 3 imágenes de gatos
  const imagePromises = [];
  for (let i = 0; i < 3; i++) {
    imagePromises.push(getCatImage());
  }

  // Esperar a que todas las imágenes sean obtenidas
  const images = await Promise.all(imagePromises);

  // Insertar las imágenes en el contenedor del banner
  images.forEach((imgUrl, index) => {
    const imgElement = document.createElement('img');
    imgElement.src = imgUrl;
    imgElement.alt = 'Gato';
    imgElement.classList.add('banner-img');
    if (index === 0) {
      imgElement.classList.add('active');
    }
    banner.appendChild(imgElement);
  });

  // Llamar a la función para iniciar la rotación de las imágenes
  startBannerRotation();
}

// Función para hacer que el banner gire entre las imágenes
function startBannerRotation() {
  const banner = document.querySelector('.banner');
  const images = banner.querySelectorAll('img');
  let currentIndex = 0;

  // Establecemos una rotación cada 7 segundos
  setInterval(() => {
    // Quitar la clase 'active' de la imagen actual
    images[currentIndex].classList.remove('active');

    // Incrementar el índice para la siguiente imagen
    currentIndex = (currentIndex + 1) % images.length;

    // Agregar la clase 'active' a la siguiente imagen
    images[currentIndex].classList.add('active');
  }, 200000); // Recuerda Cambiar a cada 7  segundos
}

// Llamar a la función para actualizar las imágenes del banner cuando cargue la página
document.addEventListener('DOMContentLoaded', updateBannerImages);



// Código para el modal de éxito de form
document.addEventListener('DOMContentLoaded', function() {
  const successModal = document.getElementById('successModal');
  const closeModalBtn = document.getElementById('closeModal');

  if (successModal && closeModalBtn) {
      // Función para cerrar el modal
      function closeModal() {
          successModal.style.display = 'none';
      }

      // Evento de clic en el botón de cerrar
      closeModalBtn.addEventListener('click', closeModal);

      // Opcional: Cerrar modal al hacer clic fuera de él
      successModal.addEventListener('click', function(event) {
          if (event.target === successModal) {
              closeModal();
          }
      });
  }
});

        // Función para eliminar el parámetro 'success' de la URL
        function removeQueryParam() {
            const url = new URL(window.location);
            url.searchParams.delete('success');
            window.history.replaceState({}, '', url);
        }

        // Llamamos a la función cuando el modal esté visible
        document.addEventListener('DOMContentLoaded', function() {
            // Eliminar el parámetro 'success' al cargar la página
            removeQueryParam();

            // Cerrar el modal cuando el usuario haga clic en el botón 'Aceptar'
            document.getElementById('closeModal').addEventListener('click', function() {
                document.getElementById('successModal').style.display = 'none';
            });
        });