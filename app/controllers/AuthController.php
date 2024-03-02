<?php
include_once(BASE_PATH . '/app/controllers/Controller.php');

/**
 * Extendemos de la clase padre controller
 */
class AuthController extends Controller
{
    /**
     * Función constructora
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Funcion para obtener usuarios
     * @return mysqli_result
     */
    public function obtener_usuarios()
    {
        $resultado = mysqli_query($this->db, "select * from user;");
        return $resultado;
    }

    /**
     * Función que mediante el nombre y el password devuelve el id de usuario
     *
     * @param string $use_nombre
     * @param string $password
     * @return int
     */
    public function obtener_id(string $use_nombre, string $password): int
    {
        $pk_user = 0;
        $use_nombre = mysqli_real_escape_string($this->db, $use_nombre);
        $password = mysqli_real_escape_string($this->db, $password);

        $query = "SELECT pk_user FROM user WHERE use_nombre = '{$use_nombre}' AND password = '{$password}' LIMIT 1";
        $result = mysqli_query($this->db, $query);

        if ($result && mysqli_num_rows($result) > 0) {

            $row = mysqli_fetch_assoc($result);
            $pk_user = $row['pk_user'];
        }
        return $pk_user;
    }

    /**
     * comprobación si coinciden el usuario y su contraseña
     *
     * @param string $use_nombre
     * @param string $password
     * @return int
     */
    public function comprobar_usuario(string $use_nombre, string $password): int
    {
        $use_nombre = mysqli_real_escape_string($this->db, $use_nombre);
        $password = mysqli_real_escape_string($this->db, $password);

        $query = "SELECT * FROM user WHERE use_nombre = '{$use_nombre}' AND password = '{$password}' LIMIT 1";
        $result = mysqli_query($this->db, $query);

        return $result && mysqli_num_rows($result) > 0;
    }

    /**
     * función para meter a la base de datos un nuevo usuario
     *
     * @param string $use_nombre
     * @param string $use_apellidos
     * @param string $use_fechanac
     * @param string $use_mail
     * @param string $password
     * @return bool
     */
    public function introducir_nuevo_usuario(string $use_nombre, string $use_apellidos, $use_fechanac, string $use_mail, string $password)
    {
        $use_nombre = mysqli_real_escape_string($this->db, $use_nombre);
        $use_apellidos = mysqli_real_escape_string($this->db, $use_apellidos);
        $use_fechanac = mysqli_real_escape_string($this->db, $use_fechanac);
        $use_mail = mysqli_real_escape_string($this->db, $use_mail);
        $password = mysqli_real_escape_string($this->db, $password);

        $query = "INSERT INTO user (use_nombre, use_apellidos,use_fechanac,use_mail, password) 
                  VALUES ('{$use_nombre}','{$use_apellidos}','{$use_fechanac}','{$use_mail}','{$password}');";
        $result = mysqli_query($this->db, $query);

        return $result;
    }

    //funcion del logout
    public function logout()
    {
        session_destroy();
        echo "Deslogueando, sera redirigido al login";
        header('Refresh: 2; URL=../../public/index.php');
    }

}