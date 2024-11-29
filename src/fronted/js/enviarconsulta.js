function enviarConsulta() {
    const nombre = document.getElementById('nombre').value;
    const email = document.getElementById('email').value;
    const consulta = document.getElementById('consulta').value;
  
    // Aquí puedes agregar la lógica para enviar los datos, por ejemplo, a un servidor
    console.log('Nombre:', nombre);
    console.log('Email:', email);
    console.log('Consulta:', consulta);
  
    // Cerrar el modal después de enviar
    const modal = bootstrap.Modal.getInstance(document.getElementById('consultaModal'));
    modal.hide();
  }