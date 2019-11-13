<?php
$Correo=$_POST['Correo'];
$Password=$_POST['Password'];

//conexion bd
$conexion=mysqli_connect("localhost", "root", "", "appbaches");
$consulta="SELECT * FROM user WHERE Correo='$Correo' and Password='$Password' and user_type ='0'";
$resultado=mysqli_query($conexion, $consulta);

$filas=mysqli_num_rows($resultado);

if ($filas > 0){
    header("location: panel.html");
}else {
    echo "Error en los datos ingresados.";
}
mysqli_free_result($resultado);
mysqli_close($conexion);
