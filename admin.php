<html>
  <head>
    <meta charset="utf-8">
	<title>Admin</title>
  </head>
  <body>
<?php
  session_start();
  $admin=$_SESSION['usernameadmin'];
  $passwordadmin=$_SESSION['passwordadmin'];
  
  if(!isset($admin)){
	  header("location:login.php");
  }
  else{
   require("conection.php");
  $q = "SELECT * FROM productos";
  $sentencia=mysqli_query($conexion,$q);
	  
  echo  "<h1>Bienvenido $admin</h1>";
  echo "<a href='logout.php'>Salir</a>";
  echo "<h2>Ingresar un producto nuevo</h2>";
   }
?> 
  <form action="producto.php" method="post">
      <input type="text" name="imagen" placeholder="Imagen">
	  <input type="text" name="producto" placeholder="Nombre del producto">
	  <input type="text" name="precio" placeholder="Precio">
	  <input type="text" name="inventario" placeholder="Inventario">
	  <input type="submit" value="enviar">
  </form>
  <h2>Catalogo</h2>
  <table border="1">
    <tr>
	  <td></td>
	  <td><b>ID</b></td>
	  <td><b>Producto</b></td>
	  <td><b>Precio</b></td>
	  <td><b>Inventario</b></td>
	</tr>
	<?php while($productos = mysqli_fetch_array($sentencia)) {?>
	<tr>
	  <td><img src="<?php echo $productos['ruta_imagen']; ?>" width="200" height="200"></td>
	  <td><?php echo $productos['id_producto'];?></td>
	  <td><?php echo $productos['nombre_producto'];?></td>
	  <td><?php echo $productos['precio'];?></td>
	  <td><?php echo $productos['inventario'];?></td>
	  <td><a href="editar.php?id=<?php echo $productos['id_producto'] ?>">Editar</a></td>
	  <td><a href="borrar.php?id=<?php echo $productos['id_producto'] ?>">Borrar</a></td>
	</tr>
	<?php }?>
  </table>
  </body>
</html>
