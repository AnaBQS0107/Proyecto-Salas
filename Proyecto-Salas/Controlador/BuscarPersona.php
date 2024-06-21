<?php
$host = "localhost:3307";  
$db_name = "sales_system"; 
$username = "root";       
$password = "";            

$conn = new mysqli($host, $username, $password, $db_name);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if (isset($_POST['cedula'])) {
    $cedula = $_POST['cedula'];
    // Suposición: el nombre de la columna es 'personaID' en lugar de 'Cedula'
    $sql = "SELECT Nombre, Apellido FROM Persona WHERE personaID = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Error en la preparación: " . $conn->error);
    }
    $stmt->bind_param("s", $cedula);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode($row);
    } else {
        echo json_encode(["Nombre" => "", "Apellido" => ""]);
    }

    $stmt->close();
}
$conn->close();
?>
