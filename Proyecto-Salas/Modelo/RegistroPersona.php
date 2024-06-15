<?php
include_once '../Config/config.php'
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $fechaNacimiento = $_POST['fecha_nacimiento'];
    $genero = $_POST['genero'];
    $estadoCivil = $_POST['estado_civil'];
    $estadoPersona = $_POST['estado_persona'];

    $sql = "INSERT INTO persona (Nombre, Apellido, FechaNacimiento, GeneroID, EstadoCivilID, EstadoPersonaID)
            VALUES ('$nombre', '$apellido', '$fechaNacimiento', '$genero', '$estadoCivil', '$estadoPersona')";

    if ($conn->query($sql) === TRUE) {
        echo "Datos insertados correctamente.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>