<?php
// Definir la ruta base del proyecto
define('BASE_PATH', realpath(dirname(__FILE__) . '/..'));


// Configuración de la zona horaria predeterminada (ajusta según tu localización)
date_default_timezone_set('UTC');

// Configuración de errores (ajusta según el entorno de desarrollo o producción)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Autocarga de clases
spl_autoload_register(function ($className) {
    $path = BASE_PATH . '/app/';
    $extension = '.php';
    $fullPath = $path . str_replace('\\', '/', $className) . $extension;

    if (!file_exists($fullPath)) {
        return false;
    }

    include_once $fullPath;
});

// Incluir archivos de configuración adicionales
require_once(BASE_PATH . '/app/config/database_config.php');

// Iniciar sesión
session_start();