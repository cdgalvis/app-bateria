<?php

    include_once("config.php");

    if(isset($_GET['id']))     $id_empresa     = $_GET['id'];
    
    $conexion = new Database;  
    $result = $conexion->deleteEmpresa($id_empresa);

    header('Location: ../vistas/empresa/empresas.php?mensaje='.$result);

?>