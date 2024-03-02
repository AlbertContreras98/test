<?php
require_once('../../routes/route.php');
include(BASE_PATH . '/app/controllers/AuthController.php');

$authController = new AuthController();

//Validación formulario login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $password = $_POST['password'];

    // controlamos que el nombre tenga al menos 2 caracteres
    if (strlen($nombre) < 2) {
        
        echo '<span style="color: red;">El nombre tiene que tener al menos 2 caracteres</span>.</p>';
        header('Refresh: 2; URL=../../public/index.php');
        exit();
    }

    // Validar longitud de la contraseña
    if (strlen($password) < 6) {

        echo '<span style="color: red;">La contraseña tiene que tener al menos 6 caracteres</span>.</p>';
        header('Refresh: 2; URL=../../public/index.php');
        exit();
    }

    //Autentificación
    // pasados los primeros controles comprobamos que el user y el pass coinciden con BBDD
    if ($authController->comprobar_usuario($nombre, $password)) {

        $id = $authController->obtener_id($nombre, $password);

        $_SESSION["usuario"] = array(
            "id" => $id,
            "nombre" => $nombre,
        );

        // redirigimos a la vista del admin o al perfil de usuario según el nombre
        if ($id == 1) {
            header('Location: ../views/user/index.php');

        } else {
            header('Location: ../views/portfolio/index.php/' . $id);
        }

        exit();

    } else {
        echo '<span style="color: red;">El usuario y la contraseña no coinciden</span>.</p>';
        header('Refresh: 2; URL=../../public/index.php');
    }
}
