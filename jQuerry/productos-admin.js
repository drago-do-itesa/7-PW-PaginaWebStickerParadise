//CRUD Productos

//Funcion jquery para cargar los productos a la tabla con el id inventario-productos. Que acciona cuando se hace click en el boton de agregar producto.
$(document).ready(function () {
  $("#agregar").click(function () {
    //Numero random del 1 al 5 para definir la imagen
    let numero = Math.floor(Math.random() * 5) + 1;
    //Definir los parametros de la funcion
    //Parametros:
    let imagen = "Imagenes/Stickers/sticker-" + numero + ".png";
    let nombre = "Sticker " + numero;
    let precio = Math.floor(Math.random() * 100) + 1;
    let descripcion =
      "Lorem ipsum dolor sit amet, consectetur adipiscing elit.";
    console.log(nombre + " " + precio + " " + descripcion);
    //Enviar datos jquerry en post para agregar un producto a la base de datos
    $.get(
      "../php/agregar-producto.php",
      {
        nombre1: nombre,
        precio1: precio,
        descripcion1: descripcion,
      },
      function (data) {
        //Si se agrega correctamente, se muestra un mensaje de exito
        console.log(data);
        if (data == "exito") {
          alert("Producto agregado correctamente");
          let producto =
            "<tr><th scope='row'><img src='" +
            imagen +
            "' alt='" +
            nombre +
            "' class='img-thumbnail'  width='100px' height='100px'></th><td>" +
            nombre +
            " <button class='btn btn-primary'><i class='bi bi-pencil-square'></i></button></td><td>$" +
            precio +
            " <button class='btn btn-primary'><i class='bi bi-pencil-square'></i></button></td><td>'" +
            descripcion +
            "'<button class='btn btn-primary'><i class='bi bi-pencil-square'></i></button></td><td><button class='btn btn-danger eliminar-sticker'><i class='bi bi-trash'></i></button></td>";
          $("#inventario-productos").append(producto);
        } else {
          alert("Error al agregar el producto");
          return;
        }
      }
    );
  });
});

//Crear funcion jquery para borrar el producto que se seleccione.
$(document).ready(function () {
  $("#inventario-productos").on("click", ".btn-danger", function () {
    //obtiene el identificador de tr
    let id = $(this).parent().parent().attr("id");
    //Envia el id del producto a eliminar-producto.php
    $.get("../php/eliminar-producto.php", { id1: id }, function (data) {
      //Si se elimina correctamente, se muestra un mensaje de exito
      if (data == "exito") {
        alert("Producto eliminado correctamente");
        $("#" + id).remove();
      } else {
        alert("Error al eliminar el producto");
        return;
      }
    });
  });
});
