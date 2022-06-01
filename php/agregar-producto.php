<?php
$nombre = $_GET['nombre1'];
$precio = $_GET['precio1'];
$descripcion = $_GET['descripcion1'];
require_once("../CRUD/Consultas.php");

if (isset($nombre) && isset($precio) && isset($descripcion)) {
  $usuarios = Usuarios::singleton();
  $data = $usuarios->insertarStickers($nombre, $precio, $descripcion);
  echo "exito";
} else {
  echo "Error al agregar el sticker" . $nombre . $precio . $descripcion . "  kkk";
}
