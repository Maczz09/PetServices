<?php

require_once '../config/User.php';

// Verificar si se recibió la solicitud POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recibir los datos del formulario
    $idrol = $_POST['idrol'];  // Por defecto será 2 (Usuario)
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $direccion = $_POST['direccion'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $num_telefono = $_POST['num_telefono'];

    // Crear instancia de User y registrar al usuario
    $user = new User();
    $resultado = $user->register($idrol, $nombre, $apellido, $direccion, $email, $password, $num_telefono);
    
    if ($resultado === true) {
        // Si el registro es exitoso, informarle al usuario que debe verificar su correo
        echo "<script>alert('Registro exitoso. Por favor, verifica tu correo para activar tu cuenta.'); window.location.href = '../../fronted/authentication/login.php';</script>";
    } else {
        // Mostrar el mensaje de error recibido desde el método `register`
        echo "<script>alert('$resultado'); window.history.back();</script>";
    }
}

?>
