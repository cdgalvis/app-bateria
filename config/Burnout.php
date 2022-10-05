<?php
    include_once("config.php");
    include_once("class.upload.php");

    session_start();
    $usuario = $_SESSION['sess_user_id'];

    $formato = 3;
    $burnout   = 4;

    $conteo_burnout = $_POST["conteo_burnout"];

    for ($i=1; $i < $conteo_burnout; $i++) { 
        $respuesta_burnout = $_POST['burnout'.$i];

        $conexion = new Database;  
        $result1 = $conexion->addRespuestas($formato,$burnout,$i,$respuesta_burnout,$usuario);
    }


    header('Location: ../vistas/formatos/burnout.php?err='.$result); 

?>