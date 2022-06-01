<!DOCTYPE html>
<?php 
    include_once("../../config/config.php");
    include_once("../../config/ruta.php");

    session_start();
    $role = $_SESSION['sess_userrole'];
    $usuario = $_SESSION['sess_user_id'];

    $conexion = new Database;  
    $resultGrupos = $conexion->DatosGrupos();

    $conexion = new Database;  
    $DatosEmpresas = $conexion->DatosEmpresas();

    $conexion = new Database;  
    $DatosCiudades = $conexion->DatosCiudades();

    $conexion = new Database;  
    $DatosEvaluaciones = $conexion->DatosEvaluaciones();
    

    $evaluacion_id = $evaluacion_companies = $evaluacion_cities = $evaluacion_codigo_sesion = $evaluacion_respuesta = $evaluacion_formatoA = $evaluacion_formatoB = $evaluacion_burnout = "";
  
    if(isset($_GET['id'])) {

      $id = $_GET['id'];
      $conexion = new Database;    
      $result = $conexion->editEvaluacion($id);

      foreach($result->fetchAll(PDO::FETCH_OBJ) as $r){
          $evaluacion_id                   = $r->id;
          $evaluacion_companies            = $r->companies_id;
          $evaluacion_cities               = $r->cities_id;
          $evaluacion_codigo_sesion        = $r->codigo_sesion;
          $evaluacion_respuesta            = $r->respuesta;
          $evaluacion_formatoA             = $r->formatoA;
          $evaluacion_formatoB             = $r->formatoB;
          $evaluacion_burnout              = $r->burnout;
      }

      if($evaluacion_respuesta=='0') {$tip = 'display: block;';}else{$tip = 'display: none;';}
    } 

    if(!isset($tip)) $tip = 'display: none;';
    
?>
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

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-sm-3 col-xl-3">
          <div class="card">
            <div class="card-header text-center" style="background-color: #009188; color: white;">
                Crear Evaluacion
            </div>
            <div class="card-body">
              <form action="../../config/evaluacion_add_edit.php" method="POST" name="forevaluacion" enctype="multipart/form-data" >

                <div id='mensaje'> </div>

                <div class="form-group">
                  <label for="companies_id">Empresas</label>
                  <select class="form-control" id="companies_id" name="companies_id">
                      <option value=''>Seleccione una Empresa</option>
                      <?php 
                          $selected ='';
                          foreach($DatosEmpresas as $empresas) {
                              if($evaluacion_companies==$empresas['id']){
                                  $selected = 'selected';
                              }else{
                                  $selected = '';
                              }

                              echo "<option value='".$empresas['id']."'  $selected>".$empresas['nombre']."</option>";
                          }
                      ?>
                  </select>
                  <input type="hidden" class="form-control" id="evaluacion_id" name="evaluacion_id" value="<?php echo $evaluacion_id ?>">
                </div>

                <div class="form-group">
                  <label for="cities_id">Ciudades</label>
                  <select class="form-control" id="cities_id" name="cities_id">
                      <option value=''>Seleccione una Ciudad</option>
                      <?php 
                          $selected ='';
                          foreach($DatosCiudades as $ciudades) {
                              if($evaluacion_cities==$ciudades['id']){
                                  $selected = 'selected';
                              }else{
                                  $selected = '';
                              }

                              echo "<option value='".$ciudades['id']."'  $selected>".$ciudades['nombre']."</option>";
                          }
                      ?>
                  </select>
                </div>

                <div class="form-group">
                    <label for="codigo_sesion">Codigo por Sesion</label>
                    <input type="text" class="form-control" id="codigo_sesion" name="codigo_sesion" value="<?php echo $evaluacion_codigo_sesion ?>">
                </div>

                <div class="form-group">
                  <label for="respuesta">Respuesta</label>
                  <select class="form-control" id="respuesta" name="respuesta" onchange="showContent()">
                      <?php 
                          $select1 = $select2 = "";

                          if($evaluacion_respuesta=="0") $select1 = 'selected';
                          if($evaluacion_respuesta=="1") $select2 = 'selected'; 
                      ?>

                      <option value=''>Seleccione una Respuesta</option>
                      <option value='0' <?php echo $select1 ?> >Exitosa</option>
                      <option value='1' <?php echo $select2 ?> >Aplazada</option>
                  </select>
                </div>

                <div class="form-group" style="<?php echo $tip; ?>" id="content">
                    <label for="formatoA">Personas Evaluadas FormatoA</label>
                    <input type="number" class="form-control" id="formatoA" name="formatoA" value="<?php echo $evaluacion_formatoA ?>">
                
                    <label for="formatoB">Personas Evaluadas FormatoB</label>
                    <input type="number" class="form-control" id="formatoB" name="formatoB" value="<?php echo $evaluacion_formatoB ?>">
               
                    <label for="burnout">Personas Evaluadas Burnout</label>
                    <input type="number" class="form-control" id="burnout" name="burnout" value="<?php echo $evaluacion_burnout ?>">
                </div>

                <input type="button" class="btn btn-primary" onclick="ValidarInformacionEvaluacion()" value='Guardar'>
                <a class='btn btn-secondary' onclick="LimpiarInformacionEvaluacion()" > Limpiar </a>            
              </form>
            </div>
          </div>
        </div> 

        <div class="col-sm-9 col-xl-9">
          <div class="card">
            <div class="card-header text-center" style="background-color: #009188; color: white;">
                Listado de Evaluaciones
            </div>
            <div class="card-body">
              <table class="table">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Respuesta</th>
                    <th scope="col">Herramienta</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                      foreach($DatosEvaluaciones as $evaluacion) {
                        
                        if($evaluacion['respuesta']=="0"){
                          $estado = 'Exitosa';
                        }elseif($evaluacion['respuesta']=="1"){
                          $estado = 'Aplazada';
                        }else{
                          $estado = '';
                        }

                        echo "<tr>";
                        echo "  <th scope='row'>".$evaluacion['id']."</th>";
                        echo "  <td>".$evaluacion['empresa']."</td>";
                        echo "  <th scope='row'>".$estado."</th>";
                        echo "  <td>
                                  <a class='btn btn-secondary btn-sm' href='./evaluaciones.php?id=".$evaluacion['id']."'>
                                      <i class='material-icons'>edit</i>
                                  </a>
                                  <a class='btn btn-danger btn-sm' href='../../config/evaluacion_delete.php?id=".$evaluacion['id']."'>
                                      <i class='material-icons'>delete</i> 
                                  </a>
                                </td>";
                        echo "</tr>";
                      }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div> 
      </div> 
    </div>   

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../../js/jquery.slim.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../js/validaciones.js"></script>    

    </body>
</html>