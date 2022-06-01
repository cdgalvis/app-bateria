<!DOCTYPE html>
<?php 
    include_once("../config/config.php");
    include_once("../config/ruta.php");

    session_start();
    $role = $_SESSION['sess_userrole'];
    $usuario = $_SESSION['sess_user_id'];

    $conexion = new Database;  
    $resultGrupos = $conexion->DatosGrupos();
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Riesgo Psicosocial</title>

    <!-- Bootstrap -->
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    
  </head>
  <body>

    <?php include_once('menu.php'); ?>

    <div class="container homepage">
      
    </div>   

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../js/jquery.slim.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../js/validaciones.js"></script>    

    </body>
</html>
