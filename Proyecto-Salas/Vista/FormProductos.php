<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../Css/bootstrap.min.css">
    <link rel="stylesheet" href="../Css/Productos.css">

    <title>Registro de Productos -- Sistema de Ventas</title>
</head>

<body>
    <?php include 'Navbar.php'; ?>
    <div class="content mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card custom-form-width">
                        <div class="card-body">
                            <form action="../Controlador/FormProductos.php" method="post">
                                <div class="mb-4">
                                    <center>
                                        <h4 class="title-form">Registro de Productos</h4>
                                    </center>
                                </div>
                                <div class="form-group">
                                    <label for="productName">Nombre del Producto</label>
                                    <input type="text" class="form-control" id="productName" name="Nombre" required>
                                </div>
                                <div class="form-group">
                                    <label for="productDescription">Descripción del Producto</label>
                                    <textarea class="form-control" id="productDescription" name="Descripcion" rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="precio">Precio</label>
                                    <input type="number" class="form-control" id="precio" name="Precio" required>
                                </div>
                                <div class="form-group">
                                    <label for="cantidad">Cantidad en Stock</label>
                                    <input type="number" class="form-control" id="cantidad" name="CantidadEnStock" required>
                                </div>
                                <div class="form-group">
                                    <label for="fecha">Fecha de Ingreso</label>
                                    <input type="date" class="form-control" id="fecha" name="FechaIngreso" required>
                                </div>
                                <div class="form-group">
                                    <label for="CategoriaID">Categoría:</label>
                                    <select id="CategoriaID" name="CategoriaID" required>
                                        <option value="">Seleccione...</option>
                                        <?php
                                            $host = "localhost:3307";  
                                            $db_name = "sales_system"; 
                                            $username = "root";       
                                            $password = "";            
                                            $conn = new mysqli($host, $username, $password, $db_name);
                                            if ($conn->connect_error) {
                                                die("Conexión fallida: " . $conn->connect_error);
                                            }
                                            $sql = "SELECT CategoriaID, Nombre FROM Categoria ORDER BY CategoriaID ASC";
                                            $result = $conn->query($sql);
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    echo "<option value='" . $row['CategoriaID'] . "'>" . $row['Nombre'] . "</option>";
                                                }
                                            } else {
                                                echo "<option value=''>No hay categorías disponibles</option>";
                                            }
                                            $conn->close();
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="TipoProductoID">Tipo de producto:</label>
                                    <select id="TipoProductoID" name="TipoProductoID" required>
                                        <option value="">Seleccione...</option>
                                        <?php
                                            $host = "localhost:3307";  
                                            $db_name = "sales_system"; 
                                            $username = "root";       
                                            $password = "";            
                                            $conn = new mysqli($host, $username, $password, $db_name);
                                            if ($conn->connect_error) {
                                                die("Conexión fallida: " . $conn->connect_error);
                                            }
                                            $sql = "SELECT TipoProductoID, Nombre FROM tipo_producto ORDER BY TipoProductoID ASC";
                                            $result = $conn->query($sql);
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    echo "<option value='" . $row['TipoProductoID'] . "'>" . $row['Nombre'] . "</option>";
                                                }
                                            } else {
                                                echo "<option value=''>No hay tipos de producto disponibles</option>";
                                            }
                                            $conn->close();
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="ubiccion">Ubicacion</label>
                                    <input type="text" class="form-control" id="ubicacion" name="ubicacion" required>
                                </div>
                                <input type="submit" value="Registrar Producto" class="btn btn-block btn-primary">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
