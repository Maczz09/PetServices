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

        // Sanitizar las entradas
        $newPassword = htmlspecialchars(trim($newPassword));

        // Actualizar la contraseña usando el token de recuperación
        if ($user->resetPassword($token, $newPassword)) {
            echo json_encode(['status' => 'success', 'message' => 'Contraseña actualizada con éxito.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'El enlace de recuperación no es válido o ya ha sido utilizado.']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Las contraseñas no coinciden.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Solicitud inválida.']);
}

?>
