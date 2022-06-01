<?php
//Retorna las variables de sesión
session_start();
//Crear un array con los datos de la sesión

$datosSesion = array(
  // 'id' => $_SESSION['id'],
  'nombre' => $_SESSION['nombre'],
  'correo' => $_SESSION['correo'],
  'priv' => $_SESSION['priv'],
  'foto' => $_SESSION['foto']
);
//Retornar el array en formato json
echo json_encode($datosSesion);
