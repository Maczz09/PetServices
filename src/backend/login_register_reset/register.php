<?php
// Incluir la conexión a la base de datos
include('../config/Database.php');

// Verificar si se recibió la solicitud POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recibir los datos del formulario
    $idrol = mysqli_real_escape_string($conexion, $_POST['idrol']);  // Por defecto será 2 (Usuario)
    $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
    $apellido = mysqli_real_escape_string($conexion, $_POST['apellido']);
    $direccion = mysqli_real_escape_string($conexion, $_POST['direccion']);
    $email = mysqli_real_escape_string($conexion, $_POST['email']);
    $password = mysqli_real_escape_string($conexion, $_POST['password']);
    $num_telefono = mysqli_real_escape_string($conexion, $_POST['num_telefono']);

    // Validar si el correo ya está registrado
    $query_check_email = "SELECT * FROM usuarios WHERE email = '$email'";
    $result_check_email = mysqli_query($conexion, $query_check_email);

    if (mysqli_num_rows($result_check_email) > 0) {
        // Si el correo ya existe, enviar un mensaje de error
        echo "<script>alert('El correo ya está registrado. Intenta con otro.'); window.history.back();</script>";
    } else {
        // Encriptar la contraseña
        $password_encriptada = password_hash($password, PASSWORD_BCRYPT);

        // Insertar los datos en la tabla 'usuarios'
        $query_insert_user = "INSERT INTO usuarios (idrol, nombre, apellido, direccion, email, password, num_telefono)
                              VALUES ('$idrol', '$nombre', '$apellido', '$direccion', '$email', '$password_encriptada', '$num_telefono')";

        if (mysqli_query($conexion, $query_insert_user)) {
            // Redirigir al login después del registro exitoso
            echo "<script>alert('Registro exitoso. Ahora puedes iniciar sesión.'); window.location.href = 'login.php';</script>";
        } else {
            // Si ocurre un error en la inserción
            echo "<script>alert('Error al registrar el usuario. Inténtalo de nuevo.'); window.history.back();</script>";
        }
    }
} else {
    // Si alguien intenta acceder al archivo directamente sin usar el formulario
    echo "<script>alert('Acceso denegado.'); window.location.href = 'register_usuario.php';</script>";
}

?>
