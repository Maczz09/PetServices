<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "petservices";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$id = $_GET['id'];
$sql = "SELECT id, comentario, estrellas, usuario_id FROM testimonios WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();
$testimonio = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administrador</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex flex-col items-center justify-center">
    <h1 class="text-4xl font-bold text-gray-800 mb-8">Editar Testimonio</h1>
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-4xl">
        <form id="editForm" action="update_testimonio.php" method="POST">
            <input type="hidden" id="testimonio_id" name="testimonio_id" value="<?php echo $testimonio['id']; ?>">
            <label for="comentario" class="block text-gray-700 mb-2">Comentario:</label>
            <textarea id="comentario" name="comentario" class="mb-4 p-2 border rounded w-full"><?php echo $testimonio['comentario']; ?></textarea>
            <label for="estrellas" class="block text-gray-700 mb-2">Estrellas:</label>
            <input type="number" id="estrellas" name="estrellas" min="1" max="5" class="mb-4 p-2 border rounded w-full" value="<?php echo $testimonio['estrellas']; ?>">
            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Guardar Cambios</button>
        </form>
    </div>
</body>
</html>

<?php
$stmt->close();
$conn->close();
?>