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
  