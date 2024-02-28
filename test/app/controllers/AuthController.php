<?php
require(BASE_PATH . '/app/controllers/Controller.php');

class AuthController extends Controller {
    
    // Función que mediante el nombre y el password devuelve el id de usuario
    public function obtener_id($nombre, $password)
    {
        $id = 0;
        $nombre = mysqli_real_escape_string($this->con, $nombre);
        $password = mysqli_real_escape_string($this->con, $password);

        $query = "SELECT id FROM usuarios WHERE nombre = '{$nombre}' AND password = '{$password}' LIMIT 1"; // Asegúrate que la tabla y columna son correctas
        $result = mysqli_query($this->con, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $id = $row['id'];
        }
        return $id;
    }

    // Lógica de comprobación si coinciden el usuario y su contraseña
    public function comprobar_usuario($nombre, $password)
    {
        $nombre = mysqli_real_escape_string($this->con, $nombre);
        $password = mysqli_real_escape_string($this->con, $password);

        $query = "SELECT * FROM usuarios WHERE nombre = '{$nombre}' AND password = '{$password}' LIMIT 1"; // Asegúrate que la tabla y columna son correctas
        $result = mysqli_query($this->con, $query);

        return $result && mysqli_num_rows($result) > 0;
    }
    
    //Añadir botón logout
}
?>