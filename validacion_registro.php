<?php
include 'conexion.php';
session_start();

$nombre1=$_POST['names'];
$password1=$_POST['pass1'];
$tel=$_POST['telefono'];
$cor=$_POST['correo'];

$insertar = "INSERT INTO usuarios (id_rol, nombre, contra, correo, telefono) VALUES ('2', '$nombre1', '$password1', '$tel','$cor')";

$resultado = mysqli_query($cone, $insertar);

if (!$resultado){

  echo "<script>alert('Error al registrarse intente de nuevo más tarde')</script>";
}
else{
      header("location:login.html");
  echo "<script>alert('Bienvenido')</script>";
  
}
mysqli_close($cone);
?>