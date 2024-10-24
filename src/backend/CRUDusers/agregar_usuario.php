<?php
include $_SERVER['DOCUMENT_ROOT'] . '/PetServices/src/backend/config/Database.php';

$db = new Database();
$conn = $db->getConexion();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $num_telefono = $_POST['num_telefono'];
    $direccion = $_POST['direccion'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Encriptar la contraseña
    $idrol = $_POST['idrol'];
    $email_verificado = $_POST['email_verificado'];

    // Verificar si el correo ya existe
    $check_sql = "SELECT * FROM usuarios WHERE email = ?";
    $stmt_check = $conn->prepare($check_sql);
    $stmt_check->bind_param("s", $email);
    $stmt_check->execute();
    $result = $stmt_check->get_result();

    if ($result->num_rows > 0) {
        // Si el correo ya existe, mostramos un error
        echo "<script>
                alert('El correo ya está registrado.');
                window.location.href='/PetServices/src/fronted/admin/administrarUsers.php';
              </script>";
    } else {
        // Verificar que el correo sea de Gmail
        if (!preg_match("/^[a-zA-Z0-9._%+-]+@gmail\.com$/", $email)) {
            // Si el correo no es de Gmail, mostramos un error
            echo "<script>
                    alert('El correo debe ser una dirección de Gmail.');
                    window.location.href='/PetServices/src/fronted/admin/administrarUsers.php';
                  </script>";
        } else {
            // Si pasa las validaciones, procedemos a insertar el nuevo usuario
            $sql = "INSERT INTO usuarios (nombre, apellido, email, num_telefono, direccion, password, idrol, email_verificado) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssssii", $nombre, $apellido, $email, $num_telefono, $direccion, $password, $idrol, $email_verificado);
    
            if ($stmt->execute()) {
                // Redirigir a la página de administración de usuarios con un mensaje de éxito
                header('Location: /PetServices/src/fronted/admin/administrarUsers.php?success=1');
            } else {
                echo "Error al agregar el usuario: " . $conn->error;
            }
    
            $stmt->close();
        }
    }

    $stmt_check->close();
    $conn->close();
}
?>
