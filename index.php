<!doctype html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bienvenido a StickerParadise</title>
  <link rel="shortcut icon" href="/Imagenes/logo.ico">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="CSS/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  <!-- Mis estilos css -->
  <link rel="stylesheet" href="CSS/main.css">
  <!-- Estilos alertify -->
  <link rel="stylesheet" href="/CSS/alertify.min.css" />
  <link rel="stylesheet" href="/CSS/themes/default.min.css" />
</head>

<body>

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
                <a class="nav-link" style="color: #FAF700; text-decoration: underline;" href="index.php">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="productos.php">Productos</a>
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

  <div class="contenido">

    <div class="texto-presentacion">
      <h1>Vendemos Stickers</h1>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae laborum dignissimos qui fuga, placeat
        optio
        quod cum atque quam, impedit voluptatum. Saepe ipsa libero eveniet deserunt. Fugit itaque deserunt dicta.
        Optio earum nostrum ut molestiae totam quas iste aliquid! Neque provident inventore suscipit nesciunt
        distinctio
        expedita quidem, itaque placeat repellat! Nihil enim dolores voluptates voluptatibus accusantium quae? Sit,
        nobis fuga.</p>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae laborum dignissimos qui fuga, placeat
        optio
        quod
        cum atque quam, impedit voluptatum.</p>
    </div>

    <div class="contenido-principal">
      <div class="contenedor-carrousel">
        <img src="/Imagenes/productos/blanco.png" alt="Productos" id="carrousel-productos" onclick="carrouselProductos()">
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
  <script src="/JS/index.js"></script>
  <script src="/JS/prueba.js"></script>
  <!-- script para agregar libreria jQuerry -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- script para agregar libreria alertify -->
  <script src="alertify.min.js"></script>
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

      //Alerta de alertify al hacer click en el div con la clase contenedor-carrousel
      $("#carrousel-productos").click(function() {
        alertify.alert("Hey, esto es una alerta");
      });
    });
  </script>
</body>

</html>