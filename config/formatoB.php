<?php
    include_once("config.php");
    include_once("class.upload.php");

    session_start();
    $usuario = $_SESSION['sess_user_id'];

    $formato = 2;
    $intralaboral   = 1;
    $extralaboral   = 3;

    $conteo_intralaboral = $_POST["conteo_intralaboral"];
    $conteo_extralaboral = $_POST["conteo_extralaboral"];

    for ($i=1; $i < $conteo_intralaboral; $i++) { 
        $respuesta_intralaboral = $_POST['intralaboral'.$i];

        $conexion = new Database;  
        $result1 = $conexion->addRespuestas($formato,$intralaboral,$i,$respuesta_intralaboral,$usuario);
    }


    for ($x=1; $x < $conteo_extralaboral; $x++) { 
        $respuesta_extralaboral = $_POST['extralaboral'.$x];

        $conexion = new Database;  
        $result3 = $conexion->addRespuestas($formato,$extralaboral,$x,$respuesta_extralaboral,$usuario);
    }

    header('Location: ../vistas/formatos/formatob.php?err='.$result); 

?>