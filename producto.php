<?php
  include("conection.php");
  include("admin.php");
  
  function buscaRepetido($producto,$conexion){
	  $sql="SELECT * from productos where nombre_producto='$producto'";
	  $result=mysqli_query($conexion,$sql);
	  
	  if(mysqli_num_rows($result)>0){
		  return 1;
	  }
	  else{
		  return 0;
	  }
  }
  
   if(ISSET($_POST['producto']) && !empty($_POST['producto']) && 
	   ISSET($_POST['precio']) && !empty($_POST['precio']) && 
	   ISSET($_POST['inventario']) && !empty($_POST['inventario']) && 
	   ISSET($_POST['imagen']) && !empty($_POST['imagen'])){
		
		   $imagen=$_POST['imagen'];
		   $producto=$_POST['producto'];
		   $precio=$_POST['precio'];
		   $inventario=$_POST['inventario'];
		   
		   if(buscaRepetido($producto,$conexion)==0){
		   
		   mysqli_query($conexion,("INSERT INTO productos(nombre_producto,precio,inventario,ruta_imagen) VALUES('$producto','$precio','$inventario','$imagen')"));
		   header("location:admin.php");
		   }
		   else{
			   echo "Ya existe ese producto";
		   }
	   }
	   else{
		   echo "Error al crear producto";
	   }
?>