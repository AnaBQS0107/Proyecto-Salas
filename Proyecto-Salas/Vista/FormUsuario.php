<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Persona</title>
    <link rel="stylesheet" href="../Css/Estilos.css">
</head>

<body>
    <?php include 'Navbar.php'; ?>
    <div class="form-container">
        <center>
            <h2>Formulario de Persona</h2>
        </center>
        <form action="../Modelo/RegistroPersona.php" method="POST">
            <div class="form-group">
                <label for="personaID">Cédula:</label>
                <input type="text" id="personaID" name="personaID" required>
            </div>
            <div class="form-group">
                <label for="NombreUsuario">Nombre de usuario:</label>
                <input type="text" id="NombreUsuario" name="NombreUsuario" required>
            </div>
            <div class="form-group">
                <label for="email">Correo electrónico:</label>
                <input type="text" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="Telefono">Telefono:</label>
                <input id="Telefono" name="Telefono" required>
            </div>
            <div class="form-group">
                <label for="TipoUsuarioID">Tipo de usuario:</label>
                <select id="TipoUsuarioID" name="TipoUsuarioID" required>
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
                    $sql = "SELECT TipoUsuarioID, Nombre FROM tipo_usuario ORDER BY TipoUsuarioID ASC";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['TipoUsuarioID'] . "'>" . $row['Nombre'] . "</option>";
                        }
                    } else {
                        echo "<option value=''>No hay estado de persona disponible</option>";
                    }

                    $conn->close();
                    ?>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="submit-btn">Guardar</button>
            </div>
        </form>
    </div>

    <?php
    // Función para obtener opciones de un campo de una tabla en la base de datos
    function getOptionsFromDB($tableName, $idField, $nameField)
    {
        $host = "localhost:3307";
        $db_name = "sales_system";
        $username = "root";
        $password = "";

        // Crear conexión
        $conn = new mysqli($host, $username, $password, $db_name);
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        // Consulta para obtener opciones
        $sql = "SELECT $idField, $nameField FROM $tableName ORDER BY $idField ASC";
        $result = $conn->query($sql);

        // Construir opciones para el select
        if ($result->num_rows > 0) {
            $options = "";
            while ($row = $result->fetch_assoc()) {
                $options .= "<option value='" . $row[$idField] . "'>" . $row[$nameField] . "</option>";
            }
        } else {
            $options = "<option value=''>No hay opciones disponibles</option>";
        }

        $conn->close();
        return $options;
    }
    ?>

</body>

</html>
