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

$request = trim($_SERVER['REQUEST_URI'], '/');
$request = explode('/', $request);

// Aquí puedes definir tus rutas
switch ($request[0]) {
    case '':
        // Página de inicio
        require __DIR__ . '/../app/controllers/HomeController.php';
        $controller = new HomeController();
        $controller->index();
        break;
    case 'auth':
        require __DIR__ . '/../app/controllers/AuthController.php';
        $authController = new AuthController();
        if (isset($request[1]) && $request[1] === 'register' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $authController->register();
        }
        break;
    case 'user':
        require __DIR__ . '/../app/controllers/UserController.php';
        $controller = new UserController();
        if (!isset($request[1])) {
            // Acción por defecto para /user
            $controller->index();
        } else {
            switch ($request[1]) {
                case 'create':
                    // Página de creación de usuario
                    $controller->create();
                    break;
                case 'show':
                    // Mostrar un usuario específico, $request[2] debería contener el ID del usuario
                    if (isset($request[2])) {
                        $controller->show($request[2]);
                    } else {
                        echo "ID de usuario no especificado.";
                    }
                    break;
                case 'edit':
                    // Editar un usuario específico, $request[2] debería contener el ID del usuario
                    if (isset($request[2])) {
                        $controller->edit($request[2]);
                    } else {
                        echo "ID de usuario no especificado.";
                    }
                    break;
                case 'delete':
                    // Eliminar un usuario específico, $request[2] debería contener el ID del usuario
                    if (isset($request[2])) {
                        $controller->delete($request[2]);
                    } else {
                        echo "ID de usuario no especificado.";
                    }
                    break;
                default:
                    // Página no encontrada
                    http_response_code(404);
                    echo "404 Not Found";
                    break;
            }
        }
        break;
    // Agrega más casos según tus rutas
    default:
        // Página no encontrada
        http_response_code(404);
        echo "404 Not Found";
        break;
}

// Iniciar sesión
session_start();