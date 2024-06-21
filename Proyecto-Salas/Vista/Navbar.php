<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PH.SA</title>
    <link rel="icon" type="image/png" href="../images/logo22.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    .navbar {
        background: #818f9b !important;
    }
        .offcanvas{
          background: #818f9b !important;
        }
    }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-dark bg-dark">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                    aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <img src="../images/logo22.png" alt="LogoPH" width="60" height="55">
                        <center>     <h5 class="offcanvas-title" id="offcanvasNavbarLabel">PH.SA</h5></center>
                   
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <center>           <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="../Vista/Inicio.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../Vista/FormUsuario.php">Ingresar Usuarios</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../Vista/FormClientes.php">Ingresar Clientes</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../Vista/FormProductos.php">Ingresar Productos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../Vista/Productos.php">Productos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../Vista/CarritoCompras.php">Carrito</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Dropdown
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div></center>
         
        </nav>
    </header>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>