<?php
require_once '../Modelo/Login.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handling POST request
    if (!empty($_POST['personaID']) && !empty($_POST['password'])) {
        // Retrieving personaID and password from POST data
        $personaID = $_POST['personaID'];
        $Contrasena = $_POST['password'];

        // Creating UserModel instance and fetching user data
        $Login = new UserModel();
        $user = $Login->getUserByPersonaID($personaID);

        // Validating user credentials
        if ($user) {
            if ($Contrasena === $user['Contrasena']) {
                echo "Inicio de sesión exitoso";  // Successful login message
            } else {
                echo "Contraseña incorrecta";  // Incorrect password message
            }
        } else {
            echo "ID de Persona no encontrado";  // User not found message
        }

        // Closing UserModel instance
        $Login->close();
    } else {
        echo "Por favor complete todos los campos";  // Empty field message
    }
} else {
    echo "Método de solicitud no permitido";  // Invalid request method message
}
?>
