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
            header("Location: ../../fronted/dashboard/dashboard.php");
        } else {
            header("Location: ../../fronted/html/index.php");
        }
        exit(); // Asegurarse de que el script se detenga después de la redirección
    } else {
        // Mostrar el mensaje de error (si el correo no está verificado, o si la contraseña es incorrecta)
        echo "<script>alert('$loginResult');</script>";
    }
}
?>
