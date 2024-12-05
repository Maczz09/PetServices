<?php
class Database {
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $dbname = "petservices16";
    private $conexion;

    public function __construct() {
        $this->conexion = $this->connect();
    }

    private function connect() {
        $conexion = new mysqli($this->host, $this->user, $this->password, $this->dbname);

        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }

        if (!$conexion->set_charset("utf8mb4")) {
            die("Error al establecer el charset: " . $conexion->error);
        }

        return $conexion;
    }

    public function getConexion() {
        return $this->conexion;
    }

    public function prepare($query) {
        return $this->conexion->prepare($query);
    }
}
?>
