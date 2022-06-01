//Funcion para enviar los datos de registro a la pagina de perfil.html
$("#registrate").click(function () {
  let nombre = $("#nombre").val();
  let direccion = $("#direccion").val();
  let password = $("#password").val();
  //enviar los datos a la pagina de perfil.html
  window.location.href =
    "perfil.html?nom=" + nombre +"&dir="+ direccion + "&pass=" + password;
});
