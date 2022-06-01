<!doctype html>
<html lang="en">

<head>


  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Inicia sesión</title>
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
                <a class="nav-link" style="color: #FAF700; text-decoration: underline;" href="index.php">Inicio</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </header>

  </div>

  <div class="contenido">
    <div class="contenido-principal">
      <h1>Iniciar Sesión</h1>
      <div class="contenedor">
        <div class="input-contenedor">
          <i class="fas fa-envelope icon"></i>
          <input type="text" placeholder="Correo Electronico" id="email">
        </div>
        <div class="input-contenedor">
          <i class="fas fa-key icon"></i>
          <input type="password" placeholder="Contraseña" id="password">
        </div>
        <button class="btn tarjeta-boton" onclick="iniciarSesion()">Inicia Sesion</button>

        <!-- Inicio de sesión correcto************************************************* -->
        <?php
        //Include EL CONECTOR A GMAIL https://console.developers.google.com
        include_once 'gpConfig.php';
        //VERIFICANDO SI YA SE LOGUEO
        $errorNI = "";
        if (isset($_GET['code'])) {
          $gClient->authenticate($_GET['code']);
          $_SESSION['token'] = $gClient->getAccessToken();
          header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
        }

        if (isset($_SESSION['token'])) {
          $gClient->setAccessToken($_SESSION['token']);
        }

        $output = "";
        $kaka = "";
        if ($gClient->getAccessToken()) { //SE HA LOGUEADO
          //Get user profile data from google

          $gpUserProfile = $google_oauthV2->userinfo->get();
          //RESCATANDO CORREO ELECTR�NICO
          // echo  $gpUserProfile['name'];
          // echo "a1 is: '" . implode("','", $gpUserProfile) . "'<br>";

          $email = $gpUserProfile['email'];
          $name = $gpUserProfile['name'];
          $picture = $gpUserProfile['picture'];
          //SEPARANDO POR EL @
          $cade = explode("@", $email);
          $p1 = $cade[0];
          $p2 = $cade[1];
          $errorNI = "";
          //PRIMERO SE VALIDA POR DOMINIO DE CORREO ELECTR�NICO
          if ($p2 != "itesa.edu.mx") {
            $errorNI = $email . "  No es correo de ITESA";
            $authUrl = $gClient->createAuthUrl();
            $output = '<a href="' . filter_var($authUrl, FILTER_SANITIZE_URL) . '"> <i class="fab fa-google"></i> Iniciar con Google</a>';
          } else {
            //SI SE PUEDE LOGUEAR YA SOLO QUEDA HACER OTRAS VALIDACIONES PARA PODER INGRESAR
            //SE PUEDE HACER CONSULTA A BASE DE DATOS Y VERIFICAR USUARIO

            require_once("CRUD/Consultas.php");
            $usuarios = Usuarios::singleton();
            $data = $usuarios->Consulta($email);


            if (count($data) > 0) {
              //iniciar sesioniniciar variable de sesion
              $_SESSION["correo"] = $email;
              $_SESSION["nombre"] = $name;
              $_SESSION["foto"] = $picture;
              $_SESSION["id"] = $data[0]["id"];
              $_SESSION["priv"] = $data[0]["priv"];

              header('Location: http://localhost/perfil.php');
            } else {
              $errorNI = "No estas registrado en nuestro sitio, intenta registrarte";
              $authUrl = $gClient->createAuthUrl();
              $output = '<a href="' . filter_var($authUrl, FILTER_SANITIZE_URL) . '"> <i class="fab fa-google"></i> Iniciar con Google</a>';
            }
          }
          //echo( $email );

        } else { //SI NO SE LOGUEO PIDE QUE SE LOGUEE
          $authUrl = $gClient->createAuthUrl();
          $output = '<a href="' . filter_var($authUrl, FILTER_SANITIZE_URL) . '"> <i class="fab fa-google"></i> Iniciar con Google</a>';
        }
        ?>
        <div id="google" class="btn btn-outline-dark " style="width: 100%;"><?php echo $output; ?></div>

        <!-- Termino de inicio de sesion gooogle ***************** -->
        <div id="notificacion" class="alert alert-warning" role="alert" style="margin: 20px;">
          <?php echo $errorNI; ?>
        </div>

        <p>¿No tienes una cuenta? <a class="link" href="registrarse.php"> <em class="tarjeta-boton"> Registrate</em>
          </a></p>
        <p>Al registrarte, aceptas nuestras Condiciones de uso y Política de privacidad.</p>
      </div>
    </div>
  </div>

  <!-- Footer con el contenido de la pagina utilizando bootstrap-->
  <footer class="bg-negro">
    <div class="container text-white">
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

  <!-- JavaScript de bootstrap -->
  <script src="JS/bootstrap.bundle.min.js"></script>
  <!-- script para agregar libreria jQuerry -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <script>
    function iniciarSesion() {
      var email = document.getElementById("email").value;
      var password = document.getElementById("password").value;
      console.log(email);
      console.log(password);
      $(function() {
        $.get("php/iniciar-sesion.php", {
          email: email,
          password: password
        }, function(data) {
          //eliminar primera linea de texto
          data = data.replace(/^\s+/g, '');
          console.log(data);
          if (data == "Inicio de sesión correcto") {
            window.location.href = "perfil.php";
          } else if (data == "Contraseña incorrecta") {
            $("#notificacion").css("display", "block");
            $("#notificacion").text("Usuario o contraseña incorrectos.");
          } else if (data == "Usuario no existe") {
            $("#notificacion").css("display", "block");
            $("#notificacion").text("Usuario no existe, registrate.");
          }
        });
      });
    }
  </script>
</body>

</html>