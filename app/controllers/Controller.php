<?php
include_once(BASE_PATH . "/app/config/database.php");

/**
 * Clase controller
 */
class Controller
{
    protected $db;

    /**
     * Función contructora
     */
    public function __construct()
    {
        $this->db = $this->connectToDatabase();
    }

    /**
     *Función para retornar la clase controller con la conexion a base de datos
     * @return object
     */
    private function connectToDatabase()
    {
        $db = new Database();
        return $db->getConnection();
    }
}
