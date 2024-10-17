<?php
// Incluir la conexión a la base de datos
include('../config/Database.php');
session_start(); // Asegúrate de iniciar la sesión

// Crear una instancia de la clase Database
$database = new Database();
$conexion = $database->getConexion(); // Obtener la conexión

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar que se haya recibido el id_mascota y que el usuario esté logueado
    if (isset($_POST['id_mascota']) && !empty($_POST['id_mascota']) && isset($_SESSION['idusuario'])) {
        $id_mascota = mysqli_real_escape_string($conexion, $_POST['id_mascota']);
        $usuario_id = $_SESSION['idusuario']; // ID del usuario desde la sesión
        $comentario = mysqli_real_escape_string($conexion, $_POST['comentario'] ?? ''); // Captura del comentario, si existe

        // Capturar las respuestas adicionales del formulario
        $preguntas = [];
        for ($i = 1; $i <= 14; $i++) {
            $preguntas[] = mysqli_real_escape_string($conexion, $_POST["pregunta$i"] ?? '');
        }

        // Consulta para insertar la solicitud de adopción en la base de datos
        $query_insert_adopcion = "
            INSERT INTO solicitudes_adopcion
            (id_mascota, idusuario, pregunta1, pregunta2, pregunta3, pregunta4, pregunta5, pregunta6, pregunta7, pregunta8, pregunta9, pregunta10, pregunta11, pregunta12, pregunta13, pregunta14, comentario) 
            VALUES 
            ('$id_mascota', '$usuario_id', '" . implode("', '", $preguntas) . "', '$comentario')";

        // Ejecutar la consulta y verificar si se realizó correctamente
        if (mysqli_query($conexion, $query_insert_adopcion)) {
            // Redirigir o mostrar un mensaje de éxito
            echo "<script> window.location.href = '../../fronted/html/index.php';</script>";
        } else {
            // Si ocurre un error en la inserción
            echo "<script>alert('Error al enviar la solicitud. Inténtalo de nuevo.'); window.history.back();</script>";
        }
    } else {
        // Si no se recibieron los datos necesarios
        if (!isset($_POST['id_mascota']) || empty($_POST['id_mascota'])) {
            echo "<script>alert('Error: No se ha seleccionado una mascota.'); window.location.href = '../../fronted/html/index.php';</script>";
        } elseif (!isset($_SESSION['idusuario'])) {
            echo "<script>alert('Error: No estás logueado.'); window.location.href = '../../fronted/html/login.php';</script>";
        } else {
            echo "<script>alert('Error: Datos no válidos.'); window.location.href = '../../fronted/html/index.php';</script>";
        }
    }
} else {
    // Si alguien intenta acceder al archivo directamente sin usar el formulario
    echo "<script>alert('Acceso denegado.'); window.location.href = '../../fronted/html/index.php';</script>";
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>