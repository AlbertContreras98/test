<?php
/**
 * Función para crear la tabla usuarios
 * @param object $con
 */
function create_table_user($con)
{
$strSQL = "CREATE TABLE IF NOT EXISTS user (
pk_user INT PRIMARY KEY AUTO_INCREMENT,
use_nombre VARCHAR(255),
use_apellidos VARCHAR (255),
use_fechanac DATE,
use_mail VARCHAR (255),
password VARCHAR(255));";

mysqli_query($con, $strSQL);
}