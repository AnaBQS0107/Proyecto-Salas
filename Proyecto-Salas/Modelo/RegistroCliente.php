<?php
// Include database connection

$host = "localhost:3307";
$db_name = "sales_system";
$username = "root";
$password = "";

$conn = new mysqli($host, $username, $password, $db_name);

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form data
    $Cedula = $_POST['personaID'] ?? null;
    $Nombre = $_POST['nombre'] ?? null;
    $Apellido = $_POST['apellido'] ?? null;
    $Correo = $_POST['correo'] ?? null;
    $Teléfono = $_POST['telefono'] ?? null;
    $Edad = $_POST['edad'] ?? null;
    $Residencia = $_POST['residencia'] ?? null;
    $Genero = $_POST['genero'] ?? null;

    // Check if all fields are set
    if ($Cedula && $Nombre && $Apellido && $Correo && $Teléfono && $Edad && $Residencia && $Genero) {
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO cliente (Cedula, Nombre, Apellido, Correo, Teléfono, Edad, Residencia, Genero) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $Cedula, $Nombre, $Apellido, $Correo, $Teléfono, $Edad, $Residencia, $Genero);

        if ($stmt->execute()) {
            echo "Registro guardado exitosamente";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    } else {
        echo "Por favor complete todos los campos.";
    }
}
?>
