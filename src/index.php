<?php
    $servidor = "db";
    $usuario = "root";
    $clave = "localhost";
    $baseDeDatos = "vulnerable";

    $enlace = mysqli_connect ($servidor,$usuario,$clave,$baseDeDatos);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Hola mundo</title>
</head>
<body>
    <section class="form-register">
        <h4>Formulario Registro</h4>
            <form action="#" name="Datos" method="post">
            <input class="controls" type="text" name="user" placeholder="User">
            <input class="controls" type="password" name="pass" placeholder="Password">
            <input class="botons" type="submit" name="Registrar">
            <a href="inicio.php"><p>Ya tengo cuenta</p></a>
    </section>
</body>


<?php

if(isset($_POST['Registrar'])){

    $user = $_POST['user'];
    $pass = $_POST['pass'];

    $insertarDatos = "INSERT INTO datos (user, pass) VALUES ('$user','$pass')";

    $ejecutarInsertar = mysqli_query($enlace, $insertarDatos);

}

?>

</html>
