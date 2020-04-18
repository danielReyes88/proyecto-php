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
	<title>Login</title>
  </head>
  <body>
    <?php require 'partials/header.php' ?>
    <h1>Ingresa</h1>
	<span>o <a href="signup.php">registrate</a></span>
    <form action="sesion.php" method="post">
	  <input type="text" name="usuario" placeholder="Ingresa tu usuario">
	  <input type="password" name="password" placeholder="Ingresa tu contraseña">
	  <input type="submit" value="enviar">
	</form>
	<p>Usuario administrador:admin</p>
	<p>Contraseña administrador:admin</p>
  </body>
</html>