<!DOCTYPE html>
<html lang=en>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administrador de reportes</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">

        #menu ul li{
        display: inline;
        }

        #menu ul li a{
        color: #1E69E3;
        text-decoration: none;
        }

        #menu ul li a:hover{
        color: rgb(227, 109, 30);
        text-decoration: none;
        }

        .btnmenu{
            float: left;
        }
        .title-box {
            padding: 3rem 1.5rem 2rem;
            text-align: center;
        }

        body {
            color: #566787;
            background: #f5f5f5;
            font-family: 'Varela Round', sans-serif;
            font-size: 13px;
        }
        .table-wrapper {
            background: #fff;
            padding: 20px 25px;
            margin: 30px 0;
            border-radius: 3px;
            box-shadow: 0 1px 1px rgba(0,0,0,.05);

        table.table tr th, table.table tr td {
            border-color: #e9e9e9;
            padding: 12px 15px;
            vertical-align: middle;
        }
        .table-title .btn-group {
		float: right;
	}
        .table-title .btn {
            color: #fff;
            float: right;
            font-size: 13px;
            border: none;
            min-width: 50px;
            border-radius: 2px;
            border: none;
            outline: none !important;
            margin-left: 10px;
        }
        .table-title .btn i {
            float: left;
            font-size: 21px;
            margin-right: 5px;
        }
    </style>

</head>
<body>
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

        $sql="SELECT * FROM reporte";
        $resultado=mysqli_query($connection, $sql);
    ?>

    <div id="menu">
      <ul>
        <li><a href="http://localhost/appbaches-web/index.php"><button style="font-size:12px">Regresar al panel. <i class="fa fa-arrow-circle-left"></i></button></a></li>
      </ul>
    </div>

    <div class="title-box">
        <h1>Gestión de Reportes</h1>
    </div>
    <div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Seleccionar</th>
                    <th>ID</th>
                    <th>FECHA</th>
                    <th>DIRECCION APROXIMADA</th>
                    <th>USUARIO</th>
                    <th>ESTATUS</th>
                    <th>ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($filas=mysqli_fetch_assoc($resultado)) {
                ?>
                <tr>
                    <td><input type="checkbox"></td>
                    <td><?php echo $filas['id'] ?></td>
                    <td><?php echo $filas['fecha'] ?></td>
                    <td><?php echo $filas['direccion_aprox'] ?></td>
                    <td><?php echo $filas['id_user'] ?></td>
                    <td><?php 
                              if($filas['estatus'] == 1) { echo '¡Caso resuelto!'; }
                              else if($filas['estatus'] == 2) { echo 'Caso en proceso.'; }
                              else{ echo 'Caso sin revisar.'; }
                        ?>
                    </td>
                    <td>
                        <a href="editarElem.php?id=<?php echo $filas['id'] ?> class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Editar">&#xE254;</i></a>
                        <a href="eliminar.php?id=<?php echo $filas['id'] ?>class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <script src = "http://localhost/appbaches-web/views/generarpdf.php"></script>          
        <br><br><a href="reportes.pdf" download class="btn btn-primary" href="#" role="button">Descargar documento PDF</a>
    </div>
</body>
</html>