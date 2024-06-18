<?php
require_once '../Modelo/FormProductos.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['Nombre']) && !empty($_POST['Descripcion']) &&
        isset($_POST['Precio_sin_IVA']) && isset($_POST['Precio_con_IVA']) &&
        !empty($_POST['CantidadEnStock']) && !empty($_POST['FechaIngreso']) &&
        !empty($_POST['CategoriaID']) && !empty($_POST['TipoProductoID'])) {
        
        $nombre = $_POST['Nombre'];
        $descripcion = $_POST['Descripcion'];
        $precio_sin_iva = $_POST['Precio_sin_IVA'];
        $precio_con_iva = $_POST['Precio_con_IVA'];
        $cantidad = $_POST['CantidadEnStock'];
        $fecha = $_POST['FechaIngreso'];
        $categoria = $_POST['CategoriaID'];
        $tipoProducto = $_POST['TipoProductoID'];

        $productoModelo = new ProductoModelo();

        try {
            $productoModelo->guardarProducto($nombre, $descripcion, $precio_sin_iva, $precio_con_iva, $cantidad, $fecha, $categoria, $tipoProducto);
            echo "Producto registrado exitosamente";
        } catch (Exception $e) {
            echo "Error al registrar el producto: " . $e->getMessage();
        }

        // Cerrar conexión (si aplica)
        $productoModelo->close();

    } else {
        echo "Por favor complete todos los campos del formulario, incluyendo el Precio con IVA";
    }
} else {
    echo "Método de solicitud no permitido";
}
?>
