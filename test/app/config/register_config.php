<?php

session_start();
//Authentication del registro

//Lógica de autentificación Register
// recuperamos variables del post

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener datos del formulario
    $nombre = $_POST['nombre'];
    $password = $_POST['password'];


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

    // faltaria hacer la comprobacion con la base de datos de que el usuario y la pass es correcta



    
    // Si no hay errores, almacenamos datos en la variable de sesión y redirigimos
    // Si el usuario es el admin redirigimos a la vista de control de usuarios
    //  si el usuario es un cliente redirimos a la pagina de su perfil de usuario
    if (empty($errores)) {
        $_SESSION["usuario"] = array(
            "nombre" => $nombre,
        );

    } else {
        // redirigimos a la pagina de incio y mandamos el log del error con un echo o un alert

    }

    exit();
}