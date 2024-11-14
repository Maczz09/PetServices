<?php
session_start();
include('../../backend/config/Database.php');

$db = new Database();
$conn = $db->getConexion();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['Nombre'];
    $apellido = $_POST['Apellido'];
    $email = $_POST['Email'];
    $telefono = $_POST['Telefono'];
    $direccion = $_POST['direccion'];
    $sede = $_POST['sede'];
    $biografia = $_POST['biografia'];
    $curriculum = $_POST['curriculum_vitae'];
    $id_veterinario = $_POST['id_veterinario']; // Supone que este ID viene en el formulario para identificar al veterinario

    // Verificar si el email o el teléfono ya existen en la base de datos para otro veterinario
    $check_sql = "SELECT * FROM veterinarios WHERE (Email=? OR Telefono=?) AND id_veterinario != ?";
    $stmt_check = $conn->prepare($check_sql);
    $stmt_check->bind_param('ssi', $email, $telefono, $idusuario);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();

    if ($result_check->num_rows > 0) {
        // Si ya existe un veterinario con ese email o número de teléfono
        echo "<script>
                alert('El email o número de teléfono ya están en uso.');
                window.location.href='/PetServices/src/fronted/admin/administrarVeterinarios.php';
              </script>";
    } else {
        // Preparar la declaración de actualización
        $update_sql = "UPDATE veterinarios SET Nombre=?, Apellido=?, Email=?, Telefono=?, direccion=?, sede=?, biografia=?, curriculum_vitae=? WHERE id_veterinario=?";
        $stmt = $conn->prepare($update_sql);
        $stmt->bind_param('ssssssssi', $nombre, $apellido, $email, $telefono, $direccion, $sede, $biografia, $curriculum, $id_veterinario);

        if ($stmt->execute()) {
            echo "<script>
                    alert('Veterinario actualizado correctamente');
                    window.location.href='/PetServices/src/fronted/admin/administrarVeterinarios.php?success=1';
                  </script>";
        } else {
            echo "Error al actualizar el veterinario: " . $stmt->error;
        }

        $stmt->close();
    }

    $stmt_check->close();
    $conn->close();
} else {
    echo "No se recibieron datos por POST.";
}
?>
