<?php
// Iniciar sesión
session_start();

// Incluir archivo de conexión
include('../config/Database.php');

// Crear una instancia de la clase Database y obtener la conexión
$db = new Database();
$conexion = $db->getConexion();

// Verificar si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = mysqli_real_escape_string($conexion, $_POST['email']);
    $password = mysqli_real_escape_string($conexion, $_POST['password']);
    
    // Consulta para verificar si el email existe
    $query = "SELECT idusuario, idrol, password FROM usuarios WHERE email = ?";
    $stmt = mysqli_prepare($conexion, $query);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $idusuario, $idrol, $hashed_password);
    mysqli_stmt_fetch($stmt);

    // Verificar si existe el usuario y si la contraseña es correcta
    if ($idusuario && password_verify($password, $hashed_password)) {
        // Guardar los datos en la sesión
        $_SESSION['idusuario'] = $idusuario;
        $_SESSION['idrol'] = $idrol;

        // Redirigir según el rol
        if ($idrol == 1) {
            header("Location: ../../fronted/dashboard/dashboard.php");
        } else {
            header("Location: ../../fronted/html/index.php");
        }
        exit();
    } else {
        // Si la autenticación falla, redirigir con un mensaje de error
        echo "<script>
            alert('Credenciales incorrectas 😿.');
          </script>";
        exit();
    }
}
?>
