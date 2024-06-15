<?php
// Verificar si se han enviado datos por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $personaID = $_POST['personaID']; // Capturar la cédula desde el formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $genero = $_POST['genero'];
    $estado_civil = $_POST['estado_civil'];
    $estado_persona = $_POST['estado_persona'];

    // Configuración de la conexión a la base de datos
    $host = "localhost:3307";  // Puerto de MySQL (ajustar según tu configuración)
    $db_name = "sales_system"; // Nombre de la base de datos
    $username = "root";        // Usuario de MySQL
    $password = "";            // Contraseña de MySQL (dejar en blanco si no tiene)

    // Crear conexión
    $conn = new mysqli($host, $username, $password, $db_name);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Preparar la consulta SQL para insertar en la tabla persona
    $sql = "INSERT INTO persona (PersonaID, Nombre, Apellido, FechaNacimiento, GeneroID, EstadoCivilID, EstadoPersonaID)
            VALUES ('$personaID', '$nombre', '$apellido', '$fecha_nacimiento', '$genero', '$estado_civil', '$estado_persona')";

    // Ejecutar la consulta
    if ($conn->query($sql) === TRUE) {
        echo "Registro de persona exitoso";
    } else {
        echo "Error al registrar persona: " . $conn->error;
    }

    // Cerrar conexión
    $conn->close();
} else {
    // Si no se han recibido datos por POST, redireccionar o mostrar un mensaje de error
    echo "No se han recibido datos del formulario";
}
?>
