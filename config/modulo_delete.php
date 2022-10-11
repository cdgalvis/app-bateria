<?php

    include_once("config.php");

    if(isset($_GET['id']))     $id_modulo     = $_GET['id'];
    
    $conexion = new Database;  
    $result = $conexion->deleteModulo($id_modulo);

    header('Location: ../vistas/modulos/modulos.php?mensaje='.$result);

?>