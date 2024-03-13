<?php

require_once(CONTROLLERS_PATH . "/Controller.php");
require_once(MODELS_PATH . "/PortfolioModel.php");

    //Heredar clase controller
class PortfolioController extends Controller {

    //Index

    //create
    public function createPortfolio() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Realizar la validación del formulario
            $errores = $this->validarFormulario($_POST, $_FILES);
            
                if (empty($errores)) {
                    // Si no hay errores, llamar a la función para insertar en la base de datos
                    
                    $portfolioModel = new PortfolioModel();
                    $query = $portfolioModel->introducir_nuevo_portfolio(
                        $_POST['por_nombre'],
                        $_POST['por_apellidos'],
                        $_POST['por_especialidad'],
                        $_POST['por_telefono'],
                        $_POST['por_email'],
                        $_POST['por_github'],
                        $_POST['por_linkedin'],
                        $_POST['por_tik_tok'],
                        $_POST['por_instagram'],
                        $_POST['por_twitter'],
                        $_FILES['por_cv']['name'],
                        $_POST['por_skills'],
                        $_POST['por_sobre_mi']
                    );
                    if ($query) {
                        // Redirigir al usuario o mostrar un mensaje de éxito
                        echo 'Portfolio creado con éxito.';
                    } else {
                        // Manejar el error durante la inserción de datos
                        echo 'Hubo un error al crear el portfolio.';
                    }
            } else {
                // Mostrar errores al usuario
                foreach ($errores as $error) {
                    echo '<p style="color:red;">Error: ' . $error . '</p>';
                }
            }
        }
    }

    // Método privado para validar el formulario
    private function validarFormulario($postData, $fileData) {
        $errores = [];
        // Validación de campos obligatorios
        $nombre = isset($postData['por_nombre']) ? trim($postData['por_nombre']) : null;
        $apellidos = isset($postData['por_apellidos']) ? trim($postData['por_apellidos']) : null;
        $especialidad = isset($postData['por_especialidad']) ? trim($postData['por_especialidad']) : null;
        $telefono = isset($postData['por_telefono']) ? trim($postData['por_telefono']) : null;
        $email = isset($postData['por_email']) ? trim($postData['por_email']) : null;
        $cv = isset($fileData['por_cv']['name']) ? $fileData['por_cv']['name'] : null;
        $skills = isset($postData['por_skills']) ? trim($postData['por_skills']) : null;
        $sobreMi = isset($postData['por_sobre_mi']) ? trim($postData['por_sobre_mi']) : null;

        // Verificar que los campos obligatorios no estén vacíos
        if (!$nombre) $errores[] = 'El nombre es obligatorio.';
        if (!$apellidos) $errores[] = 'Los apellidos son obligatorios.';
        if (!$especialidad) $errores[] = 'La especialidad es obligatoria.';
        if (!$telefono) $errores[] = 'El teléfono es obligatorio.';
        if (!$email) $errores[] = 'El email es obligatorio.';
        if (!$cv) $errores[] = 'El CV es obligatorio.';
        if (!$skills) $errores[] = 'Las habilidades son obligatorias.';
        if (!$sobreMi) $errores[] = 'El campo sobre mí es obligatorio.';

        // Validar formato de teléfono, email y urls si no están vacíos
        if ($telefono && !preg_match('/^\d{9}$/', $telefono)) $errores[] = 'El teléfono no tiene un formato válido.';
        if ($email && !filter_var($email, FILTER_VALIDATE_EMAIL)) $errores[] = 'El email no tiene un formato válido.';
        
        // Validar URLs de redes sociales
        $this->validarUrl($postData['por_github'], 'GitHub', $errores);
        $this->validarUrl($postData['por_linkedin'], 'LinkedIn', $errores);
        $this->validarUrl($postData['por_tik_tok'], 'TikTok', $errores);
        $this->validarUrl($postData['por_instagram'], 'Instagram', $errores);
        $this->validarUrl($postData['por_twitter'], 'Twitter', $errores);
        
        return $errores;
    }

    // Método privado para validar URLs
    private function validarUrl($url, $campo, &$errores) {
        if ($url && !filter_var($url, FILTER_VALIDATE_URL)) {
            $errores[] = "La URL de $campo no tiene un formato válido.";
        }
    }


    //Show

    //Edit

    //Delete
}