<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos</title>
    <link rel="stylesheet" href="../Css/bootstrap.min.css">
    <link rel="stylesheet" href="../Css/CardProductos.css">
</head>

<body>
    <?php include 'Navbar.php'; ?>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 mb-4">
                <form action="lista_productos.php" method="GET" class="form-inline" id="formBusqueda">
                    <div class="form-group">
                        <input type="text" class="form-control" id="busquedaNombre" name="busquedaNombre"
                            placeholder="Ingrese el nombre del producto">
                    </div>
                    <button type="submit" class="btn btn-primary ml-2 btn-buscar">Buscar</button>
                </form>
            </div>
        </div>

        <div class="row" id="listaProductos">
            <?php
        
            $host = "localhost:3307";
            $db_name = "sales_system";
            $username = "root";
            $password = "";

            try {
                $conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $filtroNombre = isset($_GET['busquedaNombre']) ? $_GET['busquedaNombre'] : '';

                $sql = "SELECT ProductoID, Nombre, Descripcion, Precio, Imagen FROM producto";

                if (!empty($filtroNombre)) {
                    $sql .= " WHERE Nombre LIKE :nombre";
                }

                $stmt = $conn->prepare($sql);

                if (!empty($filtroNombre)) {
                    $nombreParam = '%' . $filtroNombre . '%';
                    $stmt->bindParam(':nombre', $nombreParam, PDO::PARAM_STR);
                }

                $stmt->execute();
                $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($productos as $producto) {
            ?>
            <div class="col-md-4 mb-4 producto">
                <div class="card">
                    <img src="../uploads/<?php echo $producto['Imagen']; ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $producto['Nombre']; ?></h5>
                        <p class="card-text"><?php echo $producto['Descripcion']; ?></p>
                        <p class="card-text">Precio: $<?php echo number_format($producto['Precio'], 2); ?></p>
                        <form action="agregar_al_carrito.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $producto['ProductoID']; ?>">
                            <button type="submit" class="btn btn-primary">Agregar a carrito</button>
                        </form>
                    </div>
                </div>
            </div>
            <?php
                }
            } catch (PDOException $e) {
                echo "Error al conectar a la base de datos: " . $e->getMessage();
            }

            $conn = null;
            ?>
        </div>
    </div>

    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/Card.js"></script>
    <?php include 'footer.php'; ?>

</body>

</html>
