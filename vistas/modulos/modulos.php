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
    $resultListaModulos = $conexion->DatosListaModulos();

    $mod_id = $mod_nombre = $mod_visible = $mod_url = $groups_id = "";
    if(isset($_GET['id'])) {

      $id = $_GET['id'];
      $conexion = new Database;    
      $result = $conexion->editModulos($id);

      foreach($result->fetchAll(PDO::FETCH_OBJ) as $r){
          $mod_id       = $r->id;
          $mod_nombre   = $r->mod_nombre;
          $mod_visible  = $r->mod_visible;
          $mod_url      = $r->mod_url;
          $groups_id    = $r->groups_id;
      }
    } 
    
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
                Crear Modulo
            </div>
            <div class="card-body">
              <form action="../../config/modulo_add_edit.php" method="POST" name="formodulo">

                <div id='mensaje'> </div>

                <div class="form-group">
                    <label for="mod_nombre">Nombre Modulo</label>
                    <input type="hidden" class="form-control" id="mod_id" name="mod_id" value="<?php echo $mod_id ?>">
                    <input type="text" class="form-control" id="mod_nombre" name="mod_nombre" value="<?php echo $mod_nombre ?>">
                </div>

                <div class="form-group">
                    <label for="mod_url">URL</label>
                    <input type="text" class="form-control" id="mod_url" name="mod_url" value="<?php echo $mod_url ?>">
                </div>

                <div class="form-group">
                  <label for="mod_visible">Estado</label>
                  <select class="form-control" id="mod_visible" name="mod_visible">
                      <?php 
                          $select1 = $select2 = "";

                          if($mod_visible=="0") $select1 = 'selected';
                          if($mod_visible=="1") $select2 = 'selected'; 
                      ?>

                      <option value=''>Seleccione un Estado</option>
                      <option value='0' <?php echo $select1 ?> >Activo</option>
                      <option value='1' <?php echo $select2 ?> >Inactivo</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="groups_id">Grupo</label>
                  <select class="form-control" id="groups_id" name="groups_id">
                      <option value=''>Seleccione un Grupo</option>
                      <?php 
                          $conexion = new Database;  
                          $resultGrupos = $conexion->DatosGrupos();
                          
                          $selected ='';
                          foreach($resultGrupos as $grupo) {
                              if($groups_id==$grupo['id']){
                                  $selected = 'selected';
                              }else{
                                  $selected = '';
                              }

                              echo "<option value='".$grupo['id']."'  $selected>".$grupo['gru_nombre']."</option>";
                          }
                      ?>
                  </select>
                </div>

                <input type="button" class="btn btn-primary" onclick="ValidarInformacionModulo()" value='Guardar'>
                <a class='btn btn-secondary' onclick="LimpiarInformacionModulo()" > Limpiar </a>
              </form>
            </div>
          </div>
        </div> 

        <div class="col-sm-9 col-xl-9">
          <div class="card">
            <div class="card-header text-center" style="background-color: #009188; color: white;">
                Listado de Modulos
            </div>
            <div class="card-body">
              <table class="table">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Herramienta</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 

                      foreach ($resultListaModulos as $modulos) {

                        if($modulos['mod_visible']=="0"){
                          $estado = 'Activo';
                        }elseif($modulos['mod_visible']=="1"){
                          $estado = 'Inactivo';
                        }else{
                          $estado = '';
                        }

                        echo "<tr>";
                        echo "  <th scope='row'>".$modulos['id']."</th>";
                        echo "  <td>".$modulos['mod_nombre']."</td>";
                        echo "  <td>".$estado."</td>";
                        echo "  <td>
                                  <a class='btn btn-secondary btn-sm' href='./modulos.php?id=".$modulos['id']."'>
                                      <i class='material-icons'>edit</i>
                                  </a>
                                  <a class='btn btn-danger btn-sm' href='../../config/modulo_delete.php?id=".$modulos['id']."'>
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