<?php

    include_once("config.php");
    include_once("class.upload.php");

    if(isset($_POST['empresa_id']))             $empresa_id             = $_POST['empresa_id'];
    if(isset($_POST['documento']))              $documento              = $_POST['documento']; 
	if(isset($_POST['nombre']))                 $nombre                 = $_POST['nombre'];
    if(isset($_POST['direccion']))              $direccion              = $_POST['direccion'];
    if(isset($_POST['telefono']))               $telefono               = $_POST['telefono'];
    if(isset($_POST['nombre_contacto']))        $nombre_contacto        = $_POST['nombre_contacto'];
    if(isset($_POST['registro_evaluacion']))    $registro_evaluacion    = $_POST['registro_evaluacion'];
    if(isset($_POST['active']))                 $active                 = $_POST['active'];
 
    $conexion = new Database;  
    $result = $conexion->ValidacionEmpresa($documento);
    $cantidad = $result->rowCount();


    if($empresa_id != ""){
            
        $conexion = new Database;  
        $result = $conexion->updateEmpresa($empresa_id,$documento,$nombre,$direccion,$telefono,$nombre_contacto,$registro_evaluacion,$active);
        
    }else{
        if($cantidad > 0){
            header('Location: ../index.php?err=3');
        }else{
    
            $conexion = new Database;  
            $result = $conexion->addEmpresa($documento,$nombre,$direccion,$telefono,$nombre_contacto,$registro_evaluacion,$active);
        }
    }

    $resultEmp = $conexion->ValidacionEmpresa($documento);
    foreach($resultEmp->fetchAll(PDO::FETCH_OBJ) as $r){
        $id_empre = $r->id;
    }


    if(isset($_FILES["name"])){
        $up = new Upload($_FILES["name"]);
        if($up->uploaded){
            $up->Process("../uploads/");
            if($up->processed){
                /// leer el archivo excel
                require_once '../PHPExcel/Classes/PHPExcel.php';
                $archivo = "../uploads/".$up->file_dst_name;
                $inputFileType = PHPExcel_IOFactory::identify($archivo);
                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($archivo);
                $sheet = $objPHPExcel->getSheet(0); 
                $highestRow = $sheet->getHighestRow(); 
                $highestColumn = $sheet->getHighestColumn();
                for ($row = 2; $row <= $highestRow; $row++){ 
                    $x_nombre           = $sheet->getCell("A".$row)->getValue();
                    $x_apellido         = $sheet->getCell("B".$row)->getValue();
                    $x_tipo             = $sheet->getCell("C".$row)->getValue();
                    $x_documento        = $sheet->getCell("D".$row)->getValue();
                    $x_area             = $sheet->getCell("E".$row)->getValue();
                    $x_email            = $sheet->getCell("F".$row)->getValue();
                    $x_telefono         = $sheet->getCell("G".$row)->getValue();
                    $x_ciudad           = $sheet->getCell("H".$row)->getValue();
                    $x_fecha_nacimiento = $sheet->getCell("I".$row)->getValue();

                    $conexion = new Database;  
                    $result = $conexion->ValidacionContactos($id_empre, $x_documento);
                    $cantidad = $result->rowCount();

                    if($cantidad > 0){
                        $conexion = new Database;  
                        $result = $conexion->updateContacto($id_empre,$x_nombre,$x_apellido,$x_tipo,$x_documento,$x_area,$x_email,$x_telefono,$x_ciudad,$x_fecha_nacimiento);
                    }else{
                        $conexion = new Database;  
                        $result = $conexion->addContacto($id_empre,$x_nombre,$x_apellido,$x_tipo,$x_documento,$x_area,$x_email,$x_telefono,$x_ciudad,$x_fecha_nacimiento);
                    } 	 
                    
                }

                unlink($archivo);
            }	
    
        }
    }

    header('Location: ../vistas/empresa/empresas.php');

?>