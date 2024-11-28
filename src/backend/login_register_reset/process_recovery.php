<?php
// Incluir el archivo de conexión
require '../config/Database.php'; // Aquí se incluye la conexión a la base de datos

// Cargar PHPMailer
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Verificar si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];

    // Preparar la consulta para verificar si el correo existe en la tabla usuarios
    $stmt = $conexion->prepare("SELECT idusuario, nombre FROM usuarios WHERE email = ?");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user) {
        // Generar un token único para la recuperación
        $token = bin2hex(random_bytes(20));

        // Actualizar el token en la base de datos
        $stmt = $conexion->prepare("UPDATE usuarios SET token_password = ?, password_request = 1 WHERE idusuario = ?");
        $stmt->bind_param('si', $token, $user['idusuario']);
        $stmt->execute();

        // Verificar si el correo es de Outlook
        if (preg_match('/(outlook\.com|hotmail\.com|live\.com|outlook\.es|utp\.edu\.pe)$/', $email)) {
            // Configurar PHPMailer
            $mail = new PHPMailer(true);
            try {
                // Configuración del servidor SMTP
                $mail->isSMTP();
                $mail->Host = 'smtp-mail.outlook.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'petservices09@hotmail.com'; // Reemplazar con tu correo de Outlook
                $mail->Password = 'ProyectoWeb09'; // Reemplazar con tu contraseña de Outlook
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;


                // Configuración del correo
                $mail->setFrom('petservices09@hotmail.com', 'Recuperación de Contraseña');
                $mail->addAddress($email); // Destinatario

                $mail->isHTML(true);
                $mail->Subject = 'Recuperación de Contraseña';
                $mail->Body = "<p>Hola {$user['nombre']},</p>
                               <p>Has solicitado restablecer tu contraseña. Haz clic en el siguiente enlace para continuar:</p>
                               <a href='localhost/petservices/src/reset_password.php?token=$token'>Recuperar Contraseña</a>";

                $mail->send();
                echo "<script>
            alert('El enlace de recuperación ha sido enviado a tu correo.');
        </script>";
                    } catch (Exception $e) {
                echo "Error al enviar el correo: {$mail->ErrorInfo}";
            }
        } else {
            echo "<script>
            alert('Este sistema solo admite la recuperación a correos de Outlook.');
          </script>";
                }
    } else {
        echo "<script>
            alert('El correo no existe en el sistema.');
          </script>";
    }
} else {
    echo "<script>
            alert('Método no permitido.');
          </script>";
}
?>