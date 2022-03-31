

//CRUD Productos 

//Funcion jquery para cargar los productos a la tabla con el id inventario-productos. Que acciona cuando se hace click en el boton de agregar producto.
$(document).ready(function(){
    $("#agregar").click(function(){
      //Numero random del 1 al 5 para definir la imagen
      let numero = Math.floor(Math.random() * 5) + 1;
      //Definir los parametros de la funcion
      //Parametros:
      let imagen = "Imagenes/Stickers/sticker-" + numero + ".png";
      let nombre = "Sticker " + numero;
      let precio = "$"+Math.floor(Math.random() * 100) + 1;
      let descripcion = "Lorem ipsum dolor sit amet, consectetur adipiscing elit.";

      let producto =
        "<tr><th scope='row'><img src='" +
        imagen +
        "' alt='" +
        nombre +
        "' width='100px' height='100px'></th><td>" +
        nombre +
        " <button class='btn btn-primary'><i class='bi bi-pencil-square'></i></button></td><td>" +
        precio +
        " <button class='btn btn-primary'><i class='bi bi-pencil-square'></i></button></td><td>'"+descripcion+"'<button class='btn btn-primary'><i class='bi bi-pencil-square'></i></button></td><td><button type='button' class='btn btn-danger'>Eliminar</button></td></tr>";
      $("#inventario-productos").append(producto);
    });
});

//Crear funcion jquery para borrar el producto que se seleccione.
$(document).ready(function(){
    $("#inventario-productos").on("click", ".btn-danger", function(){
        $(this).closest("tr").remove();
    });
});