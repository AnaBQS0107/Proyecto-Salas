<?php
$host = "localhost:3307";
$db_name = "sales_system";
$username = "root";
$password = "";

$conn = new mysqli($host, $username, $password, $db_name);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Cedula = $_POST['personaID'] ?? null;
    $Nombre = $_POST['nombre'] ?? null;
    $Apellido = $_POST['apellido'] ?? null;
    $Correo = $_POST['correo'] ?? null;
    $Teléfono = $_POST['telefono'] ?? null;
    $Edad = $_POST['edad'] ?? null;
    $Residencia = $_POST['residencia'] ?? null;
    $Genero = $_POST['genero'] ?? null;

    if ($Cedula && $Nombre && $Apellido && $Correo && $Teléfono && $Edad && $Residencia && $Genero) {
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        try {
            $stmt = $conn->prepare("INSERT INTO cliente (Cedula, Nombre, Apellido, Correo, Teléfono, Edad, Residencia, Genero) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssssss", $Cedula, $Nombre, $Apellido, $Correo, $Teléfono, $Edad, $Residencia, $Genero);

            if ($stmt->execute()) {
                header("Location: ../Vista/FormClientes.php?success=" . urlencode("Registro guardado exitosamente"));
                exit();
            } else {
                throw new Exception("Error al ejecutar la consulta: " . $stmt->error);
            }

            $stmt->close();
            $conn->close();
        } catch (mysqli_sql_exception $e) {
            header("Location: ../Vista/FormClientes.php?error=" . urlencode("Error en la base de datos: " . $e->getMessage()));
            exit();
        } catch (Exception $e) {
            header("Location: ../Vista/FormClientes.php?error=" . urlencode("Error: " . $e->getMessage()));
            exit();
        }
    } else {
        header("Location: ../Vista/FormClientes.php?error=" . urlencode("Por favor complete todos los campos."));
        exit();
    }
}
?>
