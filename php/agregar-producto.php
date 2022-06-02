<?php
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$descripcion = $_POST['descripcion'];
$imagen = $_FILES['imagen'];
require_once("../CRUD/Consultas.php");

if (isset($nombre) && isset($precio) && isset($descripcion)) {
  $usuarios = Usuarios::singleton();
  $usuarios->insertarStickers($nombre, $precio, $descripcion);
  $numeroIdSticker = $usuarios->obtenerUltimoIdSticker();
  //Guardar la imagen en la ruta /Imagenes/productos/producto+$numeroIdSticker.png
  $ruta = "../Imagenes/Stickers/sticker-" . $numeroIdSticker[0]['id'] . ".png";
  move_uploaded_file($imagen['tmp_name'], $ruta);

  //Rediriigir a la pagina de productos-admin.php
  header("Location: ../productos-admin.php");
} else {
  echo "Error al agregar el sticker" . $nombre . $precio . $descripcion . "  kkk";
}
