<?php  
	session_start();

	include('conexion.php');


	//Valida si el compa esta en sesion o no
	$varsesion = $_SESSION['nombre'];
	if ($varsesion==null || $varsesion='') {
		# code...
		echo "Error en las credenciales de acceso";
		die();
	}
	//Consulta a la base de datos

	$consulta="SELECT * FROM productos";
	$resultado= mysqli_query($cone,$consulta);


	//Si el boton con el nombre registrar fue presionado
	if (isset($_REQUEST['registrar'])) {
		//Validamos que los camps que se trane sean mayores a 0?
		if (strlen($_REQUEST['producto']) >= 1 ) {
			$nombre=$_REQUEST['producto'];
					
			$sql ="INSERT INTO `productos` (`producto`) VALUES ('$nombre')";
	
			$repuesta = mysqli_query($cone, $sql);
			if ($repuesta == 1) {
				echo "<script>
				alert('Insertado correctamente');
				</script>";
			
				$consulta="SELECT * FROM productos";
				$resultado = mysqli_query($cone,$consulta);
			}else{
				print("Fallo al insertar datos");
			}
		}
	}

	if (isset($_REQUEST['actualizar'])) {
		$nombre=$_REQUEST['producto'];

		$id = $_REQUEST['id'];

		$sql ="UPDATE `productos` SET `producto`='$nombre'  WHERE (`id_productos`='$id')";	

		$r = mysqli_query($cone,$sql);
		if ($r ==  1) {
			echo "<script>
				alert('Actualizado correctamente');
				</script>";
			
		}

		$consulta="SELECT * FROM productos";
		$resultado = mysqli_query($cone,$consulta);
	}

	//Direcciones de las ligas Elimina registro
	if (isset($_REQUEST['eliminar'])) {
				
		//Obtemos el indentificador
		$eliminar=$_REQUEST['eliminar'];				
		mysqli_query($cone, "DELETE FROM `productos` WHERE (`id_productos`='$eliminar')");

		echo "<script>alert('producto eliminada');</script>";
		echo "<script>window.location='productos.php'</script>";

		$consulta="SELECT * FROM productos";
		$resultado= mysqli_query($cone,$consulta);
	}
	
	//Mostrar Producto en campos textbox
	if (isset($_REQUEST['update'])) {		

		$id_del_producto = $_REQUEST['update'];

		$sql ="SELECT * FROM productos WHERE id_productos ='$id_del_producto';";
		$update =	mysqli_fetch_object(mysqli_query($cone,$sql));	
				
	}
	//El objeto var_dump te permite ver completamente cualquier variable o objeto
	//var_dump($resultado); 

	$nfilas =  mysqli_num_rows($resultado);
	//var_dump($_REQUEST);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Mas productos</title>
	<link rel="stylesheet" type="text/css" href="estilo/tablas.css">
</head>
<body>
	<section class="contenedor">
		<header>
			<center>
				<h2>Mas productos</h2>
			</center>
		</header>

	<section class="general">
		<div id="form1">
			<center>
			<h3>Bienvenido(a):<?php echo $_SESSION['nombre']; ?> </h3>
			
			<h3><a href="admin.php">Regresar</a></h3>
			<form action="productos.php" method="POST" enctype="multipart/form-data">				
				
				<input style="display: none;" type="text" name="id" readonly <?php if(isset($_REQUEST['update'])){ echo "value='$update->id_productos'"; } ?> class="holder" size="20" ><br>
				<input type="text" name="producto" <?php if(isset($_REQUEST['update'])){ echo "value='$update->producto'"; } ?> class="holder" placeholder="Nombre" size="20" ><br/><br/>
						
				<input type="submit" <?php 
					if (isset($_REQUEST['update'])) {
						echo "name ='actualizar' value='actualizar'";
					}
					else
					{
						echo "name='registrar'";
					}?>>				
			</form>	
			</center>	
		</div>
		
	</section>
	<br/>
	<br/>
	
	<style>
	table, th, td {
	border: 1px solid black;
	}
	</style>
	<table  style="border: 1px solid black; width: 100%; margin: 5px; padding: 10px;">
			<tr style="text-align: center;">
				<td class="espacio">Clave producto</td>
				<td class="espacio">Nombre</td>				
				<td class="espacio">Eliminar</td>
				<td class="espacio">Modificar</td>
				
			</tr>
			
			
			<?php while ($productos = mysqli_fetch_array($resultado)) { ?>
			
			<tr style="text-align: center;">
				<td class="espacio"><a href="detalle_categoria.php?id_productos= <?php echo $productos['id_productos'];?>"> <?php echo $productos['id_productos']; ?></a></td>
				<td class="espacio"> <?php echo $productos['producto']; ?> </td>				
				<td><a href="productos.php?eliminar=<?php echo $productos['id_productos']?>">Eliminar</a></td>
				<td><a href="productos.php?update=<?php echo $productos['id_productos']?>">Modificar</a></td>							
			</tr>
		<?php } ?>
		</table>
		
	</section>
</body>
</html>