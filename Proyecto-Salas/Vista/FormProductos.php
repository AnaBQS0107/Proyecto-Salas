<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../Css/bootstrap.min.css">
    
    <!-- Style -->
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
            <form action="#" method="post">
              <div class="form-group">
                <label for="productName">Nombre del Producto</label>
                <input type="text" class="form-control" id="productName" required>
              </div>
              <div class="form-group">
                <label for="productDescription">Descripción del Producto</label>
                <textarea class="form-control" id="productDescription" rows="3" required></textarea>
              </div>
              <div class="form-group">
                <label for="costWithoutVAT">Costo sin IVA</label>
                <input type="number" class="form-control" id="costWithoutVAT" required>
              </div>
              <div class="form-group">
                <label for="costWithVAT">Costo con IVA</label>
                <input type="number" class="form-control" id="costWithVAT" required>
              </div>
              <div class="form-group">
                <label for="location">Ubicación</label>
                <input type="text" class="form-control" id="location" required>
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
