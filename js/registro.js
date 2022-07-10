function registrojs() {
	var nombre;
    var contraseña; 
    var correo;

	nombre = document.getElementById("names").value;
	contra = document.getElementById("pass1").value;
	contra2 = document.getElementById("pass2").value;
    correo = document.getElementById("cor").value;
    tel = document.getElementById("telefono").value;
    exprecion = /\w+@\w+\.+[a-z]/;

    if(nombre == ""){
    	alert("este campo esta vacio");
        return false;
    }

    if(contra2 != contra ){
        alert("las contraseñas son diferentes");
        return false;
    }

    if(tel == "" ){
        alert("este campo esta vacio");
        return false;
    }

       if(contra == "" ){
        alert("este campo esta vacio");
        return false;
    }

 if(contra2 == ""){
        alert("este campo esta vacio");
        return false;
    }

 if(correo == ""){
        alert("este campo esta vacio");
        return false;
    }
    
   if(!exprecion.test(correo)){
      alert("correo no valido");
      return false;
   }
}