<?php 
     include_once("../../config/config.php");
     include_once("../../config/ruta.php");

    session_start();
    $role = $_SESSION['sess_userrole'];
    $usuario = $_SESSION['sess_user_id'];
    $identificacion =  $_SESSION['sess_useriden'];

    $conexion = new Database;  
    $resultGrupos = $conexion->DatosGrupos();

    $dato_id = $dato_tipo_documento  = $dato_identificacion  = $dato_nombre_completo = $dato_anio_nacimiento = $dato_estado_civil    = $dato_nivel_estudio   = $dato_ocupacion_profesion    = $dato_residenciaciudad= $dato_residenciadepartamento = $dato_estrato  = $dato_dependencia_economica  = $dato_trabajociudad   = $dato_trabajodepartamento    = $dato_anios_trabajo   = $dato_cargo_ocupa     = $dato_tipo_cargo      = $dato_anios_cargo     = $dato_nombre_area     = $dato_tipo_contrato   = $dato_horas_diarias  = $dato_sexo = $dato_tipo_vivienda = $dato_tipo_salario = "";


    if(isset($identificacion)) {

      $conexion = new Database;  
      $resultDatosPersonales = $conexion->ValidacionDatosPersonales($identificacion);

      foreach($resultDatosPersonales->fetchAll(PDO::FETCH_OBJ) as $r){
        $dato_id                     = $r->id;
        $dato_tipo_documento         = $r->tipo_documento;
        $dato_identificacion         = $r->identificacion;
        $dato_nombre_completo        = $r->nombre_completo;
        $dato_anio_nacimiento        = $r->anio_nacimiento;
        $dato_estado_civil           = $r->estado_civil;
        $dato_nivel_estudio          = $r->nivel_estudio;
        $dato_ocupacion_profesion    = $r->ocupacion_profesion;
        $dato_residenciaciudad       = $r->residenciaciudad;
        $dato_residenciadepartamento = $r->residenciadepartamento;
        $dato_estrato                = $r->estrato;
        $dato_dependencia_economica  = $r->dependencia_economica;
        $dato_trabajociudad          = $r->trabajociudad;
        $dato_trabajodepartamento    = $r->trabajodepartamento;
        $dato_anios_trabajo          = $r->anios_trabajo;
        $dato_cargo_ocupa            = $r->cargo_ocupa;
        $dato_tipo_cargo             = $r->tipo_cargo;
        $dato_anios_cargo            = $r->anios_cargo;
        $dato_nombre_area            = $r->nombre_area;
        $dato_tipo_contrato          = $r->tipo_contrato;
        $dato_horas_diarias          = $r->horas_diarias;
        $dato_sexo                   = $r->sexo;
        $dato_tipo_vivienda          = $r->tipo_vivienda;
        $dato_tipo_salario           = $r->tipo_salario;
      }

    }
    
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Riesgo Psicosocial</title>

    <!-- Bootstrap -->
    <link href="../../bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="../../css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
  </head>
  <body>

    <?php include_once('../menu.php'); ?>

    <div class="container homepage">
      <div class="row">
        <div class="col-md-12">
          <form action="../../config/datosgenerales.php" method="POST" role="form" name="datosgenerales">  

            <div id='mensaje'> </div>

            <?php 
              $mensajes = array(
                  0=>"No se pudo realizar la acción, comunicate con el administrador",
                  1=>"Nombre de usuario o contraseña no válidos, Inténtelo de nuevo",
                  2=>"Por favor, inicie sesión para acceder a esta área",
                  3=>"No se puede registrar debido a que ya existe una cuenta con el mismo correo electronico",
                  4=>"No tienes acceso a esta area, Inicia sesion nuevamente",
                  5=>"Se registro correctamente"
              );

              $mensaje_id = isset($_GET['err']) ? (int)$_GET['err'] : 0;
              $mensaje='';

              if($mensaje_id=='5'){
                  $clase = 'alert-success';
              }else{
                  $clase = 'alert-danger';
              }

              if ($mensaje_id != '') {
                  $mensaje = $mensajes[$mensaje_id];
              }

              if ($mensaje!='') echo "<div class='alert $clase' role='alert'> $mensaje </div>";
              
            ?>

            <div role="tabpanel">
              <div class="card mb-3">
                <div class="row no-gutters">
                  <div class="col-md-12">
                    <!-- List group -->
                    <div class="list-group d-flex" id="myList" role="tablist">
                        <a class="list-group-item list-group-item-action active" data-toggle="list" href="#datosgenerales" role="tab">DATOS GENERALES</a>
                    </div>
                  </div>
                  <div class="col-md-10">
                    <div class="card-body">
                      <!-- Tab panes -->
                      <div class="tab-content">
                        <div class="tab-pane active" id="datosgenerales" role="tabpanel">
                          <header>
                            <h3>FICHA DE DATOS GENERALES</h3>
                          </header>
                          <br>

                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <label class="input-group-text" for="tipo_documento">Tipo de Documento:</label>
                            </div>
                            <select class="custom-select" name="tipo_documento" id="tipo_documento">
                              <?php 
                                  $select1 = $select2 = $select3 = "";

                                  if($dato_tipo_documento=="CEDULA")    $select1 = 'selected';
                                  if($dato_tipo_documento=="NIT")       $select2 = 'selected'; 
                                  if($dato_tipo_documento=="PASAPORTE") $select3 = 'selected'; 
                              ?>

                              <option value="" selected>Seleccione un tipo de documento...</option>
                              <option value="CEDULA"    <?php echo $select1 ?>>CEDULA</option>
                              <option value="NIT"       <?php echo $select2 ?>>NIT</option>
                              <option value="PASAPORTE" <?php echo $select3 ?>>PASAPORTE</option>
                            </select>
                            <input type="hidden" class="form-control" name="id_datosgenerales" value="<?php echo $dato_id; ?>">
                          </div>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon1">Número de documento:</span>
                            </div>
                            <input type="text" class="form-control" name="identificacion" value="<?php echo $dato_identificacion; ?>"> 
                          </div>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon1">Nombre completo:</span>
                            </div>
                            <input type="text" class="form-control" name="nombre_completo" value="<?php echo $dato_nombre_completo; ?>">
                          </div>
                          <div class="input-group  mb-3">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <?php 
                                    $select1 = $select2 = "";

                                    if($dato_sexo=="Masculino")    $select1 = 'checked';
                                    if($dato_sexo=="Femenino")       $select2 = 'checked'; 
                                ?>

                                Sexo:&nbsp; 
                                <input type="radio" name="sexoradio" id="radio1" value="Masculino" <?php echo $select1 ?>> &nbsp;Masculino&nbsp;
                                <input type="radio" name="sexoradio" id="radio2" value="Femenino"  <?php echo $select2 ?>> &nbsp;Femenino
                              </div>
                            </div>                            
                          </div>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon1">Año de nacimiento:</span>
                            </div>
                            <input type="number" class="form-control" name="anio_nacimiento" value="<?php echo $dato_anio_nacimiento; ?>">
                          </div>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <label class="input-group-text" for="estado_civil">Estado civil:</label>
                            </div>
                            <?php 
                                $select1 = $select2 = $select3 = $select4 = $select5 = $select6 = $select7 = "";

                                if($dato_estado_civil=="Soltero (a)")       $select1 = 'selected';
                                if($dato_estado_civil=="Casado (a)")        $select2 = 'selected'; 
                                if($dato_estado_civil=="Separado (a)")      $select3 = 'selected';
                                if($dato_estado_civil=="Divorciado (a)")    $select4 = 'selected';
                                if($dato_estado_civil=="Viudo (a)")         $select5 = 'selected';
                                if($dato_estado_civil=="Unión libre")       $select6 = 'selected';
                                if($dato_estado_civil=="Sacerdote / Monja") $select7 = 'selected'; 
                            ?>

                            <select class="custom-select" name="estado_civil">
                              <option value="" selected>Seleccione un estado civil...</option>
                              <option value="Soltero (a)"     <?php echo $select1 ?>>Soltero (a)</option>
                              <option value="Casado (a)"      <?php echo $select2 ?>>Casado (a)</option>
                              <option value="Separado (a)"    <?php echo $select3 ?>>Separado (a)</option>
                              <option value="Divorciado (a)"  <?php echo $select4 ?>>Divorciado (a)</option>
                              <option value="Viudo (a)"       <?php echo $select5 ?>>Viudo (a)</option>
                              <option value="Unión libre"     <?php echo $select6 ?>>Unión libre</option>
                              <option value="Sacerdote / Monja" <?php echo $select7 ?>>Sacerdote / Monja</option>
                            </select>
                          </div>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <label class="input-group-text" for="nivel_estudio">Último nivel de estudios que alcanzó:</label>
                            </div>
                            <?php 
                                $select1 = $select2 = $select3 = $select4 = $select5 = $select6 = $select7 = $select8 = $select9 = $select10 = $select11 = $select12 = "";

                                if($dato_nivel_estudio=="Ninguno")                            $select1 = 'selected';
                                if($dato_nivel_estudio=="Primaria incompleta")                $select2 = 'selected'; 
                                if($dato_nivel_estudio=="Primaria completa")                  $select3 = 'selected';
                                if($dato_nivel_estudio=="Bachillerato incompleto")            $select4 = 'selected';
                                if($dato_nivel_estudio=="Bachillerato completo")              $select5 = 'selected';
                                if($dato_nivel_estudio=="Técnico / tecnológico incompleto")   $select6 = 'selected';
                                if($dato_nivel_estudio=="Técnico / tecnológico completo")     $select7 = 'selected';
                                if($dato_nivel_estudio=="Profesional incompleto")             $select8 = 'selected';
                                if($dato_nivel_estudio=="Profesional completo")               $select9 = 'selected';
                                if($dato_nivel_estudio=="Carrera militar / policía")          $select10 = 'selected';
                                if($dato_nivel_estudio=="Post-grado incompleto")              $select11 = 'selected';
                                if($dato_nivel_estudio=="Post-grado completo")                $select12 = 'selected';
                            ?>
                            <select class="custom-select" name="nivel_estudio">
                              <option value="" selected>Seleccione una nivel de estudios...</option>
                              <option value="Ninguno"                   <?php echo $select1 ?>>Ninguno</option>
                              <option value="Primaria incompleta"       <?php echo $select2 ?>>Primaria incompleta</option>
                              <option value="Primaria completa"         <?php echo $select3 ?>>Primaria completa</option>
                              <option value="Bachillerato incompleto"   <?php echo $select4 ?>>Bachillerato incompleto</option>
                              <option value="Bachillerato completo"     <?php echo $select5 ?>>Bachillerato completo</option>
                              <option value="Técnico / tecnológico incompleto"  <?php echo $select6 ?>>Técnico / tecnológico incompleto</option>
                              <option value="Técnico / tecnológico completo"    <?php echo $select7 ?>>Técnico / tecnológico completo</option>
                              <option value="Profesional incompleto"    <?php echo $select8 ?>>Profesional incompleto</option>
                              <option value="Profesional completo"      <?php echo $select9 ?>>Profesional completo</option>
                              <option value="Carrera militar / policía" <?php echo $select10 ?>>Carrera militar / policía</option>
                              <option value="Post-grado incompleto"     <?php echo $select11 ?>>Post-grado incompleto</option>
                              <option value="Post-grado completo"       <?php echo $select12 ?>>Post-grado completo</option>
                            </select>
                          </div>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon1">¿Cuál es su ocupación o profesión?</span>
                            </div>
                            <input type="text" class="form-control" name="ocupacion_profesion" value="<?php echo $dato_ocupacion_profesion; ?>">
                          </div>
                          
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon1">Departamento de residencia: </span>
                            </div>
                            <select class="form-control" name="residenciadepartamento">
                              <option value=''>Seleccione un Departamento</option>
                              <?php
                                $conexion = new Database;  
                                $resultDepartamentos = $conexion->DatosDepartamentos(); 

                                $selected ='';
                                foreach($resultDepartamentos as $Departamentos) {
                                  
                                  if($dato_residenciadepartamento==$Departamentos['dep_id']){
                                      $selected = 'selected';
                                  }else{
                                      $selected = '';
                                  }

                                  echo "<option value='".$Departamentos['dep_id']."' $selected>".$Departamentos['dep_nombre']."</option>";
                                }
                              ?>
                            </select>
                          </div>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon1">Ciudad de residencia:</span>
                            </div>

                            <select class="form-control" name="residenciaciudad">
                              <option value=''>Seleccione una Ciudad</option>
                              <?php
                                 $conexion = new Database;  
                                 $resultMunicipios = $conexion->DatosMunicipios();

                                $selected ='';
                                foreach($resultMunicipios as $Municipios) {
                                  if($dato_residenciaciudad==$Municipios['mun_id']){
                                      $selected = 'selected';
                                  }else{
                                      $selected = '';
                                  }

                                  echo "<option value='".$Municipios['mun_id']."' $selected>".$Municipios['mun_nombre']."</option>";
                                }
                              ?>
                            </select>
                          </div>

                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <label class="input-group-text" for="estrato">Seleccione el estrato de los servicios públicos de su vivienda</label>
                            </div>
                            <select class="custom-select" name="estrato">
                              <?php 
                                  $select1 = $select2 = $select3 = $select4 = $select5 = $select6 = $select7 = $select8 = $select9 = "";

                                  if($dato_estrato=="1")     $select1 = 'selected';
                                  if($dato_estrato=="2")     $select2 = 'selected'; 
                                  if($dato_estrato=="3")     $select3 = 'selected';
                                  if($dato_estrato=="4")     $select4 = 'selected';
                                  if($dato_estrato=="5")     $select5 = 'selected';
                                  if($dato_estrato=="6")     $select6 = 'selected';
                                  if($dato_estrato=="7")     $select7 = 'selected';
                                  if($dato_estrato=="Finca") $select8 = 'selected';
                                  if($dato_estrato=="No se") $select9 = 'selected';
                              ?>

                              <option value="" selected>Seleccione un estrato...</option>
                              <option value="1"     <?php echo $select1 ?>>1</option>
                              <option value="2"     <?php echo $select2 ?>>2</option>
                              <option value="3"     <?php echo $select3 ?>>3</option>
                              <option value="4"     <?php echo $select4 ?>>4</option>
                              <option value="5"     <?php echo $select5 ?>>5</option>
                              <option value="6"     <?php echo $select6 ?>>6</option>
                              <option value="7"     <?php echo $select7 ?>>7</option>
                              <option value="Finca" <?php echo $select8 ?>>Finca</option>
                              <option value="No se" <?php echo $select9 ?>>No sé</option>
                            </select>
                          </div>
                          <div class="input-group  mb-3">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <?php 
                                    $select1 = $select2 = $select3 = "";

                                    if($dato_tipo_vivienda=="Propia")       $select1 = 'checked';
                                    if($dato_tipo_vivienda=="En arriendo")  $select2 = 'checked';
                                    if($dato_tipo_vivienda=="Familiar")     $select3 = 'checked';  
                                ?>

                                Tipo de Vivienda:&nbsp; 
                                <input type="radio" name="viviendaradio" id="vradio1" value="Propia"      <?php echo $select1 ?>> &nbsp;Propia&nbsp;
                                <input type="radio" name="viviendaradio" id="vradio2" value="En arriendo" <?php echo $select2 ?>> &nbsp;En arriendo&nbsp;
                                <input type="radio" name="viviendaradio" id="vradio3" value="Familiar"    <?php echo $select3 ?>> &nbsp;Familiar
                              </div>
                            </div>                            
                          </div>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon1">Número de personas que dependen económicamente de usted: </span>
                            </div>
                            <input type="number" class="form-control" name="dependencia_economica" value="<?php echo $dato_dependencia_economica; ?>">
                          </div>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon1">Departamento donde trabaja actualmente:</span>
                            </div>
                            <select class="form-control" name="trabajodepartamento">
                              <option value=''>Seleccione un Departamento</option>
                              <?php
                                $conexion = new Database;  
                                $resultDepartamentos = $conexion->DatosDepartamentos(); 

                                $selected = "";
                                foreach($resultDepartamentos as $Departamentos) {
                                  
                                  if($dato_trabajodepartamento==$Departamentos['dep_id']){
                                      $selected = 'selected';
                                  }else{
                                      $selected = ''; 
                                  }

                                  echo "<option value='".$Departamentos['dep_id']."' $selected>".$Departamentos['dep_nombre']."</option>";
                                }
                              ?>
                            </select>
                          </div>

                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon1">Ciudad donde trabaja actualmente:</span>
                            </div>
                            <select class="form-control" name="trabajociudad">
                              <option value=''>Seleccione una Ciudad</option>
                              <?php
                                 $conexion = new Database;  
                                 $resultMunicipios = $conexion->DatosMunicipios();

                                 $selected = "";
                                foreach($resultMunicipios as $Municipios) {
                                  if($dato_trabajociudad==$Municipios['mun_id']){
                                      $selected = 'selected';
                                  }else{
                                      $selected = '';
                                  }

                                  echo "<option value='".$Municipios['mun_id']."' $selected>".$Municipios['mun_nombre']."</option>";
                                }
                              ?>
                            </select>
                          </div>


                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <?php 
                                  $valor_anios_trabajo =  "";

                                  if($dato_anios_trabajo == "Menos de un Año") {
                                    $valor_anios_trabajo = 'checked';
                                  }else{
                                    $valor_anios_trabajo = $dato_anios_trabajo;
                                  }
                              ?>

                              <div class="input-group-text">
                                ¿Hace cuántos años que trabaja en esta empresa?&nbsp; 
                                <input type="number" class="form-control" name="anios_trabajo" value="<?php echo $valor_anios_trabajo; ?>">
                              </div>
                              <div class="input-group-text">
                                Si lleva menos de un año marque aquí:&nbsp; 
                                <input type="radio" name="aniosradio" id="aradio1" value="anios_trabajo" <?php echo $valor_anios_trabajo; ?>>
                              </div>
                            </div>
                          </div>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon1">¿Cuál es el nombre del cargo que ocupa en la empresa?</span>
                            </div>
                            <input type="text" class="form-control" name="cargo_ocupa" value="<?php echo $dato_cargo_ocupa; ?>">
                          </div>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <label class="input-group-text" for="tipo_cargo">Seleccione el tipo de cargo que más se parece al que usted desempeña:</label>
                            </div>
                            <select class="custom-select" name="tipo_cargo">
                            <?php 
                                  $select1 = $select2 = $select3 = $select4 = "";

                                  if($dato_tipo_cargo=="Jefatura - tiene personal a cargo")                    $select1 = 'selected';
                                  if($dato_tipo_cargo=="Profesional-analista-técnico-tecnólogo")               $select2 = 'selected'; 
                                  if($dato_tipo_cargo=="Auxiliar-asistente administrativo-asistente técnico")  $select3 = 'selected';
                                  if($dato_tipo_cargo=="Operario-operador-ayudante-servicios generales")       $select4 = 'selected';
                              ?>

                              <option value="" selected>Seleccione un cargo...</option>
                              <option value="Jefatura - tiene personal a cargo"                   <?php echo $select1; ?>>Jefatura - tiene personal a cargo</option>
                              <option value="Profesional-analista-técnico-tecnólogo"              <?php echo $select2; ?>>Profesional, analista, técnico, tecnólogo</option>
                              <option value="Auxiliar-asistente administrativo-asistente técnico" <?php echo $select3; ?>>Auxiliar, asistente administrativo, asistente técnico</option>
                              <option value="Operario-operador-ayudante-servicios generales"      <?php echo $select4; ?>>Operario, operador, ayudante, servicios generales</option>
                            </select>
                          </div>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <?php 
                                  $valor_anios_cargo =  "";

                                  if($dato_anios_cargo == "Menos de un Año") {
                                    $valor_anios_cargo = 'checked';
                                  }else{
                                    $valor_anios_cargo = $dato_anios_cargo;
                                  }
                              ?>

                              <div class="input-group-text">
                                ¿Hace cuántos años que desempeña el cargo actual?&nbsp; 
                                <input type="number" class="form-control" name="anios_cargo" value="<?php echo $valor_anios_cargo; ?>">
                              </div>
                              <div class="input-group-text">
                                Si lleva menos de un año marque aquí:&nbsp; 
                                <input type="radio" name="anioscradio" id="acradio1" value="anios_cargo" <?php echo $valor_anios_cargo; ?>>
                              </div>
                            </div>
                          </div>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon1">Escriba el nombre del departamento o área de la empresa en el que trabaja: </span>
                            </div>
                            <input type="text" class="form-control" name="nombre_area" value="<?php echo $dato_nombre_area; ?>">
                          </div>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <label class="input-group-text" for="tipo_contrato">Seleccione el tipo de contrato que tiene actualmente: </label>
                            </div>
                            <select class="custom-select" name="tipo_contrato">
                              <?php 
                                  $select1 = $select2 = $select3 = $select4 = $select5 = $select6 = "";

                                  if($dato_tipo_contrato=="Temporal de menos de 1 año")                    $select1 = 'selected';
                                  if($dato_tipo_contrato=="Temporal de 1 año o más")               $select2 = 'selected'; 
                                  if($dato_tipo_contrato=="Término indefinido")  $select3 = 'selected';
                                  if($dato_tipo_contrato=="Cooperado (cooperativa)")       $select4 = 'selected';
                                  if($dato_tipo_contrato=="Prestación de servicios")       $select4 = 'selected';
                                  if($dato_tipo_contrato=="No se")       $select4 = 'selected';
                              ?>

                              <option value="" selected>Seleccione un tipo de contrato...</option>
                              <option value="Temporal de menos de 1 año" <?php echo $select1; ?>>Temporal de menos de 1 año</option>
                              <option value="Temporal de 1 año o más"    <?php echo $select2; ?>>Temporal de 1 año o más</option>
                              <option value="Término indefinido"         <?php echo $select3; ?>>Término indefinido</option>
                              <option value="Cooperado (cooperativa)"    <?php echo $select4; ?>>Cooperado (cooperativa)</option>
                              <option value="Prestación de servicios"    <?php echo $select5; ?>>Prestación de servicios</option>
                              <option value="No se"                      <?php echo $select6; ?>>No sé</option>
                            </select>
                          </div>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon1">Indique cuántas horas diarias de trabajo están establecidas por la empresa para su cargo</span>
                            </div>
                            <input type="text" class="form-control" name="horas_diarias" value="<?php echo $dato_horas_diarias; ?>">
                          </div>
                          <div class="input-group  mb-3">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <?php 
                                    $select1 = $select2 = $select3 = "";

                                    if($dato_tipo_salario=="Fijo")                            $select1 = 'checked';
                                    if($dato_tipo_salario=="Una parte fija y otra variable")  $select2 = 'checked';
                                    if($dato_tipo_salario=="Todo variable")                   $select3 = 'checked';  
                                ?>

                                Seleccione el tipo de salario que recibe:&nbsp; 
                                <input type="radio" name="salarioradio" id="sradio1" value="Fijo" <?php echo $select1; ?>> &nbsp;Fijo&nbsp;
                                <input type="radio" name="salarioradio" id="sradio2" value="Una parte fija y otra variable" <?php echo $select2; ?>> &nbsp;Una parte fija y otra variable&nbsp;
                                <input type="radio" name="salarioradio" id="sradio3" value="Todo variable" <?php echo $select3; ?>> &nbsp;Todo variable
                              </div>
                            </div>                            
                          </div>

                        </div>
                        </div>
              
                      </div>
                      <div class="col-md-4">
                        <input type="button" class="btn btn-primary"  onclick="EnviarDatosGenerales()" value='Guardar'>
                        <!--<button class="btn btn-sm btn-primary btn-block" type="submit">Guardar</button>-->
                      </div>
                      <br>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
          
        </div>
      </div> 
    </div>   
    


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../js/validaciones.js"></script>   

    </body>
</html>
