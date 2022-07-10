<?php
include 'conexion.php';
session_start();

$varsesion=$_SESSION['nombre'];
if ($varsesion==null || $varsesion='') {
        # code...
    echo "Error en las credenciales de acceso";
    header("location:login.html");
    die();
}


   /* $consulta="SELECT * from pedidos";
    $resultado=mysqli_query($cone, $consulta);
    
    //para que traiga los valores al formulario 
if (isset($_REQUEST['editar'])) {
        # code...
    $editar=$_REQUEST['editar'];
    $registros=mysqli_query($cone, "SELECT * FROM pedidos WHERE id_pedidos=$editar");
    $rec=mysqli_fetch_array($registros);
}

if (isset($_REQUEST['eliminar'])) {
        # code...
    $eliminar=$_REQUEST['eliminar'];
    mysqli_query($cone, "DELETE FROM pedidos WHERE id_pedidos=$eliminar");
    echo '<script>alert("pedido eliminado");</script>';
    echo "<script>window.location='pedidos.php'</script>";
}

if (isset($_REQUEST['Ingresar'])) {
    $id_pedidos=$_REQUEST['id_pedidos'];
    $id_usuarios=$_REQUEST['id_usuarios'];
    $id_productos=$_REQUEST['descripcion'];
    $cantidad=$_REQUEST['cantidad'];
    $ruta= "img/".$_FILES['foto']['name'];          
    move_uploaded_file($_FILES['foto']['tmp_name'], $ruta);
    $alto=$_REQUEST['alto'];
    $ancho=$_REQUEST['ancho'];
    $largo=$_REQUEST['largo'];
    $calle=$_REQUEST['calle'];
}


    //actualiza registro
if (isset($_REQUEST['id_usuarios'])){ 
  $query = "UPDATE usuarios Set  WHERE id_pedidos = '$id_pedidos'";
  $result = mysqli_query($cone,$query);
  if(!$result){
    die('consulta fallida');
  }
        echo "<script>alert('se actualizo su pedido')</script>";
        echo "<script>window.location='pedidos.php'</script>";
  } */

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Pedidos</title>
    <link rel="stylesheet" type="text/css" href="estilo/pedido.css">
</head>
<body>
    <div id="contenido">
        <div id="centrado">
            <div id="registro">
                <center>
                     <h1>Pedidos</h1>
                     <p>
                </center>

  <form method="POST" onsubmit="return pedidosjs()">
<p>  
<!-- aqui llenamos un select por medio de la base de datos-->  
      <div>   
      <label for="id_productos">
      <select name="id_productos" <?php if(isset($_REQUEST['editar'])){ echo "value='".$reg['id_productos']."'";} ?> id="id_productos">
        <option value="0">Elija una opcion</option>
        <?php
          $query = $cone -> query ("SELECT * FROM productos");
          while ($product = mysqli_fetch_array($query)) {
            echo '<option value="'.$product['id_productos'].'">'.$product['producto'].'</option>';
          }
        ?>
      </select>
      </label>
  </div>
  <!-- aqui termina-->  
<p>
 <h4>Introdusca una cantidad</h4>
    <input type="number" name="cantidad" id="cantidad" <?php if(isset($_REQUEST['editar'])){ echo "value='".$rec['cantidad']."'";}?> placeholder="introdusca la cantidad">
    <h4>Introduca un diceño</h4>
        <input type="file" name="foto" id="foto">
            <p>
<h4>Introdusca las medidas</h4>
<input type="text" name="alto" id="alto" <?php if(isset($_REQUEST['editar'])){ echo "value='".$rec['alto']."'";}?> placeholder="introdusca el alto">
<p>
    <input type="text" name="ancho" id="ancho" <?php if(isset($_REQUEST['editar'])){ echo "value='".$rec['ancho']."'";}?> placeholder="introdusca el ancho">
    <p>
        <input type="text" name="largo" id="largo" <?php if(isset($_REQUEST['editar'])){ echo "value='".$rec['alto']."'";}?> placeholder="introdusca el largo">
<p>
    <h4>Elija un color</h4>
    <input type="text" name="color" id="color" <?php if(isset($_REQUEST['editar'])){ echo "value='".$rec['color']."'";}?> placeholder="ingrese un color">
            <h4>en caso de ser toldos,carpas,cortinas</h4>
            <h4>y anucios luminosos introdusca una calle</h4>
                <input type="text" name="calle" id="calle" <?php if(isset($_REQUEST['editar'])){ echo "value='".$rec['id_rol']."'";}?> placeholder="introdusca una calle">
                <p>
                <h4>ingrese su numero telefonico</h4>
                <p>
            <input type="submit" name="Ingresar" id="Ingresar">
                <p>
                   <a href="index.html">volver</a> 
  </form>
            </div>          
        </div>
    </div>

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
<script src="js/pedidos.js"></script>
</body>
</html>