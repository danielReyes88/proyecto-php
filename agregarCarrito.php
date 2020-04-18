<?php
  require("conection.php");
  session_start();
  $usuario=$_SESSION['username'];
  $password=$_SESSION['password'];
  
  if(!isset($usuario)){
	  header("location:login.php");
  }else{
	  $q="SELECT COUNT(*) as contar FROM productos WHERE id_producto='$_GET[id]'";
   
      $consulta=mysqli_query($conexion,$q);
      $array=mysqli_fetch_array($consulta);
	  
	   $p=mysqli_query($conexion,"SELECT inventario FROM productos WHERE id_producto='$_GET[id]'");
	   $inv=mysqli_fetch_array($p);
	  
	   $inventario=$inv[0]; 
	   $nuevoInventario=$inventario-1;
   
       if($array['contar']>0 && $inventario>0){
	  
       $consulta=mysqli_query($conexion,"SELECT id_usuario FROM usuarios WHERE usuario='$usuario'");
	   $idUsuario=mysqli_fetch_array($consulta);
	   $ID=$idUsuario[0];
	   
	   $query=mysqli_query($conexion,"SELECT COUNT(*) as exist FROM carrito WHERE id_producto='$_GET[id]' AND id_usuario='$ID'");
	   $proEx=mysqli_fetch_array($query);
	   
	   if($proEx['exist']==0){
	      $insertar=mysqli_query($conexion,"INSERT INTO carrito(id_usuario,id_producto,cantidad) VALUES('$ID','$_GET[id]',1)");
	   }else if($proEx['exist']>0){
		   $consultaCantidad=mysqli_query($conexion,"SELECT cantidad FROM carrito WHERE id_producto='$_GET[id]' AND id_usuario='$ID'");
		   $arrayCantidad=mysqli_fetch_array($consultaCantidad);
		   $nuevaCantidad=$arrayCantidad[0]+1;
		   
		   $insertar=mysqli_query($conexion,"UPDATE carrito SET cantidad='$nuevaCantidad' WHERE id_producto='$_GET[id]' AND id_usuario='$ID'");
	   }
	   $dis=mysqli_query($conexion,"UPDATE productos SET inventario='$nuevoInventario' WHERE id_producto='$_GET[id]'");
	   if($insertar && $dis){
		   echo("Producto agregado al carrito");
	   }else{
		   echo("Error");
	    }
	   }else{
		   header("location:user.php");
	  }
  }
?>