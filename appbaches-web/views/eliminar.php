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

$id=$_GET['id'];
$query="DELETE FROM reporte WHERE id='".$id."'";
mysqli_query($connection, $query);
header('location:mgmt_reportes.php');

?>