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
    $roles = $conexion->DatosRoles();

    $rol_id = $rol_nombre = "";
    if(isset($_GET['id'])) {

      $id = $_GET['id'];
      $conexion = new Database;    
      $result = $conexion->editRol($id);

      foreach($result->fetchAll(PDO::FETCH_OBJ) as $r){
          $rol_id     = $r->id;
          $rol_nombre = $r->rol_nombre;
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
                Crear Rol
            </div>
            <div class="card-body">
              <form action="../../config/rol_add_edit.php" method="POST" name="forrole">

                <div id='mensaje'> </div>

                <div class="form-group">
                    <label for="nombres">Nombres</label>
                    <input type="hidden" class="form-control" id="rol_id" name="rol_id" value="<?php echo $rol_id ?>">
                    <input type="text" class="form-control" id="rol_nombre" name="rol_nombre" value="<?php echo $rol_nombre ?>">
                </div>

                <input type="button" class="btn btn-primary" onclick="ValidarInformacionRol()" value='Guardar'>
                <a class='btn btn-secondary' onclick="LimpiarInformacionRol()" > Limpiar </a>
              </form>
            </div>
          </div>
        </div> 

        <div class="col-sm-9 col-xl-9">
          <div class="card">
            <div class="card-header text-center" style="background-color: #009188; color: white;">
                Listado de Roles
            </div>
            <div class="card-body">
              <table class="table">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Herramienta</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                      foreach($roles as $rol) {
                        echo "<tr>";
                        echo "  <th scope='row'>".$rol['id']."</th>";
                        echo "  <td>".$rol['rol_nombre']."</td>";
                        echo "  <td>
                                  <a class='btn btn-secondary btn-sm' href='./roles.php?id=".$rol['id']."'>
                                      <i class='material-icons'>edit</i>
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