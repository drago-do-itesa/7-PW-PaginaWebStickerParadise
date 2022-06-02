<?php
// reference the Dompdf namespace
// include autoloader
require_once '../dompdf/autoload.inc.php';

use Dompdf\Dompdf;

//Recuperar el contenido que ira en el PDF enviado por post
$contenido = "";

require_once("../CRUD/Consultas.php");
$usuarioDB = Usuarios::singleton();
$data = $usuarioDB->recuperarColeccionesStickers();
if (count($data) > 0) {
  $contenido = '<h1>Colecciones de stickers</h1>';
  $contenido .= '<table class="table table-striped" id="inventario-productos">';
  $contenido .= '<thead>';
  $contenido .= '<tr>';
  $contenido .= '<th scope="col">Imagen</th>';
  $contenido .= '<th scope="col">Nombre</th>';
  $contenido .= '<th scope="col">Precio</th>';
  $contenido .= '<th scope="col">Descripcion</th>';
  $contenido .= '</tr>';
  $contenido .= '</thead>';
  $contenido .= '<tbody>';
  foreach ($data as $row) {
    $contenido .= '<tr>';
    $contenido .= '<th scope="row"><img src="../Imagenes/Stickers/sticker-' . $row['id'] . '.png"   width="100" height="100"></th>';
    $contenido .= '<td>' . $row['id'] .  '</td>';
    $contenido .= '<td>' . $row['nombre'] .  '</td>';
    $contenido .= '<td>' . $row['precio'] .  '</td>';
    $contenido .= '<td>' . $row['descripcion'] .  '</td>';
    $contenido .= '</tr>';
  }
  $contenido .= '</tbody>';
  $contenido .= '</table>';
} else {
  $contenido .= '<h1>No hay stickers</h1>';
}


// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml($contenido);
// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');
// Render the HTML as PDF
$dompdf->render();
$pdf = $dompdf->output();
// Output the generated PDF to Browser
$dompdf->stream();
