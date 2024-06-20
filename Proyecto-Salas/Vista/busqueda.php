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
        <div class="row">
            <div class="col-md-6 mb-4">
                <form action="productos.php" method="GET" class="form-inline" id="formBusqueda">
                    <div class="form-group">
                        <label for="busquedaNombre" class="mr-2">Buscar por nombre:</label>
                        <input type="text" class="form-control" id="busquedaNombre" name="busquedaNombre"
                            placeholder="Ingrese el nombre del producto">
                    </div>
                    <button type="submit" class="btn btn-primary ml-2">Buscar</button>
                </form>
            </div>
        </div>
    </div>

    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>

</html>
