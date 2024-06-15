<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Persona</title>
    <link rel="stylesheet" href="../Css/Estilos.css">
</head>

<body>
    <div class="form-container">
        <center>
            <h2>Formulario de Persona</h2>
        </center>
        <form action="procesar.php" method="POST">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" id="apellido" name="apellido" required>
            </div>
            <div class="form-group">
                <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required>
            </div>
            <div class="form-group">
                <label for="genero">Género:</label>
                <select id="genero" name="genero" required>
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
                    $sql = "SELECT GeneroID, Nombre FROM genero ORDER BY GeneroID ASC";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['GeneroID'] . "'>" . $row['Nombre'] . "</option>";
                        }
                    } else {
                        echo "<option value=''>No hay géneros disponibles</option>";
                    }

                    $conn->close();
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="estado_civil">Estado Civil:</label>
                <select id="estado_civil" name="estado_civil" required>
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
                    $sql = "SELECT EstadoCivilID, Nombre FROM estado_civil ORDER BY EstadoCivilID ASC";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['EstadoCivilID'] . "'>" . $row['Nombre'] . "</option>";
                        }
                    } else {
                        echo "<option value=''>No hay estados civiles disponibles</option>";
                    }

                    $conn->close();
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="estado_persona">Estado de Persona:</label>
                <select id="estado_persona" name="estado_persona" required>
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
                    $sql = "SELECT EstadoPersonaID, Nombre FROM estado_persona ORDER BY EstadoPersonaID ASC";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['EstadoPersonaID'] . "'>" . $row['Nombre'] . "</option>";
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
</body>

</html>