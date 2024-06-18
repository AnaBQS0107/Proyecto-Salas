<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../Css/owl.carousel.min.css">
    <link rel="stylesheet" href="../Css/bootstrap.min.css">
    <link rel="stylesheet" href="../Css/style.css">
    <title>Login -- Sistema de Ventas</title>
</head>

<body>
<?php include 'Navbar.php'; ?>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="../images/undraw_remotely_2j6y.svg" alt="Image" class="img-fluid">
                </div>
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="mb-4">
                                <center>
                                    <h3>Inicio de sesión</h3>
                                </center>
                                <p class="mb-4">Inicia sesión y navega por nuestra gran variedad de productos.</p>
                            </div>
                            <form action="../Controlador/Login.php" method="post">
                                <div class="form-group last mb-4">
                                    <label for="personaID">ID de Persona</label>
                                    <input type="TEXT" class="form-control" id="personaID" name="personaID" required>
                                </div>
                                <div class="form-group last mb-4">
                                    <label for="password">Contraseña</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                                <input type="submit" value="Iniciar Sesión" class="btn btn-block btn-primary">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
</body>

</html>