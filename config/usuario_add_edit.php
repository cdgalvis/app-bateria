<?php

    include_once("config.php");

    if(isset($_POST['id_usuario']))     $id_usuario     = $_POST['id_usuario'];
    if(isset($_POST['usernameregis']))  $username       = $_POST['usernameregis']; 
	if(isset($_POST['passwregis']))     $password       = $_POST['passwregis'];
    if(isset($_POST['nombres']))        $nombres        = $_POST['nombres'];
    if(isset($_POST['apellidos']))      $apellidos      = $_POST['apellidos'];
    if(isset($_POST['confirpassword'])) $confirpassword = $_POST['confirpassword'];
    if(isset($_POST['identificacion'])) $identificacion = $_POST['identificacion'];
    if(isset($_POST['email']))          $email          = $_POST['email'];
    if(isset($_POST['roles']))          $roles          = $_POST['roles'];
    if(isset($_POST['active']))         $active         = $_POST['active'];
    if(isset($_POST['tipo_documento'])) $tipo_documento = $_POST['tipo_documento'];
    
    $conexion = new Database;  
    $result = $conexion->ValidacionUsername($username);
    $cantidad = $result->rowCount();


    if($id_usuario != ""){
            
        $conexion = new Database;  
        $result = $conexion->updateUsuario($id_usuario,$username,$password,$nombres,$apellidos,$identificacion,$email,$roles,$active,$tipo_documento);

        header('Location: ../vistas/usuario/usuarios.php?mensaje='.$result);
        
    }else{
        if($cantidad > 0){
            header('Location: ../index.php?err=3');
        }else{
    
            $conexion = new Database;  
            $result = $conexion->addUsuario($username,$password,$nombres,$apellidos,$identificacion,$email,$roles,$active,$tipo_documento);
    
            header('Location: ../vistas/usuario/usuarios.php?mensaje='.$result);
            
        }
    }

?>