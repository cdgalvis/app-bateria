<?php 
	include_once("config.php");
	session_start();

	$username = "";
	$password = "";
	
	if(isset($_POST['username'])){
		$username = $_POST['username'];
	}
	if (isset($_POST['password'])) {
		$password = $_POST['password'];
	}
	
	$conexion = new Database;  
    $result = $conexion->DatosAutenticacion($username,$password);
    $cantidad = $result->rowCount();

	if($cantidad == 0){
		header('Location: ../index.php?err=1');
	}else{

		$row = $result->fetch(PDO::FETCH_ASSOC);

		session_regenerate_id();
		$_SESSION['sess_user_id'] 	= $row['id'];
		$_SESSION['sess_username'] 	= $row['username'];
		$_SESSION['sess_nombre'] 	= $row['nombres'].' '.$row['apellidos'];
        $_SESSION['sess_userrole'] 	= $row['roles_id'];
		$_SESSION['sess_useriden'] 	= $row['identificacion'];
		session_write_close();

		header('Location: ../vistas/home.php');
		
	}
?>