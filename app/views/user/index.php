<?php

require_once("../../../routes/route.php");
require_once(BASE_PATH . '/app/controllers/UserController.php');

$userController = new UserController;
$usuarios = $userController->obtener_usuarios();

echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">';

echo "<div class='container'>

<p class='text-center fs-1 mb-5 mt-3'>Gestion de usuarios.</p>";

if ($userController->obtener_num_filas($usuarios) == 0) {
  echo "<p>No se encuentran usuarios</p>";
} else {
  echo "
    <form method ='post' action ='borrarUsuarios.php'>
    <table class='table'>
    <thead>
      <tr>
        <th scope='col'>Id</th>
        <th scope='col'>Nombre</th>
        <th scope='col'>Apellido</th>
        <th scope='col'>Fecha nacimiento</th>
        <th scope='col'>Mail</th>
        <th scope='col'>Password</th>
        <th scope='col' class='text-center'>Seleccion</th>
        <th scope='col'>Editar</th>
      </tr>
    </thead>
    <tbody>";

  while ($fila = $userController->obtener_resultados($usuarios)) {
    extract($fila);
    echo "<tr>
        <td>$pk_user</td>
        <td>$use_nombre</td>
        <td>$use_apellidos</td>
        <td>$use_fechanac</td>
        <td>$use_mail</td>
        <td>$password</td>
        <td class='text-center'><input value ='$pk_user' type='checkbox' name='usuarios[]'/></td>
        <td><a href='modificarUsuario.php?id=$pk_user'>Modificar</a></td>
      </tr>";
  }
  echo " </tbody>
  </table><input class='btn btn-primary' type ='submit' value='eliminar usuarios' name='eliminarUsuario'></input>
  </form>";

}

echo "</div>";
