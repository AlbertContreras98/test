<?php
session_start();

/**
 * Define la ruta del directorio base del proyecto
 */
define('BASE_PATH', realpath(dirname(__FILE__) . '/..'));

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