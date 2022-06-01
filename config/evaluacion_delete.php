<?php

    include_once("config.php");

    if(isset($_GET['id']))     $id_evaluacion     = $_GET['id'];
    
    $conexion = new Database;  
    $result = $conexion->deleteEvaluacion($id_evaluacion);

    header('Location: ../vistas/evaluacion/evaluaciones.php?mensaje='.$result);

?>