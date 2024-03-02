<?php
include_once(BASE_PATH . '/app/controllers/Controller.php');

/**
 * Clase UserCoontroler
 */
class UserController extends Controller
{
    /**
     * Construcctor
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Función que ejecuta una query para buscar todos los usuarios
     * @return bool|mysqli_result
     */
    public function obtener_usuarios()
    {
        $resultado = mysqli_query($this->db, "select * from user;");
        return $resultado;
    }

    /**
     * Función que devuelve el numero de filas que contienen datos
     * @param mysqli_result $resultado
     * @return integer
     */
    public function obtener_num_filas(mysqli_result $resultado)
    {
        return mysqli_num_rows($resultado);
    }

    /**
     * Función que mediante un resultsql me devuelve un array con los que contiene
     * @param mysqli_result $resultado
     * @return array
     */
    function obtener_resultados(mysqli_result $resultado)
    {
        return mysqli_fetch_array($resultado);
    }
}

//Heredar clase controller
/* CRUD */

//Index

//Create

//Show

//Edit

//Delete