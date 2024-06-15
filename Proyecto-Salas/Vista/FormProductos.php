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
            <form action="guardar_producto.php" method="post">
              <div class="form-group">
                <label for="productName">Nombre del Producto</label>
                <input type="text" class="form-control" id="productName" name="productName" required>
              </div>
              <div class="form-group">
                <label for="productDescription">Descripción del Producto</label>
                <textarea class="form-control" id="productDescription" name="productDescription" rows="3"></textarea>
              </div>
              <div class="form-group">
                <label for="Precio">Precio</label>
                <input type="number" class="form-control" id="precio" name="precio" required>
              </div>
              <div class="form-group">
                <label for="cantidad">Cantidad en Stock</label>
                <input type="number" class="form-control" id="cantidad" name="cantidad" required>
              </div>
              <div class="form-group">
                <label for="fecha">Fecha de Ingreso</label>
                <input type="date" class="form-control" id="fecha" name="fecha" required>
              </div>
              <div class="form-group">
                <label for="categoria">Categoría</label>
                <input type="text" class="form-control" id="categoria" name="categoria" required>
              </div>
              <div class="form-group">
                <label for="tipoProducto">Tipo de Producto</label>
                <input type="number" class="form-control" id="tipoProducto" name="tipoProducto" required>
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
