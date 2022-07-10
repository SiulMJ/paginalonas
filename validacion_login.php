<?php
include 'conexion.php';
session_start();

if (isset($_REQUEST['Ingresar'])) {
  
  $_SESSION['nombre'] = $_POST['name'];
  $_SESSION['contra'] = $_POST['pass'];

  
    //Estas variables son lo mismo
  $usuario = $_POST['name'];
  $paswwrod = $_POST['pass'];
  
  $consulta = "SELECT * FROM usuarios WHERE nombre= '$usuario'";
  $resultado=mysqli_query($cone,$consulta);
  $rusuario = mysqli_fetch_object(mysqli_query($cone, $consulta));
  $filas=mysqli_fetch_array($resultado);

  //Se validad el usuario y el password para acceder a la pagina administradora
if ($rusuario->nombre == $usuario && $rusuario->contra == $paswwrod) {
  if($filas['id_rol']==1){ //administrador
    header("location:admin.php");
}
if($filas['id_rol']==2){ //cliente
header("location:pedidos.php");
}
}else{
  echo "<script>alert('usuario no valido')</script>";
  mysqli_close($cone);  
  echo "<script>window.location='index.html'</script>";
  session_destroy();
}
mysqli_free_result($resultado);//liberar el resultado y sigue con el scrip
mysqli_close($cone);


}
?>