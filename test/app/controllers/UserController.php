<?php

class UserController extends Controller{
    // Método para mostrar la lista de usuarios
    public function index() {
        // Aquí iría la lógica para obtener los usuarios y mostrarlos
        echo "Mostrando la lista de usuarios";
        // Por ejemplo, cargar una vista: include 'views/user/index.php';
    }

    // Método para mostrar el formulario de creación de usuario
    public function create() {
        echo "Formulario para crear un nuevo usuario";
        // Cargar una vista: include 'views/user/create.php';
    }

    // Método para mostrar un usuario específico
    public function show($id) {
        echo "Mostrando el usuario con ID: $id";
        // Lógica para obtener el usuario por $id y mostrarlo
        // Cargar una vista: include 'views/user/show.php';
    }

    // Método para mostrar el formulario de edición de usuario
    public function edit($id) {
        echo "Formulario para editar el usuario con ID: $id";
        // Lógica para obtener el usuario por $id para editar
        // Cargar una vista: include 'views/user/edit.php';
    }

    // Método para eliminar un usuario
    public function delete($id) {
        echo "Eliminando el usuario con ID: $id";
        // Lógica para eliminar el usuario por $id
    }
}