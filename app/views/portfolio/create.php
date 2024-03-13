<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Incluir Bootstrap: -->
    <!-- <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css"> -->
    <title>Formulario de Registro</title>
    <style>
    .required::after {
        content: " *";
        color: red;
    }
    </style>
</head>

<body>
    <form action="../../controllers/Controller.php" method="post">
        <label for="nombre" class="required">Nombre:</label>
        <input type="text" id="nombre" name="por_nombre" required><br><br>

        <label for="apellidos" class="required">Apellidos:</label>
        <input type="text" id="apellidos" name="por_apellidos" required><br><br>

        <label for="especialidad" class="required">Especialidad:</label>
        <input type="text" id="especialidad" name="por_especialidad" required><br><br>

        <label for="telefono" class="required">Teléfono:</label>
        <input type="tel" id="telefono" name="por_telefono" required><br><br>

        <label for="email" class="required">Email:</label>
        <input type="email" id="email" name="por_email" required><br><br>

        <!-- Los siguientes campos no tienen el asterisco porque no son marcados como obligatorios en la imagen -->
        <label for="github">GitHub:</label>
        <input type="url" id="github" name="por_github"><br><br>

        <label for="linkedin">LinkedIn:</label>
        <input type="url" id="linkedin" name="por_linkedin"><br><br>

        <label for="tiktok">TikTok:</label>
        <input type="url" id="tiktok" name="por_tik_tok"><br><br>

        <label for="instagram">Instagram:</label>
        <input type="url" id="instagram" name="por_instagram"><br><br>

        <label for="twitter">Twitter:</label>
        <input type="url" id="twitter" name="por_twitter"><br><br>

        <label for="cv" class="required">CV (subir archivo):</label>
        <input type="file" id="cv" name="por_cv" required><br><br>

        <label for="skills" class="required">Habilidades:</label>
        <textarea id="skills" name="por_skills" required></textarea><br><br>

        <label for="sobre_mi" class="required">Sobre mí:</label>
        <textarea id="sobre_mi" name="por_sobre_mi" required></textarea><br><br>

        <input type="submit" value="Enviar">
    </form>
</body>

</html>