listaDeProductos = [];

//metodo que agrega un producto a la lista de productos
function agregarProducto(codigoProducto) {
  //busca el producto en la lista de productos de la base de datos
  //!Se implementa despues
  //Guardar los datos del producto en un objeto
  listaDeProductos.push(codigoProducto);
  //Muestra el boton de ir al carrito (boton flotante)
  existenProductos();
}

//metodo que verifica si existen productos en la lista de productos
function existenProductos() {
  if (listaDeProductos.length > 0) {
    //Muestra el boton de ir al carrito (boton flotante)
    document.getElementById("btn-flotante").style.display = "block";
    setTimeout(() => {
      //aplicar una transformacion de pociicion del boton flotante
      document.getElementById("btn-flotante").style.transform =
        "translateY(-120px)";
    }, 250);
  } else {
    //Oculta el boton de ir al carrito (boton flotante)
    document.getElementById("btn-flotante").style.display = "none";
  }
}
