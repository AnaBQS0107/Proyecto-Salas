<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso Clientes -- PH.SA</title>
    <link rel="stylesheet" href="../Css/Estilos.css">
    <link rel="icon" type="image/png" href="../images/llll.png">
</head>

<body>
    <?php include 'Navbar.php'; ?>
    <div class="form-container">
        <br>
        <center>
            <h2>Formulario Clientes</h2>
        </center>
        <form action="../Modelo/RegistroCliente.php" method="POST">
            <div class="form-group">
                <label for="personaID">Cédula:</label>
                <input type="text" id="personaID" name="personaID" required onblur="buscarPersona()">
            </div>
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" id="apellido" name="apellido" required>
            </div>
            <div class="form-group">
                <label for="correo">Correo Electrónico:</label>
                <input type="text" id="correo" name="correo" required>
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="text" id="telefono" name="telefono" required>
            </div>
            <div class="form-group">
                <label for="edad">Edad:</label>
                <input type="text" id="edad" name="edad" required>
            </div>
            <div class="form-group">
                <label for="residencia">Residencia:</label>
                <input type="text" id="residencia" name="residencia" required>
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
            <br> <br>
            <center>
                <input type="submit" value="Registrar cliente" class="btn custom-button">
            </center>
            <style>
            .custom-button {
                background-color: #6c63ff;
                color: white;
            }
            </style>
        </form>
    </div>
    <script>
    function buscarPersona() {
        var cedula = document.getElementById('personaID').value;
        console.log("Cédula ingresada:", cedula); // Debug
        if (cedula) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "../Controlador/BuscarPersona.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    console.log("Respuesta del servidor:", xhr.responseText); // Debug
                    try {
                        var response = JSON.parse(xhr.responseText);
                        document.getElementById('nombre').value = response.Nombre;
                        document.getElementById('apellido').value = response.Apellido;
                    } catch (e) {
                        console.error("Error parsing JSON:", e); // Debug
                    }
                } else {
                    console.log("Estado de la solicitud:", xhr.readyState, "Status:", xhr.status); // Debug
                }
            };
            xhr.onerror = function() {
                console.error("Error de la solicitud AJAX"); // Debug
            };
            xhr.send("cedula=" + encodeURIComponent(cedula));
        }
    }
    </script>
      <?php include 'footer.php'; ?>
</body>

</html>
