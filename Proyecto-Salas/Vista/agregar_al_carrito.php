<?php
session_start();

if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

$host = "localhost:3307";
$db_name = "sales_system";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;

    if ($id > 0) {
        $stmt = $conn->prepare("SELECT ProductoID, Nombre, Descripcion, Precio, Imagen FROM producto WHERE ProductoID = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $producto = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($producto) {
            if (isset($_SESSION['carrito'][$id])) {
                $_SESSION['carrito'][$id]['cantidad']++;
            } else {
                $_SESSION['carrito'][$id] = [
                    "id" => $producto['ProductoID'],
                    "nombre" => $producto['Nombre'],
                    "descripcion" => $producto['Descripcion'],
                    "precio" => $producto['Precio'],
                    "imagen" => $producto['Imagen'],
                    "cantidad" => 1
                ];
            }
        }
    }
} catch (PDOException $e) {
    echo "Error al conectar a la base de datos: " . $e->getMessage();
}

$conn = null;

header('Location: CarritoCompras.php');
exit();
?>
