<html>
  <head>
    <meta charset="utf-8">
	<title>Editar</title>
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
	  if(!isset($_GET['id'])){
		  header("location:admin.php");
	  }
   require("conection.php");
  echo  "<h1>Bienvenido $admin</h1>";
  echo "<a href='admin.php'>Inicio</a>";
   }
?> 
  
  <form action="editar.php?id=<?php echo $_GET['id'] ?>" method="post">
      <br>
      <input type="text" name="imagen" placeholder="Imagen">
	  <input type="text" name="producto" placeholder="Nombre del producto">
	  <input type="text" name="precio" placeholder="Precio">
	  <input type="text" name="inventario" placeholder="Inventario">
	  <input type="submit" value="editar">
  </form>
  <?php 
    if(!empty($_POST['imagen'])){
		 $imagen=mysqli_query($conexion,("UPDATE productos SET ruta_imagen='$_POST[imagen]' where id_producto='$_GET[id]'"));
	}
	if(!empty($_POST['producto'])){
		 $producto=mysqli_query($conexion,("UPDATE productos SET nombre_producto='$_POST[producto]' where id_producto='$_GET[id]'"));
	}
	if(!empty($_POST['precio'])){
		 $precio=mysqli_query($conexion,("UPDATE productos SET precio='$_POST[precio]' where id_producto='$_GET[id]'"));
	}
	if(!empty($_POST['inventario'])){
		 $inventario=mysqli_query($conexion,("UPDATE productos SET inventario='$_POST[inventario]' where id_producto='$_GET[id]'"));
	}
	
	$consulta=mysqli_query($conexion,"SELECT * FROM productos WHERE id_producto='$_GET[id]'");
    $array=mysqli_fetch_array($consulta);
	
	echo("ID: ".$array['id_producto']."<br><br>");
	echo("Nombre: ".$array['nombre_producto']."<br><br>");
	echo("Precio: ".$array['precio']."<br><br>");
	echo("Inventario: ".$array['inventario']."<br><br>");
	echo("Imagen: ".$array['ruta_imagen']."<br><br>");
  ?>
  </body>
</html>