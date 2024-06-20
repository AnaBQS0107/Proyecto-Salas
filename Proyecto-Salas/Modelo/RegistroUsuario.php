<?php
// Include database connection

$host = "localhost:3307";
$db_name = "sales_system";
$username = "root";
$password = "";



// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form data
    $UsuarioID = $_POST['UsuarioID'] ?? null;
    $nombreUsuario = $_POST['NombreUsuario'] ?? null;
    $Email = $_POST['Email'] ?? null;
    $Telefono = $_POST['Telefono'] ?? null;
    $TipoUsuarioID = $_POST['TipoUsuarioID'] ?? null;
    $PersonaID = $_POST['PersonaID'] ?? null;

    // Check if all fields are set
    if ($UsuarioID && $nombreUsuario && $Email && $Telefono && $TipoUsuarioID && $PersonaID) {
        // Create database connection
        $conn = new mysqli($host, $username, $password, $db_name);
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        // Insert data into database
        $sql = "INSERT INTO usuario (UsuarioID, NombreUsuario, Email, Telefono, TipoUsuarioID, PersonaID)
                VALUES ('$UsuarioID', '$nombreUsuario', '$Email', '$Telefono', '$TipoUsuarioID', '$PersonaID')";

        if ($conn->query($sql) === TRUE) {
            echo "Registro guardado exitosamente";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    } else {
        echo "Por favor complete todos los campos.";
    }
}
?>
