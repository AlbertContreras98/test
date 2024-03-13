<?php
/**
 * Define la ruta del directorio base del proyecto
 */
define('BASE_PATH', realpath(dirname(__FILE__) . '/..'));

// Define constantes para las rutas específicas dentro del proyecto
define('CONFIG_PATH', BASE_PATH . '/app/config');
define('CONTROLLERS_PATH', BASE_PATH . '/app/controllers');
define('DATABASE_PATH', BASE_PATH . '/app/database');
define('MODELS_PATH', BASE_PATH . '/app/models');
define('VIEWS_PATH', BASE_PATH . '/app/views');

/**
 * Define la hora
 */
date_default_timezone_set('UTC');

/**
 * Configuración de errores (ajusta según el entorno de desarrollo o producción)
 */
ini_set('display_errors', 1);
error_reporting(E_ALL);

/**
 * Autocarga de clases
 */
spl_autoload_register(function ($className) {
    $path = BASE_PATH . '/app/';
    $extension = '.php';
    $fullPath = $path . str_replace('\\', '/', $className) . $extension;

    if (!file_exists($fullPath)) {
        return false;
    }
    include_once $fullPath;
});