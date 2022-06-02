<?php
//Recuperar prarametros de la URL despuesde el ?
//Recuperar el parametro de la URL
$id = $_GET["id"];

require_once("../CRUD/Consultas.php");

if (isset($id)) {
  $usuarios = Usuarios::singleton();
  $data = $usuarios->borrarUsuario($id);
  $html = "<!DOCTYPE html>
<html lang='en'>

<head>
  <meta charset='UTF-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <title>Usuario Eliminado</title>
  <link rel='shortcut icon' href='/Imagenes/logo.ico'>
  <!-- Bootstrap -->
  <link rel='stylesheet' href='../CSS/bootstrap.min.css'>
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css'>
  <!-- Mis estilos css -->
  <link rel='stylesheet' href='../CSS/main.css'>
</head>

<body>
  <!-- Contenedor de bootstrap para anunciarle que el usuario se borro correctamente -->
  <div class='container'>
    <div class='row'>
      <div class='col-md-12'>
        <div class='alert alert-success' role='alert'>
          <h4 class='alert-heading'>Usuario Eliminado</h4>
          <p>El usuario se elimino correctamente</p>
          <hr>
          <p class='mb-0'>
            <a href='../index.php' class='btn btn-primary'>Volver</a>
          </p>
        </div>
      </div>
    </div>
  </div>
</body>

</html>";
} else {
  $html = "<!DOCTYPE html>
<html lang='en'>

<head>
  <meta charset='UTF-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <title>Usuario Eliminado</title>
  <link rel='shortcut icon' href='../Imagenes/logo.ico'>
  <!-- Bootstrap -->
  <link rel='stylesheet' href='../CSS/bootstrap.min.css'>
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css'>
  <!-- Mis estilos css -->
  <link rel='stylesheet' href='../CSS/main.css'>
</head>

<body>
  <!-- Contenedor de bootstrap para anunciarle que el usuario se borro correctamente -->
  <div class='container'>
    <div class='row'>
      <div class='col-md-12'>
        <div class='alert alert-danger' role='alert'>
          <h4 class='alert-heading'>Fallo la eliminacion del usuario</h4>
          <p>El usuario no se pudo eliminar.</p>
          <hr>
          <p class='mb-0'>
            <a href='../index.php' class='btn btn-primary'>Volver</a>
          </p>
        </div>
      </div>
    </div>
  </div>
</body>

</html>";
}

echo $html;
