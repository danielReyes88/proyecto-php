<?php
   require ('conection.php');
   require ('login.php');
   session_start();
   $usuario=$_POST['usuario'];
   $password=md5($_POST['password']);
   
   $q="SELECT COUNT(*) as contar FROM usuarios WHERE usuario='$usuario' and contraseña='$password'";
   $consulta=mysqli_query($conexion,$q);
   $array=mysqli_fetch_array($consulta);
   
   $per="SELECT * FROM usuarios WHERE usuario='$usuario' and contraseña='$password'";
   $consulta1=mysqli_query($conexion,$per);
   $array1=mysqli_fetch_array($consulta1);
   
   $cl=mysqli_query($conexion,"SELECT id_permiso FROM permisos WHERE nombre_permiso='cliente'");
   $ad=mysqli_query($conexion,"SELECT id_permiso FROM permisos WHERE nombre_permiso='administrador'");
   
   $cliente=mysqli_fetch_array($cl);
   $admin=mysqli_fetch_array($ad);
   
   if($array['contar']>0){
	   if($array1['id_permiso']==$cliente[0]){
	   $_SESSION['username']=$usuario;
	   $_SESSION['password']=$password;
	   header("location:user.php");
	   }
	   else if($array1['id_permiso']==$admin[0]){
		   $_SESSION['usernameadmin']=$usuario;
	       $_SESSION['passwordadmin']=$password;
	       header("location:admin.php");
	   }
   }else{
	   echo"Datos incorrectos";
   }
?>
