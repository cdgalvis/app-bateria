<?php

    include_once("config.php");
    include_once("class.upload.php");

    if(isset($_POST['evaluacion_id']))             $evaluacion_id             = $_POST['evaluacion_id'];
    if(isset($_POST['companies_id']))              $companies_id              = $_POST['companies_id']; 
	if(isset($_POST['cities_id']))                 $cities_id                 = $_POST['cities_id'];
    if(isset($_POST['codigo_sesion']))             $codigo_sesion             = $_POST['codigo_sesion'];
    if(isset($_POST['respuesta']))                 $respuesta                 = $_POST['respuesta'];
    if(isset($_POST['formatoA'])){$formatoA  = $_POST['formatoA'];}else{$formatoA = 0;}            
    if(isset($_POST['formatoB'])){$formatoB  = $_POST['formatoB'];} else{$formatoB = 0;}                 
    if(isset($_POST['burnout'])) { $burnout = $_POST['burnout']; }else{ $burnout = 0; }                  
 
    /*$conexion = new Database;  
    $result = $conexion->ValidacionEmpresa($documento);
    $cantidad = $result->rowCount();*/


    if($evaluacion_id != ""){
            
        $conexion = new Database;  
        $result = $conexion->updateEvaluacion($evaluacion_id,$companies_id,$cities_id,$codigo_sesion,$respuesta,$formatoA,$formatoB,$burnout);
        
    }else{
        //if($cantidad > 0){
        //    header('Location: ../index.php?err=3');
        //}else{
    
            $conexion = new Database;  
            $result = $conexion->addEvaluacion($companies_id,$cities_id,$codigo_sesion,$respuesta,$formatoA,$formatoB,$burnout);
        //}
    }

    header('Location: ../vistas/evaluacion/evaluaciones.php');
?>