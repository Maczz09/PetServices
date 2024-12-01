<?php
require_once '../config/User.php';

session_start(); // Iniciar la sesión para poder almacenar la información del usuario

// Verificar si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = new User();
    $loginResult = $user->login($email, $password);

    // Verificar el resultado del login
    if ($loginResult === true) {
        // Redirigir según el rol del usuario
        if ($_SESSION['idrol'] == 1) {
            header("Location: http://localhost/petservices/src/fronted/admin/dashboard.php");
        } else {
            header("Location: http://localhost/petservices/src/fronted/html/index.php");
        }
        exit(); // Asegurarse de que el script se detenga después de la redirección
    } else {
        // Redirigir a la página de login con el mensaje de error
        // Diferenciar los errores para mostrar el mensaje correcto
        if ($loginResult === "La contraseña es incorrecta.") {
            header("Location: http://localhost/petservices/src/fronted/authentication/login.php?password_error=" . urlencode($loginResult));
        } elseif ($loginResult === "No existe ninguna cuenta con este correo.") {
            header("Location: http://localhost/petservices/src/fronted/authentication/login.php?email_error=" . urlencode($loginResult));
        } elseif ($loginResult === "Debes verificar tu correo antes de iniciar sesión.") {
            header("Location: http://localhost/petservices/src/fronted/authentication/login.php?verification_error=" . urlencode($loginResult));
        }
        exit();
    }
}