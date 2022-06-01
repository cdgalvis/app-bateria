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

    $empresa_id = $empresa_documento = $empresa_nombre = $empresa_direccion = $empresa_telefono = $empresa_nombre_contacto = $empresa_registro_evaluacion = $empresa_active = "";
    if(isset($_GET['id'])) {

      $id = $_GET['id'];
      $conexion = new Database;    
      $result = $conexion->editEmpresa($id);

      foreach($result->fetchAll(PDO::FETCH_OBJ) as $r){
          $empresa_id                   = $r->id;
          $empresa_documento            = $r->documento;
          $empresa_nombre               = $r->nombre;
          $empresa_direccion            = $r->direccion;
          $empresa_telefono             = $r->telefono;
          $empresa_nombre_contacto      = $r->nombre_contacto;
          $empresa_registro_evaluacion  = $r->registro_evaluacion;
          $empresa_active               = $r->active;
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
                Crear Empresa
            </div>
            <div class="card-body">
              <form action="../../config/empresa_add_edit.php" method="POST" name="forempresas" enctype="multipart/form-data" >

                <div id='mensaje'> </div>

                <div class="form-group">
                    <label for="documento">Nit</label>
                    <input type="text" class="form-control" id="documento" name="documento" value="<?php echo $empresa_documento ?>">
                    <input type="hidden" class="form-control" id="empresa_id" name="empresa_id" value="<?php echo $empresa_id ?>">
                </div>

                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $empresa_nombre ?>">
                </div>

                <div class="form-group">
                    <label for="direccion">Dirección principal</label>
                    <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $empresa_direccion ?>">
                </div>

                <div class="form-group">
                    <label for="telefono">Telefono</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $empresa_telefono ?>">
                </div>

                <div class="form-group">
                    <label for="nombre_contacto">Nombre de Contacto</label>
                    <input type="text" class="form-control" id="nombre_contacto" name="nombre_contacto" value="<?php echo $empresa_nombre_contacto ?>">
                </div>

                <div class="form-group">
                    <label for="registro_evaluacion">Registro de la evaluación</label>
                    <input type="text" class="form-control" id="registro_evaluacion" name="registro_evaluacion" value="<?php echo $empresa_registro_evaluacion ?>">
                </div>

                <div class="form-group">
                  <label for="active">Estado</label>
                  <select class="form-control" id="active" name="active">
                      <?php 
                          $select1 = $select2 = "";

                          if($empresa_active=="0") $select1 = 'selected';
                          if($empresa_active=="1") $select2 = 'selected'; 
                      ?>

                      <option value=''>Seleccione un Estado</option>
                      <option value='0' <?php echo $select1 ?> >Activo</option>
                      <option value='1' <?php echo $select2 ?> >Inactivo</option>
                  </select>
                </div>

                <div class="form-group">
                    <label for="name">Listado usuarios <a href="../../docs/LibroUsuarios.xlsx" download="LibroUsuarios.xlsx">Formato</a></label>
                    <input type="file" class="form-control-file" id="name" name="name" placeholder="Archivo (.xlsx)">
                </div>

                <input type="button" class="btn btn-primary" onclick="ValidarInformacionEmpresa()" value='Guardar'>
                <a class='btn btn-secondary' onclick="LimpiarInformacionEmpresa()" > Limpiar </a>            
              </form>
            </div>
          </div>
        </div> 

        <div class="col-sm-9 col-xl-9">
          <div class="card">
            <div class="card-header text-center" style="background-color: #009188; color: white;">
                Listado de Empresas
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
                      foreach($DatosEmpresas as $empresas) {
                        
                        if($empresas['active']=="0"){
                          $estado = 'Activo';
                        }elseif($empresas['active']=="1"){
                          $estado = 'Inactivo';
                        }else{
                          $estado = '';
                        }

                        echo "<tr>";
                        echo "  <th scope='row'>".$empresas['id']."</th>";
                        echo "  <td>".$empresas['nombre']."</td>";
                        echo "  <th scope='row'>".$estado."</th>";
                        echo "  <td>
                                  <a class='btn btn-secondary btn-sm' href='./empresas.php?id=".$empresas['id']."'>
                                      <i class='material-icons'>edit</i>
                                  </a>
                                  <a class='btn btn-danger btn-sm' href='../../config/empresa_delete.php?id=".$empresas['id']."'>
                                      <i class='material-icons'>delete</i> 
                                  </a>
                                  <a class='btn btn-info btn-sm' href='./detalle.php?id=".$empresas['id']."'>
                                      <i class='material-icons'>info</i> 
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