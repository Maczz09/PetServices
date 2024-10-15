<?php
require_once '../config/User.php';

// Verificar si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = new User();
    if ($user->login($email, $password)) {
        // Redirigir según el rol
        if ($_SESSION['idrol'] == 1) {
            header("Location: ../../fronted/dashboard/dashboard.php");
        } else {
            header("Location: ../../fronted/html/index.php");
        }
        exit();
    } else {
        echo "<script>alert('credenciales incorrectas 😿.');</script>";
    }
}
?>
