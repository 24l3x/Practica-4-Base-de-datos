#Practica 4.1 SLQ injection

En esta practica lo que se busca es aprender a identificar las vulnerabilidades en el codigo al momento de conectar una base de datos a una pagina de internet, asi mismo, saber como solucionar dichos errores.


![](https://img.shields.io/github/tag/24l3x/Practica-4-Base-de-datos/src/inicio.php) 



####Conectar la base de datos a una pagina web con PHP

Teniendo la pagina html creada, podriamos tener un archivo especifico o antes de usar "<!DOCTYPE html>" pondremos el siguiente codigo:

 	<?php
    	$servidor = "db";
    	$usuario = "user";
    	$clave = "localhost";
    	$baseDeDatos = "vulnerable";

    	$enlace = mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);
    	if (!$enlace) {
        	die("Error de conexión: " . mysqli_connect_error());
    	}
	?>
Donde **$servidor** es para el host que tengamos en nuestra pagina de internet, **$usuario** es para el usuario con el que podremos hacer consultas a la base de datos, si es un registro poner el usuario root, pero si es inicio de sesion poner un usuario cualqueira; **$clave** es para la clave que tenga asociada dicho usuario ya sea root o normal; y finalmente **$baseDeDatos** es el nombre de la base de datos.

#### Hacer el llenado de la base de datos con un form de html
 Antes que nada, debe haber algun `<form action="#" name="Datos" method="post">` para poder mandarlo con php, asi mismo cada uno de los input debe tener su nombre bien asignado **name="Holamundo"**, por ejemplo `<input class="controls" type="text" name="user" placeholder="User">` sea el tipo de input que sea.
 Teniendo esto, usaremos el siguiente codigo de php:
 

    <?php
   		if(isset($_POST['Registrar'])){
        	$user = $_POST['user'];
        	$pass = $_POST['pass'];
        	$insertarDatos = "INSERT INTO datos (user, pass) VALUES ('$user','$pass')";
        	$ejecutarInsertar = mysqli_query($enlace, $insertarDatos);
    	}  
    ?>

###End
