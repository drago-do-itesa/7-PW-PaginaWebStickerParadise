<?php
$id = $_GET['id1'];
require_once("../CRUD/Consultas.php");

if (isset($id)) {
  $usuarios = Usuarios::singleton();
  $data = $usuarios->eliminarStickers($id);
  echo "exito";
} else {
  echo "Error al eliminar el sticker" . $id;
}
