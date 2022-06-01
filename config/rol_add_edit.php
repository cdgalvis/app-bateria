<?php

    include_once("config.php");

    if(isset($_POST['rol_id']))      $rol_id     = $_POST['rol_id'];
    if(isset($_POST['rol_nombre']))  $rol_nombre = $_POST['rol_nombre']; 

    if($rol_id != ""){
        $conexion = new Database;  
        $result = $conexion->updateRol($rol_id,$rol_nombre);

        header('Location: ../vistas/rol/roles.php?mensaje='.$result);
        
    }else{
        $conexion = new Database;  
        $result = $conexion->addRol($rol_nombre);

        header('Location: ../vistas/rol/roles.php?mensaje='.$result);
    }

?>