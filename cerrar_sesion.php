<?php 
error_reporting(0);
include'conexion.php';

session_start();
session_destroy();

  echo "<script>alert('Sesión Cerrada Correctamente')</script>";
  mysqli_close($cone);  
  echo "<script>window.location='index.html'</script>";
  session_destroy();
?>