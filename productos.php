<!doctype html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Catalogo de Stickers </title>
  <link rel="shortcut icon" href="/Imagenes/logo.ico">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="CSS/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  <!-- Mis estilos css -->
  <link rel="stylesheet" href="CSS/main.css">
</head>

<body onload="existenProductos()">
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
                <a class="nav-link" style="color: #FAF700; text-decoration: underline;" href="productos.php">Productos</a>
              </li>
              <li id="productos-admin" class="nav-item">
                <a class="nav-link" href="productos-admin.php">Productos Admin</a>
              </li>
              <li class="nav-item">
                <a id="perfil" class="nav-link" href="iniciar-sesion.php">Inicia Sesion</a>
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
    <h1>Colecciones mas recientes</h1>


    <div class="row">
      <?php
      require_once("CRUD/Consultas.php");
      $usuarioDB = Usuarios::singleton();
      $data = $usuarioDB->recuperarColeccionesStickers();
      if (count($data) > 0) {
        foreach ($data as $row) {
          echo '<div  class="col-sm-6 col-md-4 col-lg-3">';
          echo '<div class="card tarjeta">';
          echo '<img class="card-img-top" src="Imagenes/Stickers/sticker-' . $row['id'] . '.png" alt="Card image Sticker' . $row['id'] . '">';
          echo '<div class="card-body">';
          echo '<h5 class="card-title">' . $row['nombre'] . '</h5>';
          echo '<p class="card-text">';
          echo '<b>Precio: $' . $row['precio'] . '</b>';
          echo '<br>';
          echo '<b> Descripcion: </b>';
          echo '<p class= "tarjeta-descripcion" >';
          echo $row['descripcion'];
          echo '</p>';
          echo '<div class="tarjeta-acciones">';
          echo '<b>Cantidad:</b>';
          echo '<input type="number" value="1" min="1" max="10">';
          echo '</div>';

          echo '<button type="button" class="btn tarjeta-boton" onclick="agregarProducto("' . $row['id'] . '")">Añadir al carrito</button>';
          echo '</div>';
          echo '</div>';
          echo '</div>';
        }
      } else {
        echo "No hay colecciones";
      }
      ?>
    </div>
  </div>

  <a href="#" class="btn-flotante" id="btn-flotante"><i class="bi bi-cart4"></i> Ir a carrito</a>


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
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit similique eum adipisci sed ad illo
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

  <!-- JavaScript de bootstrap -->
  <script src="JS/bootstrap.bundle.min.js"></script>

  <!-- mis scripts -->
  <script src="/JS/productos.js"></script>
  <!-- script para agregar libreria jQuerry -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <script>
    $(document).ready(function() {
      //Obtener datos de usuario
      $.get("php/datos-sesion.php", function(data) {
        if (data != "") {
          // rescatar la ultima linea de texto de data
          var ultimaLinea = data.split("\n").pop();
          console.log(ultimaLinea);
          //Obtener json
          var json = JSON.parse(ultimaLinea);
          //Obtener datos
          var priv = json.priv;
          var nombre = json.nombre;
          if (priv != 1) {
            //borrar la etiqueta con el id productos-admin
            $("#productos-admin").remove();
          }
          if (nombre != null) {
            //Cambial el texto en la etiqueta con id perfil a mi perfil
            $("#perfil").text("Mi perfil");
            //Cambiar el href de la etiqueta con id perfil
            $("#perfil").attr("href", "perfil.php");
          }
        }
      });
    });
  </script>
</body>

</html>