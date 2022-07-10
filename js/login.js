function loginjs(){
	var nombre; 
	var contra;
	 
	 nombre = document.getElementById("name").value;
	 contra = document.getElementById("pass").value;


    if(nombre == "" || contra ==""){
    	alert("este campo esta vacio");
    	return false;
    }
   
}