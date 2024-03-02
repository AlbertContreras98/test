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
<!-- 
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>

<body>
    <style>
    </style>
    <section class="bg-light p-3 p-md-4 p-xl-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-xxl-11">
                    <div class="card border-light-subtle shadow-sm">
                        <div class="row g-0">
                            <div class="col-12 col-md-6">
                                <img class="img-fluid rounded-start w-100 h-100 object-fit-cover" loading="lazy"
                                    src="../../../public/assets/img/register.jpg" alt="">
                            </div>
                            <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
                                <div class="col-12 col-lg-11 col-xl-10">
                                    <div class="card-body p-3 p-md-4 p-xl-5">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="mb-5">
                                                    <div class="text-center mb-4">
                                                        <a href="#!">
                                                            <img class="img-fluid"
                                                                src="../../../public/assets/img/logo.png" alt="Logo"
                                                                width="330">
                                                        </a>
                                                    </div>
                                                    <h2 class="h4 text-center text-secondary">Registro de usuario</h2>
                                                </div>
                                            </div>
                                        </div>
                                       
                                        <form action="../app/config/login_config.php" method="post">
                                            <div class=" row gy-3 overflow-hidden">
                                                <div class="col-12">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" name="nombre"
                                                            id="nombre" placeholder="Nombre" required>
                                                        <label for="nombre" class="form-label">Nombre</label>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" name="apellido"
                                                            id="apellido" placeholder="Apellido" required>
                                                        <label for="apellido" class="form-label">Apellido</label>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-floating mb-3">
                                                        <input type="email" class="form-control" name="email" id="email"
                                                            placeholder="name@example.com" required>
                                                        <label for="email" class="form-label">Correo</label>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-floating mb-3">
                                                        <input type="date" class="form-control" name="fecha_nac"
                                                            id="fecha_nac" placeholder="12/02/2024" required>
                                                        <label for="date" class="form-label">Fecha de nacimiento</label>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-floating mb-3">
                                                        <input type="password" class="form-control" name="password"
                                                            id="password" value="" placeholder="password" required>
                                                        <label for="password" class="form-label">Contraseña</label>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-floating mb-3">
                                                        <input type="password" class="form-control"
                                                            name="confirmarPassword" id="confirmarPassword" value=""
                                                            placeholder="Confirmar contraseña" required>
                                                        <label for="confirmarPassword" class="form-label">Confirmar
                                                            contraseña</label>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="d-grid">
                                                        <button class="btn btn-dark btn-lg"
                                                            type="submit">Registrarse</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="row">
                                            <div class="col-12">
                                                <p class="mb-0 mt-5 text-secondary text-center">Ya tienes una cuenta? <a
                                                        href="../app/views/auth/register.php"
                                                        class="link-primary text-decoration-none">log
                                                        in</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html> -->