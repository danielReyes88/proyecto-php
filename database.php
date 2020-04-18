<?php  
  $servidor="localhost";
  $nombreusuario="root";
  $password="";
  $db="sistemaVentas";
  
  $conexion=new mysqli($servidor,$nombreusuario,$password);
  
  if($conexion->connect_error){
	  die("conexion fallida" . $conexion->connect_error);
  }
  
  $sql="CREATE DATABASE sistemaVentas";
  if($conexion->query($sql)===true){
	  echo "Base de datos creada correctamente";
  }
  else
	  die("Error al crear base de datos". $conexion->error);
  
  $conexion=new mysqli($servidor,$nombreusuario,$password,$db);
  
  $permisos="CREATE TABLE permisos(
  id_permiso INT(1)PRIMARY KEY,
  nombre_permiso VARCHAR(100) 
  )";
  
  if($conexion->query($permisos)===true){
	  echo "Tabla permisos creada correctamente";
  }
  else
	  die("Error al crear tabla permisos". $conexion->error);
  
  $usuarios="CREATE TABLE usuarios(
  id_usuario INT(11) AUTO_INCREMENT PRIMARY KEY,
  usuario VARCHAR(100) NOT NULL,
  contraseña VARCHAR(100) NOT NULL,
  id_permiso INT(1),
  FOREIGN KEY (id_permiso) REFERENCES permisos(id_permiso) 
  )";
  
  if($conexion->query($usuarios)===true){
	  echo "Tabla usuarios creada correctamente";
  }
  else
	  die("Error al crear tabla usuarios". $conexion->error);
  
  $productos="CREATE TABLE productos(
  id_producto INT(10) AUTO_INCREMENT PRIMARY KEY,
  nombre_producto VARCHAR(100), 
  inventario INT(10),
  precio INT(20),
  ruta_imagen VARCHAR(300)
  )";
  
  if($conexion->query($productos)===true){
	  echo "Tabla productos creada correctamente";
  }
  else
	  die("Error al crear tabla productos". $conexion->error);
  
  $ventas="CREATE TABLE ventas(
  id_venta INT(10) AUTO_INCREMENT PRIMARY KEY,
  id_producto INT(10),
  id_usuario INT(11),
  FOREIGN KEY (id_producto) REFERENCES productos(id_producto),
  FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario)
  )";
  
  if($conexion->query($ventas)===true){
	  echo "Tabla ventas creada correctamente";
  }
  else
	  die("Error al crear tabla ventas". $conexion->error);
  
  $carrito="CREATE TABLE carrito(
  id_producto INT(10),
  id_usuario INT(11),
  cantidad INT(7),
  FOREIGN KEY (id_producto) REFERENCES productos(id_producto),
  FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario)
  )";
  
  if($conexion->query($carrito)===true){
	  echo "Tabla carrito creada correctamente";
  }
  else
	  die("Error al crear tabla carrito". $conexion->error);
  
  $password=md5('admin');
  mysqli_query($conexion,("INSERT INTO permisos(id_permiso,nombre_permiso) VALUES(1,'cliente')"));
  mysqli_query($conexion,("INSERT INTO permisos(id_permiso,nombre_permiso) VALUES(2,'administrador')"));
  mysqli_query($conexion,("INSERT INTO usuarios(usuario,contraseña,id_permiso) VALUES('admin','$password',2)"));
?>