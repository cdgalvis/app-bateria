<?php

    include_once("config.php");

    if(isset($_GET['id']))     $id_grupo     = $_GET['id'];
    
    $conexion = new Database;  
    $result = $conexion->deleteGrupo($id_grupo);

    header('Location: ../vistas/modulos/grupos.php?mensaje='.$result);

?>