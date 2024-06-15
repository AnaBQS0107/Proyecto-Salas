<?php
require_once '../Modelo/Login.php'; // Asegúrate de que la ruta a Login.php sea correcta

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['personaID']) && isset($_POST['password'])) {
        $personaID = $_POST['personaID'];
        $contraseña = $_POST['password'];

        $Login = new UserModel(); // Asegúrate de que UserModel esté definido correctamente
        $user = $Login->getUserByPersonaID($personaID);

        if ($user) {
            if (password_verify($contraseña, $user['Contraseña'])) {
                echo "Inicio de sesión exitoso";
            } else {
                echo "Contraseña incorrecta";
            }
        } else {
            echo "ID de Persona no encontrado";
        }

        $Login->close();
    } else {
        echo "Por favor complete todos los campos";
    }
} else {
    echo "Método de solicitud no permitido";
}
?>