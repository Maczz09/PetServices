<?php
// Incluir archivo de conexión
include('../config/Database.php');

// Crear instancia de la clase Database y obtener la conexión
$database = new Database();
$conexion = $database->getConexion();

// Inicializar la consulta
$sql = "SELECT * FROM mascotas WHERE 1=1";

// Filtrar por actividad
if (!empty($_GET['actividad'])) {
    $actividad = $conexion->real_escape_string($_GET['actividad']);
    $sql .= " AND actividad = '$actividad'";
}

// Filtrar por peso
if (!empty($_GET['peso'])) {
    $peso = $_GET['peso'];
    switch ($peso) {
        case '0-5kg':
            $sql .= " AND peso = '0-5kg'";
            break;
        case '5-10kg':
            $sql .= " AND peso = '5-10kg'";
            break;
        case '10-20kg':
            $sql .= " AND peso = '10-20kg'";
            break;
        case '20kg+':
            $sql .= " AND peso = '20kg+'";
            break;
        default:
            // Manejar un caso no esperado
            break;
    }
}

// Filtrar por tamaño
if (!empty($_GET['tamano'])) {
    $tamano = $conexion->real_escape_string($_GET['tamano']);
    $sql .= " AND tamano = '$tamano'";
}

// Filtrar por tipo de mascota
if (!empty($_GET['tipo_mascota'])) {
    $tipo_mascota = $conexion->real_escape_string($_GET['tipo_mascota']);
    $sql .= " AND tipo_mascota = '$tipo_mascota'";
}

// Filtrar por sexo
if (!empty($_GET['sexo_mascota'])) {
    $sexo_mascota = $conexion->real_escape_string($_GET['sexo_mascota']);
    $sql .= " AND genero = '$sexo_mascota'";
}

// Ejecutar la consulta
$result = $conexion->query($sql);

// Verificar si hay resultados
if ($result->num_rows > 0) {
    while ($mascota = $result->fetch_assoc()) {
        echo '<a href="#" class="group relative block bg-black">';
        echo '<img
            alt="' . htmlspecialchars($mascota['nombre']) . '"
            src="' . htmlspecialchars($mascota['foto']) . '"
            class="absolute inset-0 h-full w-full object-cover opacity-75 transition-opacity group-hover:opacity-50"
        />';

        echo '<div class="relative p-4 sm:p-6 lg:p-8">';
        echo '<p class="text-sm font-medium uppercase tracking-widest text-pink-500">' . htmlspecialchars($mascota['tipo_mascota']) . '</p>';
        echo '<p class="text-xl font-bold text-white sm:text-2xl">' . htmlspecialchars($mascota['nombre']) . '</p>';
        echo '<div class="mt-32 sm:mt-48 lg:mt-64">';
        echo '<div class="translate-y-8 transform opacity-0 transition-all group-hover:translate-y-0 group-hover:opacity-100">';
        echo '<p class="text-sm text-white">';
        echo 'Edad: ' . $mascota['edad'] . ' años, ' . $mascota['edad_meses'] . ' meses<br>';
        echo 'Sexo: ' . htmlspecialchars($mascota['genero']) . '<br>';
        echo 'Tamaño: ' . htmlspecialchars($mascota['tamano']) . '<br>';
        echo 'Actividad: ' . htmlspecialchars($mascota['actividad']) . '<br>';
        echo 'Peso: ' . htmlspecialchars($mascota['peso']) . '<br>';
        echo 'Enfermedad: ' . htmlspecialchars($mascota['enfermedad'] ?: 'Ninguna') . '<br>';
        echo '</p>';
        echo '</div>';
        echo '</div>';

        echo '<form method="POST" action="../../fronted/html/solicitar_adopcion.php">';
        echo '<input type="hidden" name="id_mascota" value="' . $mascota['id'] . '">';
        echo '<button type="submit" class="mt-4 bg-indigo-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-indigo-600" onclick="return verificarSesion()">Solicitar Adopción</button>';
        echo '</form>';

        echo '</div>'; // Cierre de <div class="relative p-4 sm:p-6 lg:p- 8">
        echo '</a>';
    }
} else {
    echo '<p>No hay mascotas disponibles para adopción en este momento.</p>';
}

$conexion->close();
?>