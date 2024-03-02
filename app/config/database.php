<?php
class Database
{

    // Variables de conexión
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "proyecto";
    private $con;

    /**
     * Función contructora
     */
    public function __construct()
    {
        $this->connect();
    }

    /**
     * Función para conectar a la base de datos y usar la database
     */
    private function connect()
    {
        $this->con = mysqli_connect($this->host, $this->username, $this->password) or die("Error al conectar con la base de datos: " . mysqli_error($this->con));
        $this->createDatabase();
        mysqli_select_db($this->con, $this->dbname);
    }

    public function getConnection()
    {
        return $this->con;
    }

    /**
     * función para crear la database
     */
    private function createDatabase()
    {
        $strSQL = "CREATE DATABASE IF NOT EXISTS {$this->dbname};";
        mysqli_query($this->con, $strSQL) or die("Error al crear la base de datos: " . mysqli_error($this->con));
    }

    /**
     * Función para llamar a la creacion de tablas y de usuarios semilla
     */
    public function createTables()
    {
        $this->createTableUser();
        $this->createTablePortfolio();
        $this->insertAdminAndUser();
    }

    /**
     * Función para crear la tabla usuario con los usuarios semilla
     */
    private function createTableUser()
    {
        create_table_user($this->con);
    }

    /**
     * Función de clase para crear la tabla portfolio
     */
    private function createTablePortfolio()
    {
        create_table_portfolio($this->con);
    }

    /**
     * Lógica para insertar administrador y usuario si no existen
     */
    private function insertAdminAndUser()
    {
        insert_admin_and_user($this->con);
    }

    /**
     * Funcion para cerrar la conexión
     */
    public function closeConnection()
    {
        mysqli_close($this->con);
    }
}
/**
 * Creamos el objeto de conexión
 */


