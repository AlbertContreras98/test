<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../public/assets/css/style.css">
    <title>Formulario de Login</title>
</head>

<body id="fondo_login">

    <form action="../app/config/login_config.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>

        <label for="confirmarPassword">Confirmar contraseña:</label>
        <input type="password" id="confirmarPassword" name="confirmarPassword" required>

        <input type="submit" value="Acceder">

        <button type="submit"><a href="../app/views/auth/register.php">Resgitrate
                aquí</a></button>

    </form>

    <!-- boton para acceder al registro si no tenemos user -->