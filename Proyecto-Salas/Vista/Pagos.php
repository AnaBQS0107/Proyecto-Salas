<?php
session_start();


function limpiarCarrito() {
    foreach ($_SESSION['carrito'] as $key => $item) {
        if ($item['cantidad'] <= 0) {
            unset($_SESSION['carrito'][$key]);
        }
    }
}


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
} catch (PDOException $e) {
    echo "Error al conectar a la base de datos: " . $e->getMessage();
    die();
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['carrito'] = [];
    $mensajePago = "El pago se ha procesado exitosamente.";
}

$productosCarrito = [];
if (!empty($_SESSION['carrito'])) {
    foreach ($_SESSION['carrito'] as $id => $producto) {
        $productosCarrito[] = [
            'id' => $id,
            'nombre' => $producto['nombre'],
            'cantidad' => $producto['cantidad'],
            'precio' => $producto['precio'],
            'subtotal' => $producto['cantidad'] * $producto['precio']
        ];
    }
} else {
    if (!isset($mensajePago)) {
        echo "<div class='container mt-5'>";
        echo "<p>El carrito está vacío.</p>";
        echo "<a href='Productos.php' class='btn btn-primary'>Volver a la lista de productos</a>";
        echo "</div>";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagos</title>
    <link rel="stylesheet" href="../Css/bootstrap.min.css">
    <link rel="stylesheet" href="../Css/CardProductos.css">
    <link rel="stylesheet" href="../Css/Carrito.css">
    <link rel="stylesheet" href="../Css/Pagos.css">
    <link rel="icon" type="image/png" href="../images/llll.png">
</head>

<body>
    <div class="page-container">
        <?php include 'Navbar.php'; ?>

        <div class="container mt-5">
            <h2 class="titulo-carrito">Resumen de Compra</h2>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <?php if (isset($mensajePago)): ?>
                                <p><?php echo $mensajePago; ?></p>
                                <a href="Productos.php" class="btn btn-primary">Volver a la lista de productos</a>
                            <?php else: ?>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Producto</th>
                                            <th>Cantidad</th>
                                            <th>Precio Unitario</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($productosCarrito as $producto): ?>
                                        <tr>
                                            <td><?php echo $producto['nombre']; ?></td>
                                            <td><?php echo $producto['cantidad']; ?></td>
                                            <td>$<?php echo number_format($producto['precio'], 2); ?></td>
                                            <td>$<?php echo number_format($producto['subtotal'], 2); ?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <form action="" method="post">
                                    <button type="submit" class="btn btn-success btn-block btn-pagar">Pagar</button>
                                </form>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include 'footer.php'; ?>
    </div>

    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>

</html>

<style>
html, body {
    height: 100%;
}

.page-container {
    display: flex;
    flex-direction: column;
    min-height: 100%;
}

.container {
    flex: 1;
}

.footer {
    width: 100%;
    background-color: #333;
    color: white;
    text-align: center;
    padding: 10px 0;
    position: fixed;
    bottom: 0;
}
</style>