<?php
require_once '../Modelo/FormProductos.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['Nombre']) && !empty($_POST['Descripcion']) && 
        !empty($_POST['Precio']) && !empty($_POST['CantidadEnStock']) && 
        !empty($_POST['FechaIngreso']) && !empty($_POST['CategoriaID']) && 
        !empty($_POST['TipoProductoID'])) {
        
        $nombre = $_POST['Nombre'];
        $descripcion = $_POST['Descripcion'];
        $precio = $_POST['Precio'];
        $cantidad = $_POST['CantidadEnStock'];
        $fecha = $_POST['FechaIngreso'];
        $categoria = $_POST['CategoriaID'];
        $tipoProducto = $_POST['TipoProductoID'];

        $productoModelo = new ProductoModelo();

        try {
            $productoModelo->guardarProducto($nombre, $descripcion, $precio, $cantidad, $fecha, $categoria, $tipoProducto);
            echo "Producto registrado exitosamente";
        } catch (Exception $e) {
            echo "Error al registrar el producto: " . $e->getMessage();
        }

        $productoModelo->close();

    } else {
        echo "Por favor complete todos los campos del formulario";
    }
} else {
    echo "Método de solicitud no permitido";
}
?>
