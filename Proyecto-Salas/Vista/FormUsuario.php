<?php
$host = "localhost:3307";
$db_name = "sales_system";
$username = "root";
$password = "";
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Usuario</title>
    <link rel="stylesheet" href="../Css/Estilos.css">
    <link rel="icon" type="image/png" href="../images/logo22.png">
</head>
<body>
    <?php include 'Navbar.php'; ?>
    <div class="form-container">
        <center>
            <h2>Formulario de Usuario</h2>
        </center>
        <form action="../Modelo/RegistroUsuario.php" method="POST">
            <div class="form-group">
                <label for="UsuarioID">Usuario ID:</label>
                <input type="text" id="UsuarioID" name="UsuarioID" required>
            </div>
            <div class="form-group">
                <label for="NombreUsuario">Nombre de usuario:</label>
                <input type="text" id="NombreUsuario" name="NombreUsuario" required>
            </div>
            <div class="form-group">
                <label for="Email">Correo electrónico:</label>
                <input type="text" id="Email" name="Email" required>
            </div>
            <div class="form-group">
                <label for="Telefono">Teléfono:</label>
                <input type="text" id="Telefono" name="Telefono" required>
            </div>
            <div class="form-group">
                <label for="TipoUsuarioID">Tipo de usuario:</label>
                <select id="TipoUsuarioID" name="TipoUsuarioID" required>
                    <option value="">Seleccione...</option>
                    <?php
                    include '../Config/config.php';
                    $conn = new mysqli($host, $username, $password, $db_name);
                    if ($conn->connect_error) {
                        die("Conexión fallida: " . $conn->connect_error);
                    }
                    $sql = "SELECT TipoUsuarioID, Nombre FROM tipo_usuario ORDER BY TipoUsuarioID ASC";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['TipoUsuarioID'] . "'>" . $row['Nombre'] . "</option>";
                        }
                    } else {
                        echo "<option value=''>No hay tipo de usuario disponible</option>";
                    }
                    $conn->close();
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="PersonaID">Persona ID:</label>
                <input type="text" id="PersonaID" name="PersonaID" required>
            </div>
            <div class="form-group">
                <button type="submit" class="submit-btn">Guardar</button>
            </div>
        </form>
    </div>
</body>
</html>
