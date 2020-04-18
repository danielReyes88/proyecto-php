<?php
  session_start();
  session_destroy();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" href="assets/css/style.css">
	<title>SignUp</title>
  </head>
  <body>
    <?php require 'partials/header.php' ?>
	
	<h1>Registrate<h1>
	<span>o <a href="login.php">ingresar</a></span>
	<form action="insert.php" method="post">
	  <input type="text" name="usuario" placeholder="Ingresa tu nombre de usuario">
	  <input type="password" name="password" placeholder="Ingresa tu contraseña">
	  <input type="password" name="conpassword" placeholder="Confirma tu contraseña">
	  <input type="submit" value="enviar">
	</form>
  </body>
</html>