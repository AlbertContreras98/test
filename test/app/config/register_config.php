<?php
require_once('../../routes/route.php');
include(BASE_PATH . '/app/controllers/AuthController.php');

$authController = new AuthController();
//Lógica de autentificación Register
// recuperamos variables del post

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $fecha_nac = $_POST['fecha_nac'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmarPassword = $_POST['confirmarPassword'];

    // creamos un array para errores
    $errores = array();

    // controlamos que el nombre tenga al menos 2 caracteres
    if (strlen($nombre) < 2 || strlen($apellido) < 2) {
        $errores[] = "El nombre y el apellido deben tener al menos 2 caracteres.";
    }

    // Validar longitud de la contraseña
    if (strlen($password) < 6) {
        $errores[] = "La contraseña debe tener al menos 6 caracteres.";
    }

    // Validar coincidencia de contraseñas
    if ($password !== $_POST["confirmarPassword"]) {
        $errores[] = "La confirmación de contraseña debe coincidir con la contraseña ingresada.";
    }

    // Si no hay errores, intentamos registrar al usuario
    if (empty($errores)) {
        if ($authController->introducir_nuevo_usuario($nombre, $apellido, $fecha_nac, $email, $password)) {
            $_SESSION["usuario"] = array(
                "nombre" => $nombre,
                "apellido" => $apellido,
                "fecha_nac" => $fecha_nac,
                "email" => $email,
                "password" => $password
            );
            // Redirigir a la página de inicio
            header('Location: ../views/auth/login.php');
        } else {
            // Manejar el error de inserción
            $errores[] = "Hubo un error al registrar el usuario.";
        }
    } else {
        // Mostrar errores
        $_SESSION['errores'] = $errores;
        header('Location: ' . BASE_PATH);
    }

    exit();
}