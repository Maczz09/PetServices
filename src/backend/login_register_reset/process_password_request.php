<?php
// Include the database connection
require '../config/Database.php';

// Check if the token is provided in the URL and if the form is submitted
if (isset($_GET['token']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = $_GET['token'];
    $newPassword = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    // Check if the new password matches the confirm password
    if ($newPassword === $confirmPassword) {
        // Hash the new password
        $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);

        // Prepare the query to update the password
        $stmt = $conexion->prepare("UPDATE usuarios SET password = ?, token_password = NULL, password_request = 0 WHERE token_password = ?");
        $stmt->bind_param('ss', $hashedPassword, $token);
        $stmt->execute();

        // Check if the password was updated
        if ($stmt->affected_rows > 0) {
            header("Location: ../src/login.php"); // Redirect to login page
            exit(); // Make sure to stop script execution after redirect
        } else {
            // If the token is invalid or no rows were affected
            echo "<script>
                    alert('El enlace de recuperación es falso o no ha sido correcto.');
                  </script>";
        }
    } else {
        // If the passwords don't match
        echo "<script>
                alert('Las contraseñas no coinciden.');
              </script>";
    }
} else {
    // If the token is not provided or invalid request
    echo "<script>
            alert('Solicitud inválida.');
          </script>";
}
?>

