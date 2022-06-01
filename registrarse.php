<!doctype html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registrate</title>
  <link rel="shortcut icon" href="/Imagenes/logo.ico">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="CSS/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  <!-- Enlace para iconos -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">

  <!-- Mis estilos css -->
  <link rel="stylesheet" href="CSS/main.css">
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
                <a class="nav-link" href="index.php">Inicio</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="iniciar-sesion.php">Inicia Sesion</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </header>

  </div>

  <div class="contenido">
    <div class="contenido-principal">
      <h1>Registrate</h1>
      <div class="contenedor">
        <div class="input-contenedor">
          <i class="fas fa-user icon"></i>
          <input id="nombre" type="text" placeholder="Nombre Completo">
        </div>
        <div class="input-contenedor">
          <i class="fas fa-envelope icon"></i>
          <input id="correo" type="email" placeholder="Correo Electronico">
        </div>
        <div class="input-contenedor">
          <i class="fas fa-key icon"></i>
          <input id="password1" type="password" placeholder="Contraseña">
        </div>
        <div class="input-contenedor">
          <i class="fas fa-key icon"></i>
          <input id="password2" type="password" placeholder="Repite tu Contraseña">
        </div>
        <button id="registrate1" class="btn tarjeta-boton">Registrate</button>
        <p class="centrar-texto">Al registrarte, aceptas nuestras Condiciones de uso y Política de privacidad.</p>
        <p class="centrar-texto">¿Ya tienes una cuenta?<a class="link" href="iniciar-sesion.php"><em class="tarjeta-boton"> Iniciar sesion</em></a></p>
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
  <script src="/jQuerry/registrarse.js"></script>
  <!-- JavaScript de bootstrap -->
  <script src="JS/bootstrap.bundle.min.js"></script>

  <script>
    $(document).ready(function() {
      $('#registrate1').click(function() {
        //No recarga la pagina si falla el registro
        event.preventDefault();
        //Obtiene los valores de los inputs
        var nombre = $('#nombre').val();
        var correo = $('#correo').val();
        var password1 = $('#password1').val();
        var password2 = $('#password2').val();
        if (nombre == '' || correo == '' || password1 == '' || password2 == '') {
          alert('Por favor llena todos los campos');
          return;
        } else {
          //Verificar que el correo termine en @itesa.edu.mx 
          if (correo.endsWith('@itesa.edu.mx')) {
            //Verificar que el correo no exista en la base de datos
            if (password1 != password2) {
              alert('Las contraseñas no coinciden');
              return;
            } else {
              $.ajax({
                url: 'php/crear-usuario.php',
                type: 'GET',
                data: {
                  nombre: nombre,
                  correo: correo,
                  password: password1,
                },
                success: function(response) {
                  if (response == '1') {
                    alert('Usuario creado correctamente');
                    window.location.href = 'iniciar-sesion.php';
                  } else {
                    alert('Error al crear el usuario');
                    return;
                  }
                }

              });
            }
          } else {
            alert('El correo debe terminar en @itesa.edu.mx');
            return;
          }
        }
      });
    });
  </script>
</body>

</html>X