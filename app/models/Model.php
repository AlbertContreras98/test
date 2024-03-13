<?php
require_once("../../routes/route.php");
require_once(CONFIG_PATH . "/database.php");

/**
 * Clase Model
 */
class Model
{
    protected $db;

    /**
     * Función constructora
     */
    public function __construct()
    {
        $this->db = $this->connectToDatabase();
    }

    /**
     * Función para conectar a la base de datos
     * @return object
     */
    protected function connectToDatabase()
    {
        $db = new Database();
        return $db->getConnection();
    }
    
    /**
     * Función que devuelve el número de filas que contienen datos
     * @param mysqli_result $resultado
     * @return integer
     */
    protected function obtener_num_filas(mysqli_result $resultado)
    {
        return mysqli_num_rows($resultado);
    }

    /**
     * Función que mediante un resultsql devuelve un array con los datos que contiene
     * @param mysqli_result $resultado
     * @return array
     */
    protected function obtener_resultados(mysqli_result $resultado)
    {
        return mysqli_fetch_array($resultado);
    }
}