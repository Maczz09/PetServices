class ModalManager {
  openModal(modalId) {
    document.getElementById(modalId).classList.remove("hidden");
  }

  closeModal(modalId) {
    document.getElementById(modalId).classList.add("hidden");
  }
}

const modalManager = new ModalManager();

document
  .getElementById("adopcionForm")
  .addEventListener("submit", function (event) {
    let campos = [
      "pregunta1",
      "pregunta2",
      "pregunta3",
      "pregunta4",
      "pregunta5",
      "pregunta6",
      "pregunta7",
      "pregunta8",
      "pregunta9",
      "pregunta10",
      "pregunta11",
      "pregunta12",
      "pregunta13",
      "pregunta14",
    ];
    let error = false;
    let mensajeError = "Por favor, complete las siguientes preguntas:<br><ul>";

    campos.forEach(function (campo) {
      let valor = document.getElementById(campo)?.value.trim() || "";
      if (valor === "") {
        let pregunta = document.querySelector(
          "label[for='" + campo + "']"
        ).innerText;
        mensajeError += "<li>" + pregunta + "</li>";
        error = true;
      }
    });

    if (error) {
      event.preventDefault(); // Evita que el formulario se envíe si hay errores
      mensajeError += "</ul>";
      document.getElementById("errorText").innerHTML = mensajeError;
      modalManager.openModal("errorModal");
    } else {
      modalManager.openModal("successModal");
    }
  });
