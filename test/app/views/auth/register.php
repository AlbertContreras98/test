<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../../../public/assets/css/style.css">
    <title>Formulario de Registro</title>
</head>

<body>

    <form action="/auth/register" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" required>

        <label for="email">Correo electrónico:</label>
        <input type="email" id="email" name="email" required>

        <label for="edad">Edad:</label>
        <input type="date" id="fecha_nac" name="fecha_nac" required>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>

        <label for="confirmarPassword">Confirmar contraseña:</label>
        <input type="password" id="confirmarPassword" name="confirmarPassword" required>

        <input type="submit" value="Crear">

        <!-- De momento no lo ponemos porqué las rutas no funcionan bien del todo aún -->
        <!-- <button type="submit"><a href="login.php">Iniciar Sesión</a></button> -->
    </form>