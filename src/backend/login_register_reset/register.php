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

    $user = new User();
    if ($user->register($idrol, $nombre, $apellido, $direccion, $email, $password, $num_telefono)) {
        echo "<script>alert('Registro exitoso. Por favor, verifica tu correo.'); window.location.href = 'login.php';</script>";
    } else {
        echo "<script>alert('El correo ya está registrado. Intenta con otro.'); window.history.back();</script>";
    }
}

?>

