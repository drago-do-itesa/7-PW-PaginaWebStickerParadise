<!doctype html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Mi Perfil</title>
  <link rel="shortcut icon" href="/Imagenes/logo.ico">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="CSS/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  <!-- Mis estilos css -->
  <link rel="stylesheet" href="CSS/main.css">
  <!-- Estilos alertify -->
  <link rel="stylesheet" href="/CSS/alertify.min.css" />
  <link rel="stylesheet" href="/CSS/themes/default.min.css" />
  <!-- script para agregar libreria alertify -->
  <script src="alertify.min.js"></script>
</head>

<body>
  <?php

  use ParagonIE\ConstantTime\Encoding;

  session_start();
  if (!isset($_SESSION["nombre"])) {
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
              <li id="productos-admin" class="nav-item">
                <a class="nav-link" href="productos-admin.php">Productos Admin</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" style="color: #FAF700; text-decoration: underline;" href="perfil.php">Mi Perfil</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </header>

  </div>

  <div id="cargaexterna">

  </div>
  <!-- Contenido de la pagina -->
  <div class="contenido">
    <div class="contenido-principal">
      <h1>Hola Bienvenido</h1>
      <img id="foto" style="width: auto;" src="Imagenes/avatar.png" alt="">
    </div>
    <table class="table table-striped">
      <tbody>
        <tr>
          <th scope="row">
            Nombre
          </th>
          <td id="nombre">Reyes Guevara Alva</td>
        </tr>

        <tr>
          <th scope="row">
            Email
          </th>
          <td><a class="link" id="direccion" href="sesion-iniciada.html"> reyesga@gmail.com</a></td>
        </tr>

        <tr>
          <th scope="row">
            Privilegios
          </th>
          <td id="priv">2</td>
        </tr>

        <tr>
          <th scope="row">
            Agregado a carrito
          </th>
          <td> <img src="Imagenes/Stickers/sticker-2.png" alt="Sticker2" width="100px" height="100px"></td>
        </tr>

        <tr>
          <th scope="row">
            <button type="button" class="btn btn-primary">Ir comprar</button>
            <button class="btn btn-primary" id="cerrar"> Cerrar sesión</button>
            <button class="btn btn-primary" id="borrarCuenta"> Eliminar Sesion</button>
          </th>
        </tr>
      </tbody>

    </table>

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
  <script src="JS/bootstrap.bundle.min.js"></script>
  <!-- <script src="/jQuerry/perfil.js"></script> -->

  <script>
    $(document).ready(function() {
      //Obtener datos de usuario
      $.get("php/datos-sesion.php", function(data) {
        console.log(data);
        //Obtener json
        var json = JSON.parse(data);
        //Obtener datos
        var nombre = json.nombre;
        var email = json.correo;
        var foto = json.foto;
        var priv = json.priv;
        $("#nombre").text(nombre);
        $("#direccion").text(email);
        $("#foto").attr("src", foto);
        $("#test").click(function() {
          $("foto").attr("src", "Imagenes/avatar.png");
        });
        if (priv == 1) {
          $("#priv").text("Administrador");
        } else {
          $("#priv").text("Usuario");
          //borrar la etiqueta con el id productos-admin
          $("#productos-admin").remove();
        }
      });
    });

    $("#cerrar").click(function() {
      //Redirigir a la pagina cerrar-sesion.php
      window.location.href = "php/cerrar-sesion.php";
    });

    $("#borrarCuenta").click(function() {
      //Enviar datos a mail-borrar-cuenta.php
      $.get("php/mail-cancelar-cuenta.php", {
          nombre: $("#nombre").text(),
          email: $("#direccion").text()
        },
        function(data) {
          alertify.alert("Se ha enviado un correo a su cuenta de correo para cancelar su cuenta");
          console.log(data);
          //Redirigir a la pagina cerrar-sesion.php
          window.location.href = "php/cerrar-sesion.php";
        });
    });
  </script>

</body>

</html>