
<?php
//Recibe datos del formulario de inicio de sesión por post
$correo = $_GET['email'];
$contrasena = $_GET['password'];
require_once("../CRUD/Consultas.php");
// $correo = "admin@itesa.edu.mx";
// $contrasena = "admin";
if (isset($correo) && isset($contrasena)) {
  $usuarios = Usuarios::singleton();
  $data = $usuarios->usuarioExiste($correo, $contrasena);
  if (count($data) > 0) {
    // "Usuario existe"
    //Verificar que la contraseña coincida
    if ($data[0]['contra'] == $contrasena) {
      // "Contraseña correcta"
      //Iniciar sesión
      session_start();
      $_SESSION['correo'] = $correo;
      $_SESSION['id'] = $data[0]['id'];
      $_SESSION['nombre'] = $data[0]['nombre'];
      $_SESSION['priv'] = $data[0]['priv'];
      $_SESSION['foto'] = "Imagenes/avatar.png";
      echo "Inicio de sesión correcto";
    } else {
      // "Contraseña incorrecta"
      echo "Contraseña incorrecta";
    }
  } else {
    echo "Usuario no existe";
  }
}

?>