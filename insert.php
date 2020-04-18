<?php
  include("conection.php");
  include("signup.php");
  
  function buscaRepetido($usuario,$conexion){
	  $sql="SELECT * from usuarios where usuario='$usuario'";
	  $result=mysqli_query($conexion,$sql);
	  
	  if(mysqli_num_rows($result)>0){
		  return 1;
	  }
	  else{
		  return 0;
	  }
  }
  
   if(ISSET($_POST['usuario']) && !empty($_POST['usuario']) && 
	   ISSET($_POST['password']) && !empty($_POST['password']) && 
	   ISSET($_POST['conpassword']) && !empty($_POST['conpassword']) && 
	   $_POST['password']===$_POST['conpassword']){
		
		   $usuario=$_POST['usuario'];
		   $password=md5($_POST['password']);
		   
		   if(buscaRepetido($usuario,$conexion)==0){
		   
		   mysqli_query($conexion,("INSERT INTO usuarios(usuario,contraseña,id_permiso) VALUES('$usuario','$password',1)"));
		   echo "Usuario creado";
		   }
		   else{
			   echo "Ya existe alguien con ese nombre de usuario";
		   }
	   }
	   else{
		   echo "Error al crear usuario";
	   }
?>