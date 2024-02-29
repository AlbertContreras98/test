<?php

class HomeController extends Controller{
    public function index() {
        echo "Bienvenido a la página de inicio";
        include 'views/home/index.php';
    }
}