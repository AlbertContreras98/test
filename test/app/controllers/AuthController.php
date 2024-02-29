<?php
require(BASE_PATH . '/app/controllers/Controller.php');

class AuthController extends Controller
{
        public function register() {
            // Aquí va la lógica de registro que tenías antes
            // Por ejemplo:
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Obtener datos del formulario y procesarlos...
            }
        }
    
    // Función que mediante el nombre y el password devuelve el id de usuario
    public function obtener_id($use_nombre, $password)
    {
        $pk_user = 0;
        $use_nombre = mysqli_real_escape_string($this->con, $use_nombre);
        $password = mysqli_real_escape_string($this->con, $password);

        $query = "SELECT pk_user FROM user WHERE use_nombre = '{$use_nombre}' AND password = '{$password}' LIMIT 1";
        $result = mysqli_query($this->con, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $pk_user = $row['pk_user'];
        }
        return $pk_user;
    }

    // Lógica de comprobación si coinciden el usuario y su contraseña
    public function comprobar_usuario($use_nombre, $password)
    {
        $use_nombre = mysqli_real_escape_string($this->con, $use_nombre);
        $password = mysqli_real_escape_string($this->con, $password);

        $query = "SELECT * FROM user WHERE use_nombre = '{$use_nombre}' AND password = '{$password}' LIMIT 1";
        $result = mysqli_query($this->con, $query);

        return $result && mysqli_num_rows($result) > 0;
    }


    //funcion para meter a la base de datos
    public function introducir_nuevo_usuario($use_nombre, $use_apellidos, $use_fechanac, $use_mail, $password)
    {
        $use_nombre = mysqli_real_escape_string($this->con, $use_nombre);
        $use_apellidos = mysqli_real_escape_string($this->con, $use_apellidos);
        $use_fechanac = mysqli_real_escape_string($this->con, $use_fechanac);
        $use_mail = mysqli_real_escape_string($this->con, $use_mail);
        $password = mysqli_real_escape_string($this->con, $password);

        $query = "INSERT INTO user (use_nombre, use_apellidos,use_fechanac,use_mail, password) 
                  VALUES ('{$use_nombre}','{$use_apellidos}','{$use_fechanac}','{$use_mail}','{$password}');";
        $result = mysqli_query($this->con, $query);

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