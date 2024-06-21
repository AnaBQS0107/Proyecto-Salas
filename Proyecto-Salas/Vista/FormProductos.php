<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../Css/bootstrap.min.css">
    <link rel="stylesheet" href="../Css/Productos.css">
    <link rel="icon" type="image/png" href="../images/logo22.png">

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
                            <form action="../Controlador/FormProductos.php" method="post" enctype="multipart/form-data">
                                <div class="mb-4">
                                    <center>
                                        <h4 class="title-form">Registro de Productos</h4>
                                    </center>
                                </div>

                                <div class="form-group">
                                    <label for="productName">Nombre del Producto</label>
                                    <input type="text" class="form-control" id="productName" name="Nombre" required>
                                </div>
                                <br>

                                <div class="form-group">
                                    <label for="productDescription">Descripción del Producto</label>
                                    <textarea class="form-control" id="productDescription" name="Descripcion"
                                        rows="3"></textarea>
                                </div>
                                <br>

                                <div class="form-group">
                                    <label for="precio">Precio sin IVA</label>
                                    <input type="number" class="form-control" id="precio" name="Precio" required
                                        oninput="calcularIVA()">
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="precioConIVA">Precio con IVA</label>
                                    <input type="number" class="form-control" id="precioConIVA" name="Precio_con_IVA"
                                        readonly>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="cantidad">Cantidad en Stock</label>
                                    <input type="number" class="form-control" id="cantidad" name="CantidadEnStock"
                                        required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="fecha">Fecha de Ingreso</label>
                                    <input type="date" class="form-control" id="fecha" name="FechaIngreso" required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="CategoriaID">Categoría:</label>
                                    <select id="CategoriaID" name="CategoriaID" required>
                                        <option value="">Seleccione...</option>
                                        <?php
                                      
                                        $host = "localhost:3307";
                                        $db_name = "sales_system";
                                        $username = "root";
                                        $password = "";

                                        try {
                                            $conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
                                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                            $sql = "SELECT CategoriaID, Nombre FROM Categoria ORDER BY CategoriaID ASC";
                                            $stmt = $conn->prepare($sql);
                                            $stmt->execute();

                                            $categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                            foreach ($categorias as $categoria) {
                                                echo "<option value='" . $categoria['CategoriaID'] . "'>" . $categoria['Nombre'] . "</option>";
                                            }
                                        } catch (PDOException $e) {
                                            echo "Error al conectar a la base de datos: " . $e->getMessage();
                                        }

                                        $conn = null; 
                                        ?>
                                    </select>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="TipoProductoID">Tipo de producto:</label>
                                    <select id="TipoProductoID" name="TipoProductoID" required>
                                        <option value="">Seleccione...</option>
                                        <?php
                                    
                                        try {
                                            $conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
                                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                            $sql = "SELECT TipoProductoID, Nombre FROM tipo_producto ORDER BY TipoProductoID ASC";
                                            $stmt = $conn->prepare($sql);
                                            $stmt->execute();

                                            $tipos_productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                            foreach ($tipos_productos as $tipo_producto) {
                                                echo "<option value='" . $tipo_producto['TipoProductoID'] . "'>" . $tipo_producto['Nombre'] . "</option>";
                                            }
                                        } catch (PDOException $e) {
                                            echo "Error al conectar a la base de datos: " . $e->getMessage();
                                        }

                                        $conn = null;
                                        ?>
                                    </select>
                                    <br><br>
                                    <div class="form-group">
                                        <label for="productImage">Imagen del Producto</label>
                                        <input type="file" class="form-control" id="productImage" name="productImage"
                                            accept="image/*" required>

                                    </div>
                                    <br><br>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="submit-btn">Guardar</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    function calcularIVA() {
        var precioSinIVA = document.getElementById('precio').value;
        var precioConIVA = precioSinIVA * 1.13;
        document.getElementById('precioConIVA').value = precioConIVA.toFixed(2);
    }
    </script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/main.js"></script>
    <?php include 'footer.php'; ?>
</body>

</html>