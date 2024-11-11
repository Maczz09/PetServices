<?php

require_once '../config/User.php';

// Verificar si se recibió el token por la URL
if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $user = new User();

    // Verificar si el token es válido y marcar la cuenta como verificada
    if ($user->verifyEmail($token)) {
        // Mostrar un mensaje de éxito con un "check"
        echo "<div style='text-align: center; margin-top: 50px;'>
                <h2 style='color: green;'>✔ Cuenta verificada exitosamente</h2>
                <p>Tu cuenta ha sido verificada. Ya puedes iniciar sesión.</p>
                <a href='../../fronted/authentication/login.php' style='padding: 10px 20px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 5px;'>Iniciar sesión</a>
              </div>";
    } else {
        // Si el token no es válido, mostrar un mensaje de error
        echo "<div style='text-align: center; margin-top: 50px;'>
                <h2 style='color: red;'>✖ El enlace de verificación no es válido o ya ha sido utilizado</h2>
                <p>Por favor, regístrate de nuevo o verifica tu correo.</p>
                <a href='../../fronted/authentication/register_usuario.php' style='padding: 10px 20px; background-color: #f44336; color: white; text-decoration: none; border-radius: 5px;'>Registrarse</a>
              </div>";
    }
}

?>
