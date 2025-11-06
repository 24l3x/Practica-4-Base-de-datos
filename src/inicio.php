<?php
    $servidor = "db";
    $usuario = "user"; // Corregido como en el paso anterior
    $clave = "localhost";
    $baseDeDatos = "vulnerable";

    $enlace = mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);
    if (!$enlace) {
        die("Error de conexión: " . mysqli_connect_error());
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Login Vulnerable</title>
</head>
<body>
    <section class="form-register">
        <h4>Robo</h4>
            <form action="" method="post">
            <input class="controls" type="text" name="user" placeholder="Usuario">
            <input class="controls" type="password" name="pass" placeholder="Contraseña">
            <input class="botons" type="submit" name="login" value="Iniciar Sesión">
        </form>

<?php
if(isset($_POST['login'])){
    $user = $_POST['user'];//se le asocia a la variable user lo que sea que el usuario haya escrito en el formulario
    $pass = $_POST['pass'];//se le asocia a la variable pass lo que sea que el usuario haya escrito en el formulario
    $consulta = "SELECT * FROM datos WHERE user = '$user' AND pass = '$pass'";//manda un query a la tabla datos
        //el cual compara con todas las filas que tenga la base de datos buscando los que el usuario escribio
    $resultado = mysqli_query($enlace, $consulta);

    if(mysqli_num_rows($resultado) > 0){
        $fila = mysqli_fetch_assoc($resultado);
        echo "<h3>¡Bienvenido, " . $fila['user'] . "! Has iniciado sesión correctamente.</h3>";
    } else {
        echo "<h3>Error: Usuario o contraseña incorrectos.</h3>";
    }
}
?>
    
    </section>
</body>
</html>
