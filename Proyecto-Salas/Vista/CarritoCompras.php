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
    
    $stmt = $conn->prepare("SELECT ProductoID, nombre, descripcion, precio, imagen, CantidadEnStock FROM producto WHERE ProductoID = :ProductoID");
} catch (PDOException $e) {
    echo "Error al conectar a la base de datos: " . $e->getMessage();
    die();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_SESSION['carrito'])) {
        foreach ($_POST['cantidad'] as $id => $cantidad) {
            $stmt->execute(array('ProductoID' => $id));
            $producto = $stmt->fetch(PDO::FETCH_ASSOC);

            $cantidad = min($cantidad, $producto['CantidadEnStock']);
            
            $_SESSION['carrito'][$id]['cantidad'] = $cantidad;
        }

        limpiarCarrito();
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <link rel="stylesheet" href="../Css/bootstrap.min.css">
    <link rel="stylesheet" href="../Css/CardProductos.css">
    <link rel="stylesheet" href="../Css/Carrito.css">
    <link rel="icon" type="image/png" href="../images/lll.png">
</head>

<body>
    <?php include 'Navbar.php'; ?>

    <div class="container mt-5 background-custom">
        <h2 class="titulo-carrito">Carrito de Compras</h2>
        <form id="carritoForm" action="" method="post">
            <div class="row">
                <?php
                if (!empty($_SESSION['carrito'])) {
                    foreach ($_SESSION['carrito'] as $id => $item) {
                        $stmt->execute(array('ProductoID' => $id));
                        $producto = $stmt->fetch(PDO::FETCH_ASSOC);
                ?>
                <div class="col-md-4 mb-4 producto">
                    <div class="card">
                        <img src="../uploads/<?php echo $item['imagen']; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $item['nombre']; ?></h5>
                            <p class="card-text"><?php echo $item['descripcion']; ?></p>
                            <p class="card-text">Precio: $<?php echo number_format($item['precio'], 2); ?></p>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="inputCantidad">
                                        <input type="number" class="form-control text-center cantidad-input"
                                          id="cantidad-<?php echo $id; ?>" name="cantidad[<?php echo $id; ?>]"
                                          value="<?php echo $item['cantidad']; ?>" min="0" max="<?php echo $producto['CantidadEnStock']; ?>"
                                          onchange="actualizarCarrito()"
                                        >  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    }
                } else {
                    echo "<p>El carrito está vacío.</p>";
                }
                ?>
            </div>
            <?php if (!empty($_SESSION['carrito'])): ?>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <a href="Productos.php" class="btn btn-secondary btn-block btn-volver">Volver a Productos</a>
                </div>
                <div class="col-md-4">
                    <a href="Pagos.php" class="btn btn-success btn-block btn-pagar">Generar Compra</a>
                </div>
            </div>
            <?php endif; ?>
        </form>
    </div>

    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script>
        function actualizarCarrito() {
            document.getElementById('carritoForm').submit();
        }
    </script>
    <?php include 'footer.php'; ?>
</body>

</html>