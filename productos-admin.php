<!doctype html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Gestion de Stickers</title>
  <link rel="shortcut icon" href="/Imagenes/logo.ico">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="CSS/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  <!-- Mis estilos css -->
  <link rel="stylesheet" href="CSS/main.css">
</head>

<body>
  <?php

  use ParagonIE\ConstantTime\Encoding;

  session_start();
  if (!isset($_SESSION["nombre"]) || $_SESSION["priv"] != "1") {
    $_SESSION["nombre"] = null;
    session_destroy();
    header('Location: http://localhost/index.php');
  }
  ?>
  <div class="container-fluid bg-negro">

    <header>
      <img class="logo" src="Imagenes/logo-black.svg" alt="LogoStickers">
      <p>StickerParadise</p>
      <div>
        <nav class="navbar navbar-expand-lg navbar-dark ">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="margin: 5px;">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="productos.php">Productos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" style="color: #FAF700; text-decoration: underline;" href="productos-admin.php">Productos Admin</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="perfil.php">Mi perfil</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </header>

  </div>

  <!-- Contenido de la pagina -->
  <div class="container-lg">
    <!-- Titulo -->
    <h1>Administra los stickers que se venden</h1>

    <!-- Se mostrara un crud en forma de tabla, donde podremos agregar, editar y eliminar stickers. La tabla tendra las siguientes columnas: imagen del sticker, nombre del sticker, precio del sticker, descripcion, y un boton para eliminar el sticker.
    Debajo de la tabla estara el boton para agregar un nuevo sticker. -->

    <div class="row">
      <div class="col-md-12">
        <table class="table table-striped" id="inventario-productos">
          <thead>
            <tr>
              <th scope="col">Imagen</th>
              <th scope="col">Nombre</th>
              <th scope="col">Precio</th>
              <th scope="col">Descripcion</th>
              <th scope="col">Eliminar</th>
            </tr>
          </thead>
          <tbody>
            <?php
            require_once("CRUD/Consultas.php");
            $usuarioDB = Usuarios::singleton();
            $data = $usuarioDB->recuperarColeccionesStickers();
            if (count($data) > 0) {
              foreach ($data as $row) {
                echo '<tr id="' . $row['id'] . '">';
                echo '<th scope="row"><img src="Imagenes/Stickers/sticker-' . $row['id'] . '.png" alt="' . $row['nombre'] . '" class="img-thumbnail" width="100" height="100"></th>';
                echo '<td>' . $row['nombre'] .  ' <button class="btn btn-primary editar-nombre"><i class="bi bi-pencil-square"></i></button></td>';
                echo '<td>' . $row['precio'] .  ' <button class="btn btn-primary editar-precio"><i class="bi bi-pencil-square"></i></button></td>';
                echo '<td>' . $row['descripcion'] .  ' <button class="btn btn-primary editar-descripcion"><i class="bi bi-pencil-square"></i></button></td>';
                echo '<td><button class="btn btn-danger eliminar-sticker"><i class="bi bi-trash"></i></button></td>';
                echo '</tr>';
              }
            } else {
              echo '<tr>';
              echo '<h1>No hay stickers</h1>';
              echo '</tr>';
            }
            ?>
          </tbody>
        </table>

        <button type="button" class="btn btn-primary" id="agregar">Agregar Sticker</button>
        <br><br><br><br><br><br><br>
      </div>
    </div>
  </div>




  <!-- Footer con el contenido de la pagina utilizando bootstrap-->
  <footer class="bg-negro">
    <div class="container justify-content-center text-white">
      <div class="row">
        <div class="col-sm-4">
          <h3 class="color-amarillo">Contacto</h3>
          <p>sticker@paradise.com</p>
          <p>propuesta.sticker@paradise.com</p>
          <p>ayuda.sticker@paradise.com</p>
        </div>
        <div class="col-sm-4">
          <h3 class="color-amarillo">Sobre nosotros</h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit similique eum adipisci sed ad
            illo
            at nostrum magni eligendi explicabo enim qui maiores, obcaecati, praesentium eius. Facere nostrum soluta
            asperiores!</p>
          <p>Fin</p>
        </div>
        <div class="col-sm-4">
          <h3 class="color-amarillo">Siguenos</h3>
          <p> <i class="bi bi-facebook"></i> Facebook </p>
          <p> <i class="bi bi-messenger"></i> Messenger</p>
          <p> <i class="bi bi-youtube"></i> Youtube </p>
          <p><i class="bi bi-whatsapp"></i> WhatsApp</p>
        </div>
      </div>
    </div>
  </footer>
  <!-- script para agregar libreria jQuerry -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- JavaScript de bootstrap -->
  <script src="/JS/bootstrap.bundle.min.js"></script>
  <script src="/jQuerry/productos-admin.js"></script>

</body>

</html>