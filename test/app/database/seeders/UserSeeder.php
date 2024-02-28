<?php

/* Los Seeders son datos de prueba introducidos para que
los desarrolladores puedan entrar como users y como admins */

// Función para insertar un admin y un user
function insert_admin_and_user($con) {
    // Insertar un admin
    $adminSQL = "INSERT INTO user (use_nombre, use_apellidos, use_mail, password) 
                VALUES ('Admin', 'apellido', 'admin@example.com', 123456);";
    mysqli_query($con, $adminSQL);

    // Insertar un user regular
    $userSQL = "INSERT INTO user (use_nombre, use_apellidos, use_mail, password) 
                VALUES ('UserPrueba', 'apellido', 'user@example.com', 123456);";
    mysqli_query($con, $userSQL);
}