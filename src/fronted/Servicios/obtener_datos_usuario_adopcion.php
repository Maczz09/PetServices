<?php
// Incluir la conexión a la base de datos
include('../../Database.php');

// Verificar si la sesión ya está iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Verificar si el usuario ha iniciado sesión
if (isset($_SESSION['idusuario'])) {
    // Obtener el id del usuario logueado
    $idusuario = $_SESSION['idusuario'];

    // Consultar los datos del usuario en la base de datos
    $query_usuario = "SELECT nombre, apellido, direccion, email, num_telefono FROM usuarios WHERE idusuario = ?";
    
    if ($stmt = $conexion->prepare($query_usuario)) {
        // Enlazar el parámetro y ejecutar la consulta
        $stmt->bind_param("i", $idusuario);
        $stmt->execute();
        $stmt->bind_result($nombre, $apellido, $direccion, $email, $num_telefono);
        $stmt->fetch();

        // Retornar los datos como un array o JSON
        $usuario_data = [
            'nombre' => $nombre,
            'apellido' => $apellido,
            'direccion' => $direccion,
            'email' => $email,
            'num_telefono' => $num_telefono
        ];

        // Enviar los datos en formato JSON
        echo json_encode($usuario_data);

        $stmt->close();
    } else {
        echo json_encode(['error' => 'Error al preparar la consulta']);
    }
} else {
    // Si no hay sesión, redirigir al inicio de sesión
    echo json_encode(['error' => 'No has iniciado sesión']);
}

$conexion->close();
?>
