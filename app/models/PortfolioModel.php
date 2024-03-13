<?php
require_once(MODELS_PATH . "/Model.php");

/**
 * Hereda de la clase model
 */

class PortfolioModel extends Model {

    /**
     * Constructor
     */

    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * funcion para devolver la tabla portfolio entera
     * @return bool|mysqli_result
     */

    public function obtener_portfolios()
    {
        $resultado = mysqli_query($this->db, "select * from portfolio;");
        return $resultado;
    }

    /**
     * Función para obtener un portfolio pasandole la primary key
     * @param integer
     * @return bool|mysqli_result
     */

    function get_portfolio($pk_portfolio)
    {
        $resultado = mysqli_query($this->db, "select * from portfolio where pk_portfolio = $pk_portfolio;");
        return $resultado;
    }

    /**
     * función para introducir un portfolio
     *
     * @param string $por_nombre
     * @param string $por_apellidos
     * @param string $por_especialidad
     * @param string $por_telefono
     * @param string $por_email
     * @param string $por_github
     * @param string $por_linkedin
     * @param string $por_tik_tok
     * @param string $por_instagram
     * @param string $por_twitter
     * @param string $por_cv
     * @param string $por_skills
     * @param string $por_sobre_mi
     * @return bool
     */

    public function introducir_nuevo_portfolio(string $por_nombre, string $por_apellidos, string $por_especialidad,
     string $por_telefono, string $por_email, string $por_github, string $por_linkedin, string $por_tik_tok,
     string $por_instagram, string $por_twitter, string $por_cv, string $por_skills, string $por_sobre_mi)
    {
        $por_nombre = mysqli_real_escape_string($this->db, $por_nombre);
        $por_apellidos = mysqli_real_escape_string($this->db, $por_apellidos);
        $por_especialidad = mysqli_real_escape_string($this->db, $por_especialidad);
        $por_telefono = mysqli_real_escape_string($this->db, $por_telefono);
        $por_email = mysqli_real_escape_string($this->db, $por_email);
        $por_github = mysqli_real_escape_string($this->db, $por_github);
        $por_linkedin = mysqli_real_escape_string($this->db, $por_linkedin);
        $por_tik_tok = mysqli_real_escape_string($this->db, $por_tik_tok);
        $por_instagram = mysqli_real_escape_string($this->db, $por_instagram);
        $por_twitter = mysqli_real_escape_string($this->db, $por_twitter);
        $por_cv = mysqli_real_escape_string($this->db, $por_cv);
        $por_skills = mysqli_real_escape_string($this->db, $por_skills);
        $por_sobre_mi = mysqli_real_escape_string($this->db, $por_sobre_mi);


        $query = "INSERT INTO portfolio (por_nombre, por_apellidos, por_especialidad, por_telefono, por_email, por_github,
                             por_linkedin, por_tik_tok, por_instagram, por_twitter, por_cv, por_skills, por_sobre_mi)

                    VALUES ('{$por_nombre}','{$por_apellidos}','{$por_especialidad}','{$por_telefono}','{$por_email}',
                          '{$por_github}','{$por_linkedin}','{$por_tik_tok}','{$por_instagram}','{$por_twitter}',
                          '{$por_cv}','{$por_skills}','{$por_sobre_mi}');";

        $result = mysqli_query($this->db, $query);

        return $result;
    }

    /**
     * Función para modificar un portfolio
     *
     * @param int    $pk_portfolio
     * @param string $por_nombre
     * @param string $por_apellidos
     * @param string $por_especialidad
     * @param string $por_telefono
     * @param string $por_email
     * @param string $por_github
     * @param string $por_linkedin
     * @param string $por_tik_tok
     * @param string $por_instagram
     * @param string $por_twitter
     * @param string $por_cv
     * @param string $por_skills
     * @param string $por_sobre_mi
     * @return bool
     */
    function modificar_portfolio(int $pk_portfolio, string $por_nombre, string $por_apellidos, string $por_especialidad,
    string $por_telefono, string $por_email, string $por_github, string $por_linkedin, string $por_tik_tok,
    string $por_instagram, string $por_twitter, string $por_cv, string $por_skills, string $por_sobre_mi)
    {
        $query = "UPDATE portfolio set por_nombre ='$por_nombre', por_apellidos = '$por_apellidos',
                 por_especialidad ='$por_especialidad', por_telefono = '$por_telefono', por_email = $por_email',
                 por_git_hub ='$por_github ,por_linkedin ='$por_linkedin', por_tik_tok='$por_tik_tok',
                 por_instagram='$$por_instagram', por_twitter ='$por_twitter', por_cv ='$por_cv',
                 por_skills ='$por_skills', por_sobre_mi ='$por_sobre_mi' where pk_portfolio = $pk_portfolio;";

        $result =mysqli_query($this->db, $query);

        return $result;
    }

    /**
     * función para borrar un portfolio
     *
     * @param  int $pk_portfolio
     * @return bool
     */
    function eliminar_portfolio(int $pk_portfolio)
    {
        $consulta = "DELETE FROM portfolio WHERE pk_portfolio = $pk_portfolio;";

        $result = mysqli_query($this->db, $consulta);

        return $result;

    }

}