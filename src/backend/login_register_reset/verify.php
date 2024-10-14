<?php

require_once '../config/User.php';

if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $user = new User();

    if ($user->verifyEmail($token)) {
        echo "<script>alert('Tu correo ha sido verificado exitosamente. Ahora puedes iniciar sesión.'); window.location.href = 'login.php';</script>";
    } else {
        echo "<script>alert('El enlace de verificación no es válido o ya ha sido utilizado.'); window.location.href = 'register_usuario.php';</script>";
    }
}

?>
