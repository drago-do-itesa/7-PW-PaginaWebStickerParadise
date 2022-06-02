<?php
$id = $_GET['id1'];
require_once("../CRUD/Consultas.php");

if (isset($id)) {
  $usuarios = Usuarios::singleton();
  $data = $usuarios->eliminarStickers($id);
  //Eliminar tambien la imagen de la carpeta '/Imagenes/Stickers/sticker-'.$id.'.png'
  $ruta = "../Imagenes/Stickers/sticker-" . $id . ".png";
  unlink($ruta);

  echo "exito";
} else {
  echo "Error al eliminar el sticker" . $id;
}
