<?php
include 'conexion.php';
session_start();

$dato_usuario = $_SESSION['id_usuarios'];

  $consulta = mysqli_query($cone,"SELECT * FROM usuarios WHERE id_usuarios= '$dato_usuario");
  $resuario = mysqli_fetch_object($consulta);
  $filas=mysqli_fetch_array($resultado);


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lonas fortoflex</title>
	<link rel="stylesheet" type="text/css" href="estilo/estilos.css">
	<link rel="stylesheet" type="text/css" href="css/fontello.css">
</head>
<body>
	<header>
		<h2 class="titulo"><span>lonas</span> fortoflex</h2>
	</header>
	<h3>Bienvenido:<?php echo($filas(['nombre'];)?></h3>
<center>
	<div class="nav-bg">
		<nav class="navegacion-principal contenedor">
		<a href="cerrar_sesion.php">Cerrar Sesión</a>
		<a href="t_pedidos.php">pedidos</a>
        <a href="productos.php">introducir productos</a>
		<a href="roles.php">ver roles</a>
		<a href="modi.php">cambiar administrador</a>
	</nav>
	</div>
	</center>
</body>
</html>