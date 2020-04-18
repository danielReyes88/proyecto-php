<?php
  require("conection.php");
  session_start();
  $admin=$_SESSION['usernameadmin'];
  $passwordadmin=$_SESSION['passwordadmin'];
  
  if(!isset($admin)){
	  header("location:login.php");
  }else{
	  $q="SELECT COUNT(*) as contar FROM productos WHERE id_producto='$_GET[id]' ";
   
      $consulta=mysqli_query($conexion,$q);
      $array=mysqli_fetch_array($consulta);
   
       if($array['contar']>0){
		  $producto=mysqli_query($conexion,"DELETE * FROM productos WHERE id_producto='$_GET[id]'");
	      $carrito=mysqli_query($conexion,"DELETE * FROM carrito WHERE id_producto='$_GET[id]'");
	      if($producto && $carrito){
		   echo("Producto eliminado");
	       }else{
		      echo("Error");
	      } 
	   }else{
		    header("location:admin.php");
	   }
       
  }
?>