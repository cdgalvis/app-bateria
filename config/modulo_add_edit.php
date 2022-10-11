<?php

    include_once("config.php");

    if(isset($_POST['mod_id']))       $mod_id     = $_POST['mod_id'];
    if(isset($_POST['mod_nombre']))   $mod_nombre = $_POST['mod_nombre']; 
    if(isset($_POST['mod_visible']))  $mod_visible = $_POST['mod_visible']; 
    if(isset($_POST['mod_url']))      $mod_url = $_POST['mod_url']; 
    if(isset($_POST['groups_id']))    $groups_id = $_POST['groups_id']; 

    if($mod_id != ""){
        $conexion = new Database;  
        $result = $conexion->updateModulos($mod_id,$mod_nombre,$mod_visible,$mod_url,$groups_id);

        header('Location: ../vistas/modulos/modulos.php?mensaje='.$result);
        
    }else{
        $conexion = new Database;  
        $result = $conexion->addModulos($mod_nombre,$mod_visible,$mod_url,$groups_id);

        header('Location: ../vistas/modulos/modulos.php?mensaje='.$result);
    }

?>