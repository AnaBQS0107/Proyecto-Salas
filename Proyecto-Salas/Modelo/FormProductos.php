<?php
require_once '../Config/config.php';

class ProductoModelo {
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

    public function guardarProducto($nombre, $descripcion, $precio, $cantidad, $fecha, $categoriaID, $tipoProductoID) {
        try {
            $sql = "INSERT INTO producto (Nombre, Descripcion, Precio, CantidadEnStock, FechaIngreso, CategoriaID, TipoProductoID)
                    VALUES (:nombre, :descripcion, :precio, :cantidad, :fecha, :categoriaID, :tipoProductoID)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $stmt->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
            $stmt->bindParam(':precio', $precio, PDO::PARAM_INT);
            $stmt->bindParam(':cantidad', $cantidad, PDO::PARAM_INT);
            $stmt->bindParam(':fecha', $fecha, PDO::PARAM_STR);
            $stmt->bindParam(':categoriaID', $categoriaID, PDO::PARAM_STR); 
            $stmt->bindParam(':tipoProductoID', $tipoProductoID, PDO::PARAM_INT); 
            $stmt->execute();
        } catch (PDOException $exception) {
            echo "Error al guardar el producto: " . $exception->getMessage();
        }
    }

    public function close() {
        $this->conn = null;
    }
}
?>
