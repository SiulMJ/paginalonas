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

	$consulta="SELECT * from usuarios";
	$resultado=mysqli_query($cone, $consulta);
	
	//para que traiga los valores al formulario 
if (isset($_REQUEST['editar'])) {
		# code...
	$editar=$_REQUEST['editar'];
	$registros=mysqli_query($cone, "SELECT * FROM usuarios WHERE id_usuarios=$editar");
	$rec=mysqli_fetch_array($registros);
}

if (isset($_REQUEST['eliminar'])) {
		# code...
	$eliminar=$_REQUEST['eliminar'];
	mysqli_query($cone, "DELETE FROM usuarios WHERE id_usuarios=$eliminar");
	echo '<script>alert("usuario eliminado");</script>';
	echo "<script>window.location='modi.php'</script>";
}


	//actualiza registro
if (isset($_REQUEST['id_usuarios'])){ 

  $id_usuarios =  $_POST['id_usuarios'];
  $id_rol = $_POST['id_rol'];

  $query = "UPDATE usuarios Set id_rol = '$id_rol' WHERE id_usuarios = '$id_usuarios'";
  $result = mysqli_query($cone,$query);
  if(!$result){
  	die('consulta fallida');
  }
        echo "<script>alert('Administrador agregado')</script>";
		echo "<script>window.location='modi.php'</script>";
  }	
?>
<!DOCTYPE html>
<html>
<head>
	<title>usuarios</title>
	<link rel="stylesheet" type="text/css" href="estilo/tablas.css">
</head>
<body>
	<section class="contenedor">
		<center>
				<header>
			<h2>usuarios</h2>
		</header>
		<section class="general">
			<a href="admin.php">Regresar</a>
<p>
			<form action="modi.php" method="POST" enctype="multipart/form-data" >
				<input type="number" name="id_rol" <?php if(isset($_REQUEST['editar'])){ echo "value='".$rec['id_rol']."'";}?>class="holder"  placeholder="id_rol" min="1" max="2"><br/>

				<?php 
				if (isset($_REQUEST['editar'])) { echo "<input type='hidden' name='id_usuarios' value='".$rec['id_usuarios']."'>";}
						# code...
				?>

				<input type="submit" <?php if(isset($_REQUEST['editar'])){ echo "value='Guardar'";} else{ "value='Insertar"; } ?> id="boton">
			</form>
</center>
<p>
			<table >
				<tr>
					<td class="espacio1">Id</td>
					<td class="espacio1">Nombre</td>
					<td class="espacio1">rol</td>
					<td class="espacio1">borrar usuario</td>
					<td class="espacio1">Cambiar rol</td>
				</tr>
				<?php while($usuarios=mysqli_fetch_array($resultado)){ ?>
				<tr>
					<td class="espacio"> <?php echo $usuarios['id_usuarios']?> </td>
					<td class="espacio"> <?php echo $usuarios['nombre'] ?></td>
					<td class="espacio"> <?php echo $usuarios['id_rol']?> </td>
					<td class="espacio"><a href="modi.php?eliminar=<?php echo $usuarios['id_usuarios']; ?> " >borrar</a></td>
					<td class="espacio"><a href="modi.php?editar=<?php echo $usuarios['id_usuarios']; ?> "> Cambiar rol</a></td>
				</tr>
				<?php } ?>
			</table>
		</header>
	</section>
</section>
</body>
</html>