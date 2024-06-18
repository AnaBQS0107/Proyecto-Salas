<?php
$host = "localhost:3307";
$db_name = "sales_system";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Obtener datos del formulario
        $nombre = $_POST['Nombre'];
        $descripcion = $_POST['Descripcion'];
        $precio = $_POST['Precio'];
        $precio_con_iva = $_POST['Precio_con_IVA'];
        $cantidad_en_stock = $_POST['CantidadEnStock'];
        $fecha_ingreso = $_POST['FechaIngreso'];
        $categoria_id = $_POST['CategoriaID'];
        $tipo_producto_id = $_POST['TipoProductoID'];
        $imagen = $_FILES['productImage']['name']; // Nombre del archivo de imagen

        // Manejo de la imagen
        if (isset($_FILES['productImage']) && $_FILES['productImage']['error'] === UPLOAD_ERR_OK) {
            $target_dir = "../uploads/";
            $target_file = $target_dir . basename($_FILES['productImage']['name']);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Verificar si el archivo es una imagen real
            $check = getimagesize($_FILES['productImage']['tmp_name']);
            if ($check !== false) {
                // Mover archivo al directorio de uploads
                if (move_uploaded_file($_FILES['productImage']['tmp_name'], $target_file)) {
                    // Insertar datos en la tabla producto
                    $sql = "INSERT INTO producto (Nombre, Descripcion, Precio, Precio_con_IVA, CantidadEnStock, FechaIngreso, CategoriaID, TipoProductoID, Imagen)
                            VALUES (:nombre, :descripcion, :precio, :precio_con_iva, :cantidad_en_stock, :fecha_ingreso, :categoria_id, :tipo_producto_id, :imagen)";
                    $stmt = $conn->prepare($sql);
                    $stmt->bindParam(':nombre', $nombre);
                    $stmt->bindParam(':descripcion', $descripcion);
                    $stmt->bindParam(':precio', $precio);
                    $stmt->bindParam(':precio_con_iva', $precio_con_iva); // Corregido el nombre del parámetro
                    $stmt->bindParam(':cantidad_en_stock', $cantidad_en_stock);
                    $stmt->bindParam(':fecha_ingreso', $fecha_ingreso);
                    $stmt->bindParam(':categoria_id', $categoria_id);
                    $stmt->bindParam(':tipo_producto_id', $tipo_producto_id);
                    $stmt->bindParam(':imagen', $imagen); // Usando el nombre del archivo de imagen

                    if ($stmt->execute()) {
                        echo "Producto registrado correctamente.";
                    } else {
                        echo "Error al registrar el producto.";
                    }
                } else {
                    echo "Error al subir el archivo de imagen.";
                }
            } else {
                echo "El archivo no es una imagen válida.";
            }
        } else {
            echo "No se ha subido ninguna imagen o hubo un error en la subida.";
        }
    }
} catch (PDOException $e) {
    echo "Error al conectar a la base de datos: " . $e->getMessage();
}

$conn = null;
?>
