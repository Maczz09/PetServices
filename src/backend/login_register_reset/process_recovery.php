<?php
require_once '../config/User.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once '../PHPMailer/PHPMailer.php';
require_once '../PHPMailer/SMTP.php';
require_once '../PHPMailer/Exception.php';

// Verificar si se recibió la solicitud POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];

    // Instanciar la clase User
    $user = new User();

    // Verificar si el correo existe en la base de datos
    $resultado = $user->sendPasswordRecovery($email);

    if ($resultado === true) {
        echo json_encode(['status' => 'success', 'message' => 'El enlace de recuperación ha sido enviado a tu correo.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'El correo no existe en el sistema.']);
    }
}
?>
