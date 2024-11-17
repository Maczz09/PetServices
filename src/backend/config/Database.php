<?php
class Database {
    private $conn;

    public function getConexion() {
        // Definimos la conexión utilizando mysqli
        $this->conn = new mysqli("localhost", "root", "", "petservices");

        // Verificamos si hubo algún error en la conexión
        if ($this->conn->connect_error) {
            die("Error en la conexión: " . $this->conn->connect_error);
        }

        return $this->conn;
    }
}
?>
