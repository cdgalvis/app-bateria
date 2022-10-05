<?php

    include_once("config.php");

    if(isset($_GET['id']))     $id     = $_GET['id'];
    if(isset($_GET['eval']))   $eval   = $_GET['eval'];
    if(isset($_GET['emp']))    $emp    = $_GET['emp'];
    
    $conexion = new Database;  
    $result = $conexion->deleteEvaluacionDet($id);

    $cadena = "id=".$eval."&empresa=".$emp."&mensaje=".$result;

    header('Location: ../vistas/evaluacion/evaluaciones.php?'.$cadena);

?>