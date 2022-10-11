<?php

    include_once("config.php");

    if(isset($_POST['gru_id']))       $gru_id     = $_POST['gru_id'];
    if(isset($_POST['gru_nombre']))   $gru_nombre = $_POST['gru_nombre']; 
    if(isset($_POST['gru_visible']))  $gru_visible = $_POST['gru_visible']; 
    if(isset($_POST['gru_url']))      $gru_url = $_POST['gru_url']; 

    if($gru_id != ""){
        $conexion = new Database;  
        $result = $conexion->updateGrupo($gru_id,$gru_nombre,$gru_visible,$gru_url);

        header('Location: ../vistas/modulos/grupos.php?mensaje='.$result);
        
    }else{
        $conexion = new Database;  
        $result = $conexion->addGrupo($gru_nombre,$gru_visible,$gru_url);

        header('Location: ../vistas/modulos/grupos.php?mensaje='.$result);
    }

?>