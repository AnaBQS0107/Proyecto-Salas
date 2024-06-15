<?php
require_once '../Config/config.php';

class UserModel {
    private $conn;

    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->exec("set names utf8mb4");
        } catch (PDOException $exception) {
            echo "Error de conexión: " . $exception->getMessage();
        }
    }

    public function getUserByPersonaID($personaID) {
        $stmt = $this->conn->prepare("SELECT * FROM Usuario WHERE PersonaID = :personaID");
        $stmt->bindParam(':personaID', $personaID, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function close() {
        $this->conn = null;
    }
}
?>