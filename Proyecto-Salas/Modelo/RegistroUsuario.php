<?php
$host = "localhost:3307";
$db_name = "sales_system";
$username = "root";
$password = "";

// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar y sanitizar los datos del formulario
    $nombreUsuario = $_POST['NombreUsuario'] ?? null;
    $Email = $_POST['Email'] ?? null;
    $Telefono = $_POST['Telefono'] ?? null;
    $TipoUsuarioID = $_POST['TipoUsuarioID'] ?? null;
    $PersonaID = $_POST['PersonaID'] ?? null;

    // Verificar si todos los campos están completos
    if ($nombreUsuario && $Email && $Telefono && $TipoUsuarioID && $PersonaID) {
        // Crear conexión a la base de datos
        $conn = new mysqli($host, $username, $password, $db_name);
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        // Insertar datos en la base de datos
        $sql = "INSERT INTO usuario (NombreUsuario, Email, Telefono, TipoUsuarioID, PersonaID)
                VALUES ('$nombreUsuario', '$Email', '$Telefono', '$TipoUsuarioID', '$PersonaID')";

        if ($conn->query($sql) === TRUE) {
            header("Location: ../Vista/FormUsuario.php?status=success");
            exit();
        } else {
            header("Location: ../Vista/FormUsuario.php?status=error");
            exit();
        }

        $conn->close();
    } else {
        header("Location: ../Vista/FormUsuario.php?status=error");
        exit();
    }
}
?>
