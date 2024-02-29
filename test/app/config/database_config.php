<?php
include(BASE_PATH . '/app/database/migrations/create_table_porfolio.php');
include(BASE_PATH . '/app/database/migrations/create_table_user.php');

//Conexión a la BBDD
$host = "localhost";
$username = "root";
$password = "";
$dbname = "proyecto";

//funcion para crear y obtener la variable de conexion
function getConnection()
{
    $con = mysqli_connect($GLOBALS["host"], $GLOBALS["username"], $GLOBALS["password"], $GLOBALS["dbname"]) or die("Error al conectar con la base de datos");
    return $con;
}

function obtener_usuarios($con)
{
    $resultado = mysqli_query($con, "select * from user;");
    return $resultado;
}

function obtener_num_filas($resultado)
{
    return mysqli_num_rows($resultado);

}

// funciones para crear una base de datos y las tablas
function create_bbdd($con)
{
    $strSQL = "create database if not exists proyecto;";
    mysqli_query($con, $strSQL);
    mysqli_select_db($con, "proyecto");
    create_table_user($con);
    create_table_portfolio($con);
    $resultado = obtener_usuarios($con);
    if (!obtener_num_filas($resultado)){
        insert_admin_and_user($con);
    }
    
}