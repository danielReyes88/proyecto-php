<?php
  require("conection.php");
  session_start();
  $usuario=$_SESSION['username'];
  $password=$_SESSION['password'];
  
  if(!isset($usuario) || !isset($_GET['id'])){
	  header("location:login.php");
  }else{
	  $id=$_GET['id'];
	  $DELETE=mysqli_query($conexion,"DELETE * FROM carrito WHERE id_producto='$id' AND id_usuario=SELECT id_usuario FROM usuarios WHERE usuario='$usuario'");
	  if($DELETE){
		  echo("Producto borrado del carrito");
	  }else{
		  echo("Error");
	  }
  }
?>