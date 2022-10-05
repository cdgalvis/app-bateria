<?php
    include_once("config.php");
    include_once("class.upload.php");

    session_start();
    $usuario = $_SESSION['sess_user_id'];

    $id                     = $_POST['id_datosgenerales']; 
    $tipo_documento         = $_POST['tipo_documento']; 
    $identificacion         = $_POST['identificacion']; 
    $nombre_completo        = $_POST['nombre_completo']; 
    $anio_nacimiento        = $_POST['anio_nacimiento']; 
    $estado_civil           = $_POST['estado_civil']; 
    $nivel_estudio          = $_POST['nivel_estudio']; 
    $ocupacion_profesion    = $_POST['ocupacion_profesion']; 
    $residenciaciudad       = $_POST['residenciaciudad']; 
    $residenciadepartamento = $_POST['residenciadepartamento']; 
    $estrato                = $_POST['estrato']; 
    $dependencia_economica  = $_POST['dependencia_economica']; 
    $trabajociudad          = $_POST['trabajociudad']; 
    $trabajodepartamento    = $_POST['trabajodepartamento'];
    $anios_trabajo          = $_POST['anios_trabajo']; 
    if(isset($_POST['aniosradio'])){
        $aniostrabajo = "Menos de un Año";
    }else if($anios_trabajo!=""){
        $aniostrabajo = $anios_trabajo;
    }    
    $cargo_ocupa            = $_POST['cargo_ocupa']; 
    $tipo_cargo             = $_POST['tipo_cargo']; 
    $anios_cargo            = $_POST['anios_cargo']; 
    if(isset($_POST['anioscradio'])){
        $aniosCtrabajo = "Menos de un Año";
    }else if($anios_cargo!=""){
        $aniosCtrabajo = $anios_cargo;
    }
    $nombre_area            = $_POST['nombre_area']; 
    $tipo_contrato          = $_POST['tipo_contrato']; 
    $horas_diarias          = $_POST['horas_diarias']; 
    $sexoradio              = $_POST['sexoradio']; 
    $viviendaradio          = $_POST['viviendaradio']; 
    $salarioradio           = $_POST['salarioradio'];


    if($id != ""){
        $conexion = new Database;  
        $result = $conexion->ActualizarDatosPersonales($id,$tipo_documento,$identificacion,$nombre_completo,$anio_nacimiento,$estado_civil,$nivel_estudio,$ocupacion_profesion,$residenciaciudad,$residenciadepartamento,$estrato,$dependencia_economica,$trabajociudad,$trabajodepartamento,$aniostrabajo,$cargo_ocupa,$tipo_cargo,$aniosCtrabajo,$nombre_area,$tipo_contrato,$horas_diarias,$sexoradio,$viviendaradio,$salarioradio);

        header('Location: ../vistas/formatos/datosgenerales.php?err='.$result);
    }else{
        $conexion = new Database;  
        $result = $conexion->RegistrarDatosPersonales($tipo_documento,$identificacion,$nombre_completo,$anio_nacimiento,$estado_civil,$nivel_estudio,$ocupacion_profesion,$residenciaciudad,$residenciadepartamento,$estrato,$dependencia_economica,$trabajociudad,$trabajodepartamento,$aniostrabajo,$cargo_ocupa,$tipo_cargo,$aniosCtrabajo,$nombre_area,$tipo_contrato,$horas_diarias,$sexoradio,$viviendaradio,$salarioradio);

        header('Location: ../vistas/formatos/datosgenerales.php?err='.$result);
    } 

?>