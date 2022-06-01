<?php

    include_once("config.php");

    if(isset($_GET['id']))     $id_usuario     = $_GET['id'];
    
    $conexion = new Database;  
    $result = $conexion->deleteUsuario($id_usuario);

    header('Location: ../vistas/usuario/usuarios.php?mensaje='.$result);

?>