<?php  

	session_start();
	include 'conexion.php';

	$consulta="SELECT * from roles";
	$resultado=mysqli_query($cone, $consulta);

	$varsesion=$_SESSION['nombre'];
if ($varsesion==null || $varsesion='') {
        # code...
    echo "Error en las credenciales de acceso";
    header("location:login.html");
    die();
}
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Roles</title>
	<link rel="stylesheet" type="text/css" href="estilo/tablas.css">
</head>
<body>
	<section class="contenedor">
		<header>
			<center>
				<h2>roles</h2>
			</center>
		</header>
		<section class="general">
			<center>
			<a href="admin.php">Regresar</a>
			<p>
			</center>
			<table >
				<tr>
					<td class="espacio1">Id</td>
					<td class="espacio1">nombre</td>				
				</tr>
				<?php while($rol=mysqli_fetch_array($resultado)){ ?>
				<tr>
					<td class="espacio"> <?php echo $rol['id_rol']?> </td>
					<td class="espacio"> <?php echo $rol['rol'] ?></td>
				</tr>
				<?php } ?>
			</table>
		</header>
	</section>
</section>
</body>
</html>