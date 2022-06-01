<?php
$nombre = $_GET['nombre'];
$correo = $_GET['correo'];
$password = $_GET['password'];
require_once("../CRUD/Consultas.php");

if (isset($nombre) && isset($correo) && isset($password)) {
  $usuarios = Usuarios::singleton();
  $data = $usuarios->crearUsuario($nombre, $correo, $password);
  echo "1";
} else {
  echo "Error al agregar el usuario" . $nombre . $correo . $password . "  kkk";
}
