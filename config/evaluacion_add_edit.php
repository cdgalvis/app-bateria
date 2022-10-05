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
    if(isset($_POST['users_id']))                  $users_id             = $_POST['users_id']; 
    
    $conteo = $_REQUEST['cont'];
    $contContac = $_REQUEST['cantidadContac'];

    $conexion = new Database;  
    $CantEvalu= $conexion->CantidadEvaluaciones();

    foreach($CantEvalu as $CantEva) {
        $id = $CantEva['id'];
    }

    if($evaluacion_id != ""){
        $id = $evaluacion_id;
    }

    for ($i = 0; $i < $contContac; $i++) {
        $vlr1 = 'contac'.$i;
        $vlr2 = 'nom'.$i;

        if(isset($_REQUEST[$vlr1])){
            $contacts_id  = $_REQUEST[$vlr1];
            $nombres      = $_REQUEST[$vlr2];
            $companies    = $companies_id;
            $fecha_registro = date('Y-m-d H:i:s');

            $conexion = new Database;  
            $result = $conexion->addDetEvaluacion($id,$contacts_id,$nombres,$fecha_registro,$companies);
        }
    }

    if($evaluacion_id != ""){
        $conexion = new Database;  
        $result = $conexion->updateEvaluacion($evaluacion_id,$companies_id,$cities_id,$codigo_sesion,$respuesta,$formatoA,$formatoB,$burnout,$users_id);
    }else{
        $conexion = new Database;  
        $result = $conexion->addEvaluacion($id,$companies_id,$cities_id,$codigo_sesion,$respuesta,$formatoA,$formatoB,$burnout,$users_id);
    }

    echo  '<script type="text/javascript"> eliminarSession(); </script>';

    header('Location: ../vistas/evaluacion/listevaluaciones.php');
?>