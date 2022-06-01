//funcion jquery para recuperar parametros de la url y mostrarlos en las etiquetas de perfil.html

$(document).ready(function () {
  //Recuperar los parametros de un JSON enviado por el servidor
  let datos = $.getJSON("../php/datos-sesion.php", function (data) {
    //Recuperar el nombre de usuario
    console.log(data);
  });
  //Insertar los parametros en
  $("#nombre").text(nombre);
  $("#direccion").text(direccion);
});
