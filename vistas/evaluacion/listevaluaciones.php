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
        <div class="col-sm-12 col-xl-12">
          <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #009188; color: white;">
                Listado de Evaluaciones
                <a href="<?= ROOT ?>vistas/evaluacion/evaluaciones.php" class="btn btn-primary">Crear Evaluación</a>
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
                                  <a class='btn btn-secondary btn-sm' href='./evaluaciones.php?id=".$evaluacion['id']."&empresa=".$evaluacion['companies_id']."'>
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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../js/validaciones.js"></script>
    
    <script type="text/javascript">
        function BuscarContactos(page){
            var q           = document.getElementById('companies_id').value;            
            var parametros  = {"action":"ajax","page":page,"q":q};

            $("#loader").fadeIn("slow");
            $.ajax({
                url:"./contacts.php",
                data: parametros,
                beforeSend: function(objeto){
                    $('#loader').html('<img src="../../img/Reload-Image-Gif-1.gif">Cargando...')
                },
                success:function(data){
                    $(".outer_div").html(data).fadeIn('slow');
                    $('#loader').html('');
                }
            }) 
        }

        function BuscarDetContactos(){
            var q           = document.getElementById('companies_id').value;
            var q2          = document.getElementById('evaluacion_id').value;
                        
            var parametros  = {"action":"ajax","q":q,"q2":q2};

            $("#loaderDet").fadeIn("slow");
            $.ajax({
                url:"./Detcontacts.php",
                data: parametros,
                beforeSend: function(objeto){
                    $('#loaderDet').html('<img src="../../img/Reload-Image-Gif-1.gif">Cargando...')
                },
                success:function(data){
                    $(".outer_div_Det").html(data).fadeIn('slow');
                    $('#loaderDet').html('');
                }
            }) 
        }
    </script>
       <?php
      if(isset($_GET['empresa'])) { 
        echo  '<script type="text/javascript"> BuscarContactos(2); BuscarDetContactos(); </script>';
      } 
      ?>
    </body>
</html>