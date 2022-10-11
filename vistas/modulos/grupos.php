<!DOCTYPE html>
<?php 
    include_once("../../config/config.php");
    include_once("../../config/ruta.php");

    session_start();
    $role = $_SESSION['sess_userrole'];
    $usuario = $_SESSION['sess_user_id'];

    $conexion = new Database;  
    $resultGrupos = $conexion->DatosGrupos();

    $gru_id = $gru_nombre = $gru_visible = $gru_url = "";
    if(isset($_GET['id'])) {

      $id = $_GET['id'];
      $conexion = new Database;    
      $result = $conexion->editGrupos($id);

      foreach($result->fetchAll(PDO::FETCH_OBJ) as $r){
          $gru_id           = $r->id;
          $gru_nombre   = $r->gru_nombre;
          $gru_visible  = $r->gru_visible;
          $gru_url      = $r->gru_url;
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
                Crear Grupo
            </div>
            <div class="card-body">
              <form action="../../config/grupo_add_edit.php" method="POST" name="forgrupo">

                <div id='mensaje'> </div>

                <div class="form-group">
                    <label for="gru_nombre">Nombre Grupo</label>
                    <input type="hidden" class="form-control" id="gru_id" name="gru_id" value="<?php echo $gru_id ?>">
                    <input type="text" class="form-control" id="gru_nombre" name="gru_nombre" value="<?php echo $gru_nombre ?>">
                </div>

                <div class="form-group">
                    <label for="gru_url">URL</label>
                    <input type="text" class="form-control" id="gru_url" name="gru_url" value="<?php echo $gru_url ?>">
                </div>

                <div class="form-group">
                  <label for="gru_visible">Estado</label>
                  <select class="form-control" id="gru_visible" name="gru_visible">
                      <?php 
                          $select1 = $select2 = "";

                          if($gru_visible=="0") $select1 = 'selected';
                          if($gru_visible=="1") $select2 = 'selected'; 
                      ?>

                      <option value=''>Seleccione un Estado</option>
                      <option value='0' <?php echo $select1 ?> >Activo</option>
                      <option value='1' <?php echo $select2 ?> >Inactivo</option>
                  </select>
                </div>

                <input type="button" class="btn btn-primary" onclick="ValidarInformacionGrupo()" value='Guardar'>
                <a class='btn btn-secondary' onclick="LimpiarInformacionGrupo()" > Limpiar </a>
              </form>
            </div>
          </div>
        </div> 

        <div class="col-sm-9 col-xl-9">
          <div class="card">
            <div class="card-header text-center" style="background-color: #009188; color: white;">
                Listado de Grupos
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
                      $conexion = new Database;  
                      $resultGrupos = $conexion->DatosGrupos();

                      foreach ($resultGrupos as $grupos) {

                        if($grupos['gru_visible']=="0"){
                          $estado = 'Activo';
                        }elseif($grupos['gru_visible']=="1"){
                          $estado = 'Inactivo';
                        }else{
                          $estado = '';
                        }

                        echo "<tr>";
                        echo "  <th scope='row'>".$grupos['id']."</th>";
                        echo "  <td>".$grupos['gru_nombre']."</td>";
                        echo "  <td>".$estado."</td>";
                        echo "  <td>
                                  <a class='btn btn-secondary btn-sm' href='./grupos.php?id=".$grupos['id']."'>
                                      <i class='material-icons'>edit</i>
                                  </a>
                                  <a class='btn btn-danger btn-sm' href='../../config/grupo_delete.php?id=".$grupos['id']."'>
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