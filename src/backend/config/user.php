<?php

require_once 'Database.php';
require_once '../config/loadEnv.php'; // Cargar la función para variables de entorno

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/Exception.php';
require '../PHPMailer/SMTP.php';

// Cargar las variables de entorno desde el archivo .env
loadEnv(__DIR__ . '/../../../.env'); // Ajusta la ruta según la estructura de tu proyecto
class User {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function login($email, $password) {
        $conexion = $this->db->getConexion();
    
        // Declaramos las variables que serán usadas para almacenar los resultados
        $idusuario = null;
        $idrol = null;
        $hashed_password = null;
        $email_verificado = null;
    
        // Consultar el usuario por su email
        $stmt = $conexion->prepare("SELECT idusuario, idrol, password, email_verificado FROM usuarios WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
    
        // Asignar los resultados a las variables
        $stmt->bind_result($idusuario, $idrol, $hashed_password, $email_verificado);
        $stmt->fetch();
        $stmt->close();
    
        // Verificar si el usuario existe
        if ($idusuario) {
            // Verificar si la contraseña es correcta
            if (password_verify($password, $hashed_password)) {
                // Verificar si el correo está verificado
                if ($email_verificado == 1) {
                    session_start();
                    $_SESSION['idusuario'] = $idusuario;
                    $_SESSION['idrol'] = $idrol;
                    return true;
                } else {
                    return "Debes verificar tu correo antes de iniciar sesión.";
                }
            } else {
                return "La contraseña es incorrecta.";
            }
        } else {
            return "No existe ninguna cuenta con este correo.";
        }
    }
    
    

    public function register($idrol, $nombre, $apellido, $direccion, $email, $password, $num_telefono) {
    
        // Verificar si el correo es de Gmail
        if (!preg_match('/^[a-zA-Z0-9._%+-]+@gmail\.com$/', $email)) {
            return "Solo se permiten correos de Gmail."; 
        }
    
        $conexion = $this->db->getConexion();
    
        // Verificar si el correo ya existe en la tabla `usuarios`
        $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE email = ?");
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();
    
        if ($stmt->num_rows > 0) {
            $stmt->close();
            return "El correo ya está registrado."; 
        } else {
            $stmt->close(); 
    
            $password_encriptada = password_hash($password, PASSWORD_BCRYPT);
    
            $token_verificacion = bin2hex(random_bytes(20));
    
            $stmt = $conexion->prepare("INSERT INTO usuarios (idrol, nombre, apellido, direccion, email, password, num_telefono, email_verificado, token_verificacion) 
                                        VALUES (?, ?, ?, ?, ?, ?, ?, 0, ?)");
            if ($stmt) {
                $stmt->bind_param('isssssis', $idrol, $nombre, $apellido, $direccion, $email, $password_encriptada, $num_telefono, $token_verificacion);
                $stmt->execute();
    
                // Verificar si la inserción fue exitosa
                if ($stmt->affected_rows > 0) {
                    $this->sendVerificationEmail($email, $token_verificacion);
                    $stmt->close();
                    return true;
                } else {
                    $stmt->close();
                    return "La inserción del usuario falló."; 
                }
            } else {
                return "Error al preparar la consulta SQL."; 
            }
        }
    }
    
    
    
    // Método para enviar correo de verificación
    private function sendVerificationEmail($email, $token) {
        $mail = new PHPMailer(true);
    
        try {
            $mail->isSMTP();
            $mail->Host = getenv('SMTP_HOST'); 
            $mail->SMTPAuth = true;
            $mail->Username = getenv('SMTP_USER'); 
            $mail->Password = getenv('SMTP_PASSWORD'); 
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = getenv('SMTP_PORT'); 
    
            // Configuración del correo
            $mail->setFrom(getenv('SMTP_USER'), 'Verificación de Correo');
            $mail->addAddress($email);
    
            $mail->isHTML(true);
            $mail->Subject = 'Verifica tu correo electrónico';
            $mail->Body = "
                <div style='font-family: Arial, sans-serif; font-size: 16px; color: #333; line-height: 1.5;'>
                    <h2 style='color: #296798;'>Hola,</h2>
                    <p>Gracias por registrarte en PetServices. Para completar el proceso de registro y verificar tu cuenta, por favor haz clic en el siguiente botón:</p>
                    <div style='text-align: center; margin: 20px 0;'>
                        <a href='http://localhost/petservices/src/backend/login_register_reset/verify.php?token=$token'
                           style='display: inline-block; padding: 15px 25px; font-size: 16px; color: white; background-color: #296798; text-decoration: none; border-radius: 5px;'>
                           Verificar mi cuenta
                        </a>
                    </div>
                    <p>Si no solicitaste este registro, puedes ignorar este correo.</p>
                    <p>Gracias,</p>
                    <p>El equipo de PetServices</p>
                </div>
            ";
            
    
            $mail->send();
        } catch (Exception $e) {
            echo "Error al enviar el correo: {$mail->ErrorInfo}";
        }
    }
    

    // Método para verificar el correo electrónico
    public function verifyEmail($token) {
        $conexion = $this->db->getConexion();

        $stmt = $conexion->prepare("UPDATE usuarios SET email_verificado = 1, token_verificacion = NULL WHERE token_verificacion = ?");
        $stmt->bind_param('s', $token);
        $stmt->execute();
        $result = $stmt->affected_rows;
        $stmt->close();
    
        return $result > 0; // Retorna true si la verificación fue exitosa
    }
    
    
    public function resetPassword($token, $newPassword) {
        $conexion = $this->db->getConexion();
        $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
    
        $stmt = $conexion->prepare("UPDATE usuarios SET password = ?, token_password = NULL, password_request = 0 WHERE token_password = ?");
        $stmt->bind_param('ss', $hashedPassword, $token);
        $stmt->execute();
        $result = $stmt->affected_rows;
        $stmt->close();
    
        return $result > 0;
    }
    public function sendPasswordRecovery($email) {
        $conexion = $this->db->getConexion();
        
        $stmt = $conexion->prepare("SELECT idusuario, nombre FROM usuarios WHERE email = ?");
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $stmt->close();
    
        if ($user) {

            $token = bin2hex(random_bytes(20));
    
            $stmt = $conexion->prepare("UPDATE usuarios SET token_password = ?, password_request = 1 WHERE idusuario = ?");
            $stmt->bind_param('si', $token, $user['idusuario']);
            $stmt->execute();
            $stmt->close();
    

            $this->sendRecoveryEmail($email, $token);
            return true;
        } else {
            return false; 
        }
    }
    
    // Método para enviar el correo de recuperación
    private function sendRecoveryEmail($email, $token) {
        $mail = new PHPMailer(true);

        try {

            $mail->isSMTP();
            $mail->Host = getenv('SMTP_HOST'); 
            $mail->SMTPAuth = true;
            $mail->Username = getenv('SMTP_USER'); 
            $mail->Password = getenv('SMTP_PASSWORD'); 
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = getenv('SMTP_PORT'); 

            // Configuración del correo
            $mail->setFrom(getenv('SMTP_USER'), 'Recuperar contraseña');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Recuperar Contraseña';
            $mail->Body = "
                <div style='font-family: Arial, sans-serif; font-size: 16px; color: #333; line-height: 1.5;'>
                    <h2 style='color: #296798;'>Hola,</h2>
                    <p>Has solicitado restablecer tu contraseña. Para continuar con el proceso, haz clic en el siguiente botón:</p>
                    <div style='text-align: center; margin: 20px 0;'>
                        <a href='http://localhost/petservices/src/fronted/authentication/reset.php?token=$token'
                           style='display: inline-block; padding: 15px 25px; font-size: 16px; color: white; background-color: #296798; text-decoration: none; border-radius: 5px;'>
                           Restablecer Contraseña
                        </a>
                    </div>
                    <p>Si no solicitaste este cambio, puedes ignorar este correo. Tu contraseña no será modificada.</p>
                    <p>Gracias,</p>
                    <p>El equipo de PetServices</p>
                </div>
            ";
            

            $mail->send();
        } catch (Exception $e) {
            // Manejar error en el envío
            echo "Error al enviar el correo: {$mail->ErrorInfo}";
        }
    }
    
}
