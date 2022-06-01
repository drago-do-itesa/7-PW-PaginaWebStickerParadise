//Creacion de scripts para el index

//!Script para el carrusel de imagenes de la pagina principal
// variable inicial de index para nuestro carrusel
let i = 0;
//Script para el carrusel de imagenes de la pagina principal
function carrouselProductos() {
  i++;
  //Operador ternario para que no se pase del limite de imagenes
  i = i > 4 ? 0 : i;
  //Rescatar el elemento con el id carrousel-productos
  var carrousel = document.getElementById("carrousel-productos");
  //Realizar la accion de cambiar la imagen en la propiedad css background-image de carrousel
  carrousel.style.backgroundImage =
    "url(Imagenes/productos/producto" + i + ".png)";
  // carrousel.src = "/Imagenes/productos/producto"+i+".png";
}
//setInterval-  repite cada 3 segundos
setInterval(carrouselProductos, 3000);
//!------------------------------------------------------

  

 

