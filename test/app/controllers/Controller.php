<?php

class Controller {
    protected $con;

    public function __construct() {
        $this->con = $this->getConnex();
    }

    public function getConnex() {
        return getConnection();
    }
}
?>