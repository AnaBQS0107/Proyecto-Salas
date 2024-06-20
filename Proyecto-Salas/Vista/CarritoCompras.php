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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_SESSION['carrito'])) {
        foreach ($_POST['cantidad'] as $id => $cantidad) {
            $_SESSION['carrito'][$id]['cantidad'] = $cantidad;
        }

        limpiarCarrito();
    }
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
</head>

<body>
    <?php include 'Navbar.php'; ?>

    <div class="container mt-5">
        <h2 class="titulo-carrito">Carrito de Compras</h2>
        <form action="" method="post">
            <div class="row">
                <?php
                if (!empty($_SESSION['carrito'])) {
                    foreach ($_SESSION['carrito'] as $id => $item) {
                ?>
                <div class="col-md-4 mb-4 producto">
                    <div class="card">
                        <img src="../uploads/<?php echo $item['imagen']; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $item['nombre']; ?></h5>
                            <p class="card-text"><?php echo $item['descripcion']; ?></p>
                            <p class="card-text">Precio: $<?php echo number_format($item['precio'], 2); ?></p>
                            <div class="form-group">
                                <label for="cantidad-<?php echo $id; ?>"></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-secondary menos" type="button"
                                            data-producto-id="<?php echo $id; ?>">-</button>
                                    </div>
                                    <input type="text" class="form-control text-center "
                                        id="cantidad-<?php echo $id; ?>" name="cantidad[<?php echo $id; ?>]"
                                        value="<?php echo $item['cantidad']; ?>" min="0">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary mas" type="button"
                                            data-producto-id="<?php echo $id; ?>">+</button>
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
                <div class="row">
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary btn-block btn-actualizar">Actualizar Carrito</button>
                </div>
                <div class="col-md-4">
                    <a href="Productos.php" class="btn btn-secondary btn-block btn-volver">Volver a Productos</a>
                </div>
                <div class="col-md-4">
                    <a href="Pagos.php" class="btn btn-success btn-block btn-pagar">Pagar</a>
                </div>
            </div>
            <?php endif; ?>
        </form>
    </div>

    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script>
    $(document).ready(function() {
        $('.mas').click(function(e) {
            e.preventDefault();
            var productId = $(this).data('producto-id');
            var cantidadInput = $('#cantidad-' + productId);
            var cantidad = parseInt(cantidadInput.val());
            cantidad++;
            cantidadInput.val(cantidad);
        });

        $('.menos').click(function(e) {
            e.preventDefault();
            var productId = $(this).data('producto-id');
            var cantidadInput = $('#cantidad-' + productId);
            var cantidad = parseInt(cantidadInput.val());
            if (cantidad > 0) {
                cantidad--;
                cantidadInput.val(cantidad);
            }
        });
    });
    </script>
</body>

</html>
