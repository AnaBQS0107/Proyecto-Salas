<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../Css/bootstrap.min.css">
    <link rel="stylesheet" href="../Css/style.css">
    <title>Registro de Productos -- Sistema de Ventas</title>
  </head>
  <body>
    <div class="content">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-8">
            <div class="mb-4">
              <center><h3>Formulario de Registro de Productos</h3></center>
            </div>
            <form action="../Controlador/FormProductos.php" method="post">
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
                <label for="categoria">Categoría</label>
                <input type="text" class="form-control" id="categoria" name="CategoriaID" required>
              </div>
              <div class="form-group">
                <label for="tipoProducto">Tipo de Producto</label>
                <input type="number" class="form-control" id="tipoProducto" name="TipoProductoID" required>
              </div>
              <input type="submit" value="Registrar Producto" class="btn btn-block btn-primary">
            </form>
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
