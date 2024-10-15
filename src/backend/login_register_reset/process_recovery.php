<?php
require_once '../config/User.php'; // Incluir la clase User

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once '../PHPMailer/PHPMailer.php';
require_once '../PHPMailer/SMTP.php';
require_once '../PHPMailer/Exception.php';



// Verificar si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];

    // Instanciar la clase User
    $user = new User();

    // Verificar si el correo existe y generar el token de recuperación
    if ($user->sendPasswordRecovery($email)) {
        echo "<script>alert('El enlace de recuperación ha sido enviado a tu correo.');</script>";
    } else {
        echo "<script>alert('El correo no existe en el sistema.');</script>";
    }
}
?>
