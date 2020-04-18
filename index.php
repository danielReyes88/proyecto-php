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
	<title>Bienvenido</title>
  </head>
  <body>
    <?php require 'partials/header.php' ?>
    <h1>Por favor ingresa o registrate</h1>
	<a href="signup.php">Registrarse</a> o
	<a href="login.php">ingresar</a>
  </body>
</html>