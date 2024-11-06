<?php  
// Asegúrate de incluir el archivo de conexión a la base de datos
include('../../backend/config/Database.php');
include '../html/header.php';

// Crear instancia de la clase Database y obtener la conexión
$database = new Database();
$conexion = $database->getConexion();

// Verificar si se ha enviado el ID de la mascota
if (isset($_POST['id_mascota'])) {
    $id_mascota = $_POST['id_mascota'];
    
    // Aquí puedes mostrar el formulario con el ID de la mascota
    // Consulta para obtener los detalles de la mascota
    $sql = "SELECT * FROM mascotas WHERE id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id_mascota);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $mascota = $result->fetch_assoc();
    } else {
        echo "<script>alert('Error: No se ha encontrado la mascota.'); window.location.href = 'mascotas.php';</script>";
    }
} else {
    echo "<script>alert('Error: No se ha proporcionado un ID de mascota.'); window.location.href = 'mascotas.php';</script>";
}

// Obtener datos del usuario
$usuario_data = [];
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['idusuario'])) {
    $idusuario = $_SESSION['idusuario'];
    $query_usuario = "SELECT nombre, apellido, direccion, email, num_telefono FROM usuarios WHERE idusuario = ?";
    
    if ($stmt = $conexion->prepare($query_usuario)) {
        $stmt->bind_param("i", $idusuario);
        $stmt->execute();
        $stmt->bind_result($nombre, $apellido, $direccion, $email, $num_telefono);
        $stmt->fetch();

        // Guardar datos del usuario en un array
        $usuario_data = [
            'nombre' => $nombre,
            'apellido' => $apellido,
            'direccion' => $direccion,
            'email' => $email,
            'num_telefono' => $num_telefono
        ];

        $stmt->close();
    } else {
        echo "<script>alert('Error al obtener los datos del usuario.');</script>";
    }
} else {
    echo "<script>alert('No has iniciado sesión.'); window.location.href = 'login.php';</script>";
}

$conexion->close();
?>