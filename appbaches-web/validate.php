<?php
$username=$_POST['username'];
$password=$_POST['password'];

//conexion bd
$conexion=mysqli_connect("localhost", "root", "", "AppBaches");
$consulta="SELECT * FROM user WHERE Correo ='$username' and Password ='$password' and user_type = '0'";
$resultado=mysqli_query($conexion, $consulta);

$filas=mysqli_num_rows($resultado);

if ($filas > 0){
    header("location: panel.html");
}else {
    echo "Error en los datos ingresados. NO ADMIN";
    header("location: login.php");
}
mysqli_free_result($resultado);
mysqli_close($conexion);
