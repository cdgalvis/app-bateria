<!DOCTYPE html>
<?php 
    include_once("../../config/config.php");
    include_once("../../config/ruta.php");

    session_start();
    $role = $_SESSION['sess_userrole'];
    $usuario = $_SESSION['sess_user_id'];
    $empresa_id = $_GET['id'];

    $conexion = new Database;  
    $resultGrupos = $conexion->DatosGrupos();

    $conexion = new Database;  
    $DatosContactosEmpresa = $conexion->DatosContactosEmpresa($empresa_id);

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
        <div class="col-sm-9 col-xl-9">
          <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #009188; color: white;">
                <?php echo $empresa_nombre; ?> - Listado de Contactos
                <a class='btn btn-danger btn-sm' href='./empresas.php'> Regresar </a>
            </div>
            <div class="card-body">
              <table class="table">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Tipo</th>
                    <th scope="col">Documento</th>
                    <th scope="col">Nombre</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                      foreach($DatosContactosEmpresa as $contactos) {
                        echo "<tr>";
                        echo "  <td>".$contactos['tipo_documento']."</td>";
                        echo "  <td>".$contactos['identificacion']."</td>";
                        echo "  <td>".$contactos['nombres'].' '.$contactos['apellidos']."</td>";
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