<?php  

	session_start();
	include 'conexion.php';

$varsesion=$_SESSION['nombre'];
if ($varsesion==null || $varsesion='') {
        # code...
    echo "Error en las credenciales de acceso";
    header("location:login.html");
    die();
}
    
	$sql="SELECT us.nombre, us.correo, us.telefono, 
	pro.producto, 
	pe.id_pedidos,pe.cantidad, pe.foto, pe.alto, pe.ancho,pe.largo, pe.color, pe.calle
	from pedidos pe
	INNER JOIN usuarios us ON pe.id_usuarios = us.id_usuarios
	INNER JOIN productos pro ON pe.id_productos = pro.id_productos";

	$consulta=$cone->query($sql);
	

//si el papu presiona eliminar se elimina >:v 	
if (isset($_REQUEST['eliminar'])) {
		# code...
		$eliminar=$_REQUEST['eliminar'];
		mysqli_query($cone, "DELETE FROM pedidos where id_pedidos=$eliminar");
		echo "<script>alert('Registro eliminado');</script>";

		echo "<script>window.location='comentarios.php'</script>";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tabla de pedidos</title>
	<link rel="stylesheet" type="text/css" href="estilo/tablas.css">
</head>
<body>
	<section class="contenedor">
		<header>
			<center>
				<h2>Table de pedidos</h2>
			</center>
		</header>
		<center>
			<a href="admin.php">Regresar</a>
		</center>
		<section class="general">
			<table class="tabla">
				<tr>
					<td class="espacio">Id</td>
					<td class="espacio">nombre</td>
					<td class="espacio">producto</td>
					<td class="espacio">cantidad</td>
					<td class="espacio">foto</td>
					<td class="espacio">alto</td>
					<td class="espacio">ancho</td>
					<td class="espacio">largo</td>
					<td class="espacio">color</td>
					<td class="espacio">calle</td>
					<td class="espacio">correo</td>
					<td class="espacio">telefono</td>
					<td class="espacio">borrar pedidos</td>
					
				</tr>
				<?php while($pedido=mysqli_fetch_array($consulta)){ ?>
				<tr>
					<td class="espacio"> <?php echo $pedido['id_pedidos']?> </td>
					<td class="espacio"> <?php echo $pedido['nombre'] ?></td>
					<td class="espacio"> <?php echo $pedido['producto'] ?></td>
					<td class="espacio"> <?php echo $pedido['cantidad']?> </td>
					<td class="espacio"><img src="<?php echo $productos['foto'];?>" width="50" heigth="50" alt="foto"></td>
					<td class="espacio"> <?php echo $pedido['alto'] ?></td>
					<td class="espacio"> <?php echo $pedido['ancho']?> </td>
					<td class="espacio"> <?php echo $pedido['largo'] ?></td>
					<td class="espacio"> <?php echo $pedido['color'] ?></td>
					<td class="espacio"> <?php echo $pedido['calle']?> </td>
					<td class="espacio"> <?php echo $pedido['correo']?> </td>
					<td class="espacio"> <?php echo $pedido['telefono'] ?></td>
					<td class="espacio"><a href="t_pedidos.php?eliminar=<?php echo $pedido['id_pedidos']; ?> "> Eliminar</a></td>
				<?php } ?>
			</table>
		</header>
	</section>
</section>

</body>
</html>