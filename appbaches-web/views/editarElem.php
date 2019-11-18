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
$query="SELECT * FROM reporte WHERE id='" . $id . "'";
$resultado = mysqli_query($connection, $query);

    while ($filas=mysqli_fetch_assoc($resultado)) {
        
?>
<div>
    <form action="editstat.php" method="GET">
        <input type="hidden" name="txtid" value="<?php echo $filas['id'] ?>">
        <label>Estatus: 
        <?php 
        if($filas['estatus'] == 1) { echo '¡Caso resuelto!'; }
        else if($filas['estatus'] == 2) { echo 'Caso en proceso.'; }
        else{ echo 'Caso sin revisar.'; } 
        ?> </label><br>
        <label>Cambiar a: </label><br><br>
        <select name="opcion">
            <option value="1">¡Caso resuelto!</option>
            <option value="2">Caso en proceso</option>
            <option value="3">Caso sin revisar</option>
        </select><br><br>
        <input type="submit" name "" value="Actualizar">
        <a href="mgmt_reportes.php">Regresar</a>
    </form>
    <?php } ?>
</div>
