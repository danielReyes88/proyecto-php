<html>
  <head>
    <meta charset="utf-8">
	<title>User</title>
  </head>
  <body>
<?php
  session_start();
  $usuario=$_SESSION['username'];
  $password=$_SESSION['password'];
  $id;
  
  if(!isset($usuario)){
	  header("location:login.php");
  }else{
	   require("conection.php");
       $q = "SELECT * FROM productos";
       $sentencia=mysqli_query($conexion,$q);
	  
  echo  "<h1>Bienvenido $usuario</h1>";
  echo "<a href='logout.php'>Salir</a><br><br>";
  }
?>
  <h2>Catalogo</h2>
  <table border="1">
    <tr>
	  <td></td>
	  <td><b>Producto</b></td>
	  <td><b>Precio</b></td>
	  <td><b>Inventario</b></td>
	</tr>
	<?php while($productos = mysqli_fetch_array($sentencia)) {?>
	<tr>
	  <td><img src="<?php echo $productos['ruta_imagen'] ?>" width="200" height="200"></td>
	  <td><?php echo $productos['nombre_producto'];?></td>
	  <td><?php echo $productos['precio'];?></td>
	  <td><?php echo $productos['inventario'];?></td>
	   <td><a href="agregarCarrito.php?id=<?php echo $productos['id_producto'] ?>">Agregar al carrito</a></td>
	</tr>
	<?php }?>
  </table>
  <br><br>
  <a href="carrito.php">ir al carrito</a>
  </body>
</html>