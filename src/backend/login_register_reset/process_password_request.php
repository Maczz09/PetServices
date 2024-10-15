<?php

require_once '../config/User.php';

// Verificar si el token es proporcionado en la URL y si se envió el formulario
if (isset($_GET['token']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = $_GET['token'];
    $newPassword = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    // Verificar si las contraseñas coinciden
    if ($newPassword === $confirmPassword) {
        // Instanciar la clase User
        $user = new User();

        // Sanitizar las entradas (puedes ajustar esta sanitización a tus necesidades)
        $newPassword = htmlspecialchars(trim($newPassword));
        $confirmPassword = htmlspecialchars(trim($confirmPassword));

        // Actualizar la contraseña usando el token de recuperación
        if ($user->resetPassword($token, $newPassword)) {
            echo "<script>alert('Contraseña actualizada con éxito.'); window.location.href = '/petservices/src/fronted/authentication/login.php';</script>";
            exit();
        } else {
            echo "<script>alert('El enlace de recuperación no es válido o ya ha sido utilizado.');</script>";
        }
    } else {
        echo "<script>alert('Las contraseñas no coinciden.');</script>";
    }
} else {
    echo "<script>alert('Solicitud inválida.');</script>";
}

?>