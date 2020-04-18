<html>
  <head>
    <meta charset="utf-8">
	<title>Comprar</title>
  </head>
  <body>
<?php
  require("conection.php");
  session_start();
  $usuario=$_SESSION['username'];
  $password=$_SESSION['password'];
  
  
  
  if(!isset($usuario)){
	  header("location:login.php");
  }else{
	     $q="SELECT COUNT(*) as contar FROM carrito WHERE id_usuario=SELECT id_usuario FROM usuarios WHERE usuario='$usuario'";
   
         $consulta=mysqli_query($conexion,$q);
		 
         $array=mysqli_fetch_array($consulta);
         $carrito=mysqli_query($conexion,"SELECT * FROM carrito WHERE id_usuario=SELECT id_usuario FROM usuarios WHERE usuario='$usuario'");
		 
      if($array['contar']>0){
		while($producto = mysqli_fetch_array($carrito)) {
			$a=mysqli_query($conexion,"INSERT INTO ventas(id_producto,id_usuario) VALUES('$producto[id_producto]','$producto[id_usuario]')");
	  }
	  $del=mysqli_query($conexion,"DELETE * FROM carrito WHERE id_usuario=SELECT id_usuario FROM usuarios WHERE usuario='$usuario'");
	  if($a && $del){
		  echo("Gracias por su compra");
	  }else{
		  echo("Error");
	  }
	}
	?>
  </body>
</html>