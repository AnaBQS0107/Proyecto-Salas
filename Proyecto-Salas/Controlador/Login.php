<?php
require_once '../Modelo/Login.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['personaID']) && !empty($_POST['password'])) {
        $personaID = $_POST['personaID'];
        $contraseña = $_POST['password'];

        $Login = new UserModel();
        $user = $Login->getUserByPersonaID($personaID);

        if ($user) {
            if ($contraseña === $user['Contraseña']) {
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
