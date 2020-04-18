<html>
  <head>
    <meta charset="utf-8">
	<title>Carrito</title>
  </head>
  <body>
<?php
  require("conection.php");
  session_start();
  $usuario=$_SESSION['username'];
  $password=$_SESSION['password'];
  
   $con="SELECT COUNT(*) as contar FROM carrito WHERE id_usuario=SELECT id_usuario FROM usuarios WHERE usuario='$usuario'";
   
   $consulta=mysqli_query($conexion,$con);
   $array=mysqli_fetch_array($consulta);
  
  if(!isset($usuario)){
	  header("location:login.php");
  }else{
	    
       $q = "SELECT * FROM productos WHERE id_producto=SELECT id_producto FROM carrito WHERE id_usuario=SELECT id_usuario FROM usuarios WHERE usuario='$usuario'";
       $carrito=mysqli_query($conexion,$q);	   	   
	  
	  $total=0;
	  
  echo  "<h1>Bienvenido $usuario</h1>";
  echo "<a href='logout.php'>Salir</a><br><br>";
  }
?>
  <h2>Carrito</h2>
  <table border="1">
    <tr>
	  <td></td>
	  <td><b>Producto</b></td>
	  <td><b>Precio</b></td>
	  <td><b>Cantidad</b></td>
	</tr>
	<?php if($array['contar']>0){
		while($producto = mysqli_fetch_array($carrito)) {?>
	<tr>
	  <td><img src="<?php echo $producto['ruta_imagen'] ?>" width="200" height="200"></td>
	  <td><?php echo $producto['nombre_producto']?></td>
	  <td><?php echo $producto['precio']?></td>
	  <td><?php echo $producto['inventario']?></td>
	  <td><?php $cantidad=mysqli_query($conexion,"SELECT cantidad FROM carrito WHERE id_producto=$producto[id_producto] AND id_usuario=SELECT id_usuario FROM usuarios WHERE usuario='$usuario'");
	  $arrCan=mysqli_fetch_array($cantidad);
	  echo $arrCan[0] ?></td>
	  <td><a href="borrarCarrito.php?id=<?php echo $producto['id_producto'] ?>">Eliminar</a></td>
	</tr>
	<?php $total=$total+(($producto['precio'])*$arrCan[0]);}}?>
  </table>
  <?php
    echo($total);
  ?>
  <br><br>
  <form action="comprar.php" method="post">
	  <input type="submit" value="comprar">
  </form>
  </body>
</html>