<?php
session_start();
include('../../backend/config/Database.php');

$db = new Database();
$conn = $db->getConexion();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idusuario = $_POST['idusuario'];
    $idrol = $_POST['idrol'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $num_telefono = $_POST['num_telefono'];
    $direccion = $_POST['direccion'];
    $email_verificado = $_POST['email_verificado'];
    $password = $_POST['password'];

    // Verificar si el email o usuario ya existen en la base de datos para otro usuario
    $check_sql = "SELECT * FROM usuarios WHERE (email=? OR num_telefono=?) AND idusuario != ?";
    $stmt_check = $conn->prepare($check_sql);
    $stmt_check->bind_param('ssi', $email, $num_telefono, $idusuario);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();

    if ($result_check->num_rows > 0) {
        // Si ya existe un usuario con ese email o número de teléfono
        echo "<script>
                alert('El email o número de teléfono ya están en uso.');
                window.location.href='/PetServices/src/fronted/admin/administrarUsers.php';
              </script>";
    } else {
        // Actualización del usuario con o sin contraseña
        if (!empty($password)) {
            // Si se proporciona una nueva contraseña
            $password_hashed = password_hash($password, PASSWORD_BCRYPT);
            $sql = "UPDATE usuarios 
                    SET idrol=?, nombre=?, apellido=?, email=?, num_telefono=?, direccion=?, password=?, email_verificado=? 
                    WHERE idusuario=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('isssissii', $idrol, $nombre, $apellido, $email, $num_telefono, $direccion, $password_hashed, $email_verificado, $idusuario);
        } else {
            // Sin cambiar la contraseña
            $sql = "UPDATE usuarios 
                    SET idrol=?, nombre=?, apellido=?, email=?, num_telefono=?, direccion=?, email_verificado=? 
                    WHERE idusuario=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('isssissi', $idrol, $nombre, $apellido, $email, $num_telefono, $direccion, $email_verificado, $idusuario);
        }

        if ($stmt->execute()) {
            echo "Usuario actualizado correctamente";
        } else {
            echo "Error al actualizar el usuario: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();

        // Redirigir al usuario a la página de administración de usuarios
        header('Location: /PetServices/src/fronted/admin/administrarUsers.php?success=1');
        exit();
    }
} else {
    echo "No se recibieron datos por POST.";
}
?>
