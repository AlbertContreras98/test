<?php
/**
 * función para crear usuarios semilla
 * @param object $con
 */
function insert_admin_and_user($con)
{

    // Obtenemos las filas de la base de datos
    $resultado = mysqli_query($con, "select * from user;");
    $resultado = mysqli_num_rows($resultado);

    // Si obtenemos resultados no entramos al if
    if ($resultado == 0) {
        // Insertar un admin
        $adminSQL = "INSERT INTO user (use_nombre, use_apellidos,use_fechanac, use_mail, password) 
                VALUES ('Admin', 'apellido', '2000-01-01','admin@example.com', 321321);";
        mysqli_query($con, $adminSQL);

        // Insertar un user regular
        $userSQL = "INSERT INTO user (use_nombre, use_apellidos, use_fechanac, use_mail, password) 
                VALUES ('UserPrueba', 'apellido', '2000-01-01','user@example.com', 321321);";
        mysqli_query($con, $userSQL);
    }
}