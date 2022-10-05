<?php 
     include_once("../../config/config.php");
     include_once("../../config/ruta.php");

    session_start();
    $role = $_SESSION['sess_userrole'];
    $usuario = $_SESSION['sess_user_id'];

    $conexion = new Database;  
    $resultGrupos = $conexion->DatosGrupos();

    $conexion = new Database;  
    $resultFormatoBIntralaboral = $conexion->DatosFormatoBIntralaboral();

    $conexion = new Database;  
    $resultFormatoBExtralaboral = $conexion->DatosFormatoBExtralaboral();
    
    
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
          <form action="../../config/formatoB.php" method="POST" role="form" name="formatoB">  

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
                        <a class="list-group-item list-group-item-action active" data-toggle="list" href="#intralaboral" role="tab">PSICOSOCIALES INTRALABORAL</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#extralaboral" role="tab">PSICOSOCIALES EXTRALABORAL</a>
                    </div>
                  </div>
                  <div class="col-md-10">
                    <div class="card-body">
                      <!-- Tab panes -->
                      <div class="tab-content">
                        <div class="tab-pane active" id="intralaboral" role="tabpanel">
                          <header>
                            <h3>FACTORES DE RIESGO PSICOSOCIAL INTRALABORAL</h3>
                          </header>
                          <br>
                          <table class="table">
                            <thead class="thead-light">
                              <tr>
                                <td style="border: 0px"></th>
                                <td style="border: 0px"></th>
                                <th scope="col">Respuesta</th>
                              </tr>
                            </thead>
                            <tbody class="text-left">
                              <?php 
                                $conteo_intralaboral = 0;
                                foreach($resultFormatoBIntralaboral as $FormatoBIntralaboral) { 
                              ?>

                                <tr>
                                  <th scope="row"> <?php echo $FormatoBIntralaboral['pre_codigo'] ?></th>
                                  <td> <?php echo $FormatoBIntralaboral['pre_nombre'] ?></td>
                                  <td class="text-center">
                                    <select class="form-control" id="intralaboral<?php echo $FormatoBIntralaboral['pre_codigo'] ?>" name="intralaboral<?php echo $FormatoBIntralaboral['pre_codigo'] ?>">
                                      <option value=''>Seleccione una Respuesta</option>
                                      <?php
                                        $conexion = new Database;  
                                        $resultRespuestas = $conexion->DatosRespuestas();

                                        foreach($resultRespuestas as $respuestas) {
                                          echo "<option value='".$respuestas['res_codigo']."'>".$respuestas['res_nombre']."</option>";
                                        }
                                      ?>
                                    </select>
                                  </td>
                                </tr>
                              <?php 
                                  $conteo_intralaboral++;
                                } 
                              ?>

                              <input type="hidden" class="form-control" id="conteo_intralaboral" name="conteo_intralaboral" value="<?php echo $conteo_intralaboral ?>">
                
                            </tbody>
                          </table>
                        </div>
                        <div class="tab-pane" id="extralaboral" role="tabpanel">
                          <header>
                            <h3>FACTORES PSICOSOCIALES EXTRALABORALES</h3>
                          </header>
                          <br>
                          <table class="table">
                            <thead class="thead-light">
                              <tr>
                                <td style="border: 0px"></th>
                                <td style="border: 0px"></th>
                                <th scope="col">Respuesta</th>
                              </tr>
                            </thead>
                            <tbody class="text-left">
                              <?php 
                                $conteo_extralaboral = 0;
                                foreach($resultFormatoBExtralaboral as $FormatoBExtralaboral) { 
                              ?>
                                <tr>
                                  <th scope="row"> <?php echo $FormatoBExtralaboral['pre_codigo'] ?></th>
                                  <td> <?php echo $FormatoBExtralaboral['pre_nombre'] ?></td>
                                  <td class="text-center">
                                    <select class="form-control" id="extralaboral<?php echo $FormatoBExtralaboral['pre_codigo'] ?>" name="extralaboral<?php echo $FormatoBExtralaboral['pre_codigo'] ?>">
                                      <option value=''>Seleccione una Respuesta</option>
                                      <?php
                                        $conexion = new Database;  
                                        $resultRespuestas = $conexion->DatosRespuestas();

                                        foreach($resultRespuestas as $respuestas) {
                                          echo "<option value='".$respuestas['res_codigo']."'>".$respuestas['res_nombre']."</option>";
                                        }
                                      ?>
                                    </select>
                                  </td>
                                </tr>
                                
                              <?php 
                                  $conteo_extralaboral++;
                                } 
                              ?>

                              <input type="hidden" class="form-control" id="conteo_extralaboral" name="conteo_extralaboral" value="<?php echo $conteo_extralaboral ?>">
                
                            </tbody>
                          </table>
                        </div>
                      </div>

                      <br>
                      <div class="col-md-4">
                        <input type="button" class="btn btn-primary"  onclick="EnviarDatosFormatoB()" value='Guardar'>
                        <!--<button class="btn btn-sm btn-primary btn-block" type="submit">Guardar</button>-->
                      </div>
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
