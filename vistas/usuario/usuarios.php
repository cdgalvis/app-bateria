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

    $conexion = new Database;  
    $DatosUsuarios = $conexion->DatosUsuarios();

    $user_id = $tipo_documento = $user_username = $user_password = $user_nombres = $user_apellidos = $user_identificacion = $user_roles_id = $user_email = $user_active = "";
    if(isset($_GET['id'])) {

      $id = $_GET['id'];
      $conexion = new Database;    
      $result = $conexion->editUsuario($id);

      foreach($result->fetchAll(PDO::FETCH_OBJ) as $r){
          $user_id              = $r->id;
          $user_username        = $r->username;
          $user_password        = $r->password;
          $user_nombres         = $r->nombres;
          $user_apellidos       = $r->apellidos;
          $user_identificacion  = $r->identificacion;
          $user_roles_id        = $r->roles_id;
          $user_email           = $r->email;
          $user_active          = $r->active;
          $tipo_documento       = $r->tipo_documento;
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
                Crear Usuario
            </div>
            <div class="card-body">
              <form action="../../config/usuario_add_edit.php" method="POST" name="forregistro">

                <div id='mensaje'> </div>

                <div class="form-group">
                  <label for="tipo_documento">Tipo de Documento:</label>
                  <select class="form-control" name="tipo_documento" id="tipo_documento">
                    <?php 
                          $select1 = $select2 = $select3 = "";

                          if($tipo_documento=="CEDULA")     $select1 = 'selected';
                          if($tipo_documento=="NIT")        $select2 = 'selected'; 
                          if($tipo_documento=="PASAPORTE")  $select3 = 'selected'; 
                    ?>

                    <option value="">Seleccione un tipo de documento...</option>
                    <option value="CEDULA" <?php echo $select1 ?> >CEDULA</option>
                    <option value="NIT" <?php echo $select2 ?>>NIT</option>
                    <option value="PASAPORTE" <?php echo $select3 ?>>PASAPORTE</option>
                  </select>
                </div>

                <div class="form-group">
                    <label for="identificacion">Identificacion</label>
                    <input type="text" class="form-control" id="identificacion" name="identificacion" value="<?php echo $user_identificacion ?>">
                    <input type="hidden" class="form-control" id="id_usuario" name="id_usuario" value="<?php echo $user_id ?>">
                </div>

                <div class="form-group">
                    <label for="nombres">Nombres</label>
                    <input type="text" class="form-control" id="nombres" name="nombres" value="<?php echo $user_nombres ?>">
                </div>

                <div class="form-group">
                    <label for="apellidos">Apellidos</label>
                    <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo $user_apellidos ?>">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $user_email ?>">
                </div>

                <div class="form-group">
                    <label for="username">Usuario</label>
                    <input type="username" class="form-control" id="usernameregis" name="usernameregis" aria-describedby="usernameHelp" value="<?php echo $user_username ?>">
                    <small id="usernameHelp" class="form-text text-muted">Nunca compartiremos su usuario con nadie más.</small>
                </div>
                <div class="form-group">
                    <label for="passw">Contraseña</label>
                    <input type="password" class="form-control" id="passwregis" name="passwregis" value="<?php echo $user_password ?>">
                </div>

                <div class="form-group">
                    <label for="confirpassword">Confirmar Contraseña</label>
                    <input type="password" class="form-control" id="confirpassword" name="confirpassword" value="<?php echo $user_password ?>">
                </div>

                <div class="form-group">
                  <label for="roles">Rol</label>
                  <select class="form-control" id="roles" name="roles">
                      <option value=''>Seleccione un Rol</option>
                      <?php 
                          $selected ='';
                          foreach($roles as $rol) {
                              if($user_roles_id==$rol['id']){
                                  $selected = 'selected';
                              }else{
                                  $selected = '';
                              }

                              echo "<option value='".$rol['id']."'  $selected>".$rol['rol_nombre']."</option>";
                          }
                      ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="active">Estado</label>
                  <select class="form-control" id="active" name="active">
                      <?php 
                          $select1 = $select2 = "";

                          if($user_active=="0") $select1 = 'selected';
                          if($user_active=="1") $select2 = 'selected'; 
                      ?>

                      <option value=''>Seleccione un Estado</option>
                      <option value='0' <?php echo $select1 ?> >Activo</option>
                      <option value='1' <?php echo $select2 ?> >Inactivo</option>
                  </select>
                </div>

                <input type="button" class="btn btn-primary" onclick="ValidarInformacionUsuario()" value='Guardar'>
                <a class='btn btn-secondary' onclick="LimpiarInformacionUsuario()" > Limpiar </a>            
              </form>
            </div>
          </div>
        </div> 

        <div class="col-sm-9 col-xl-9">
          <div class="card">
            <div class="card-header text-center" style="background-color: #009188; color: white;">
                Listado de Usuarios
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
                      foreach($DatosUsuarios as $usuarios) {
                        
                        if($usuarios['active']=="0"){
                          $estado = 'Activo';
                        }elseif($usuarios['active']=="1"){
                          $estado = 'Inactivo';
                        }else{
                          $estado = '';
                        }

                        echo "<tr>";
                        echo "  <th scope='row'>".$usuarios['id']."</th>";
                        echo "  <td>".$usuarios['nombres'].' '.$usuarios['apellidos']."</td>";
                        echo "  <th scope='row'>".$estado."</th>";
                        echo "  <td>
                                  <a class='btn btn-secondary btn-sm' href='./usuarios.php?id=".$usuarios['id']."'>
                                      <i class='material-icons'>edit</i>
                                  </a>
                                  <a class='btn btn-danger btn-sm' href='../../config/usuario_delete.php?id=".$usuarios['id']."'>
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