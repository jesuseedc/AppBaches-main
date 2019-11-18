<?php
$username="root";
$password="";
$database="appbaches";

$connection=mysqli_connect ('localhost', $username, $password);
if (!$connection) {  die('Not connected : ' . mysql_error());}

// Set the active MySQL database

$db_selected = mysqli_select_db($connection, $database);
if (!$db_selected) {
    die ('Can\'t use db : ' . mysqli_error());
}


$idg=$_GET['txtid'];
$status=$_GET['opcion'];
if($status!=null){
$insert="UPDATE reporte SET estatus='".$status."' WHERE id='".$idg."'";
mysqli_query($connection, $insert);
if ($status=1){
    header("location:mgmt_reportes.php");
}
}

?>