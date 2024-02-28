<?php
require(BASE_PATH . '/app/config/database_config.php');

class Controller {
    protected $con;

    public function __construct() {
        $this->con = $this->getConnection();
    }

    protected function getConnection() {
        return getConnection();
    }
}
?>