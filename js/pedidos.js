function pedidosjs() {
	
    var producto;
    var cantidad;
    var foto;
    var alto;
    var ancho; 
    var largo;
    var color;
    var calle;
    var telefono; 

	producto = document.getElementById("id_producto").value;
	cantidad = document.getElementById("cantidad").value;
    foto = document.getElementById("foto").value;
	alto = document.getElementById("alto").value;
    ancho = document.getElementById("ancho").value;
    largo = document.getElementById("largo").value;
    color = document.getElementById("color").value;
    calle = document.getElementById("calle").value;
    telefono = document.getElementById("telefono").value;
    var mensaje = confirm("¿esta seguro de dejar este campo vacio?");
//Detectamos si el usuario acepto el mensaje

    


    if(producto == 0){
        alert("este campo esta vacio");
        return false;
    }

    if(cantidad == "" ){
        alert("este campo esta vacio");
        return false;
    }

    if(foto == ""){
        if (mensaje) {
alert("¿esta seguro de dejar este campo vacio?");
}else {
alert("¡Haz denegado el mensaje!");
}
        return false;
    }

  if(alto == ""){
        alert("este campo esta vacio");
        return false;
    }

      if(ancho == ""){
        alert("este campo esta vacio");
        return false;
    }

      if(largo == ""){
                if (mensaje) {
alert("¿esta seguro de dejar este campo vacio?");
}else {
alert("¡Haz denegado el mensaje!");
}
        return false;
    }

      if(color == ""){
        alert("este campo esta vacio");
        return false;
    }

      if(calle == ""){
        alert("este campo esta vacio");
        return false;
    }
    
      if(telefono == ""){
        alert("este campo esta vacio");
        return false;
    }
    

}