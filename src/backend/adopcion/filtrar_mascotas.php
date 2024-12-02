<?php
include_once '../../backend/config/Database.php';

// Conexión a la base de datos
$database = new Database();
$conexion = $database->getConexion();

// Obtener los filtros seleccionados desde el formulario (POST)
$actividadSeleccionada = isset($_POST['actividad']) ? $_POST['actividad'] : [];
$pesoSeleccionado = isset($_POST['peso']) ? $_POST['peso'] : [];
$tipoMascotaSeleccionado = isset($_POST['tipo_mascota']) ? $_POST['tipo_mascota'] : [];
$tamanoSeleccionado = isset($_POST['tamano']) ? $_POST['tamano'] : [];
$generoSeleccionado = isset($_POST['genero']) ? $_POST['genero'] : [];

// Consulta base
$sql = "SELECT * FROM mascotas WHERE 1=1";

// Filtrar por actividad
if (!empty($actividadSeleccionada)) {
    $actividadFiltros = implode("','", $actividadSeleccionada);
    $sql .= " AND actividad IN ('$actividadFiltros')";
}

// Filtrar por peso (revisar que los valores coincidan con los rangos en la base de datos)
if (!empty($pesoSeleccionado)) {
    $pesoFiltros = implode("','", $pesoSeleccionado);
    $sql .= " AND peso IN ('$pesoFiltros')";
}

// Filtrar por tipo de mascota
if (!empty($tipoMascotaSeleccionado)) {
    $tipoMascotaFiltros = implode("','", $tipoMascotaSeleccionado);
    $sql .= " AND tipo_mascota IN ('$tipoMascotaFiltros')";
}

// Filtrar por tamaño
if (!empty($tamanoSeleccionado)) {
    $tamanoFiltros = implode("','", $tamanoSeleccionado);
    $sql .= " AND tamano IN ('$tamanoFiltros')";
}

// Filtrar por sexo
if (!empty($generoSeleccionado)) {
    $generoFiltros = implode("','", $generoSeleccionado);
    $sql .= " AND genero IN ('$generoFiltros')";
}

// Ejecutar la consulta
$result = $conexion->query($sql);

// Mostrar resultados
if ($result->num_rows > 0) {
    while ($mascota = $result->fetch_assoc()) {
        echo '<a href="#" class="group relative block bg-black">';
        echo '<img
                alt="' . htmlspecialchars($mascota['nombre']) . '"
                src="/PetServices/src/fronted/adopcion_html/' . htmlspecialchars($mascota['foto']) . '"
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
        echo '<form method="POST" action="solicitar_adopcion.php">';
        echo '<input type="hidden" name="id_mascota" value="' . $mascota['id'] . '">';
        echo '<button type="submit" class="mt-4 bg-indigo-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-indigo-600">Solicitar Adopción</button>';
        echo '</form>';
        echo '</div>';
        echo '</a>';
    }
} else {
    echo '<p>No hay mascotas disponibles con los filtros aplicados.</p>';
}

$conexion->close();
?>
