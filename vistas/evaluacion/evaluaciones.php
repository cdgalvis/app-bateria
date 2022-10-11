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
    $DatosUsuarios = $conexion->DatosUsuarios();

    $conexion = new Database;  
    $DatosCiudades = $conexion->DatosCiudades();

    $conexion = new Database;  
    $DatosEvaluaciones = $conexion->DatosEvaluaciones();

    $conexion = new Database;  
    $CantSesion= $conexion->SesionEvaluaciones();

    $id_sesion = 1;
    foreach($CantSesion as $CantSes) {
        $id_sesion = $CantSes['id'];
    }
    

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
          $evaluacion_users                = $r->users_id;
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
    <link href="../../css/jquery.dataTables.css" rel="stylesheet">
    
  </head>
  <body>

    <?php include_once('../menu.php'); ?>

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-sm-12 col-xl-12">
          <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #009188; color: white;">
              <?php if(isset($_GET['id'])) { ?>
                Editar Evaluacion
              <?php }else{ ?>
                Crear Evaluacion
              <?php } ?>  
              <a href="<?= ROOT ?>vistas/evaluacion/listevaluaciones.php" class="btn btn-info">Regresar</a>
            </div>

            <div class="card-body">
              <form action="../../config/evaluacion_add_edit.php" method="POST" name="forevaluacion" enctype="multipart/form-data" >

                <div id='mensaje'> </div>

                <div class="form-group">
                  <label for="companies_id">Empresas</label>
                  <select class="form-control" id="companies_id" name="companies_id" onchange="BuscarContactos(2);showBuscar1()">
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
                  <label for="users_id">Usuario</label>
                  <select class="form-control" id="users_id" name="users_id">
                      <option value=''>Seleccione un usuario</option>
                      <?php 
                          $selected ='';
                          foreach($DatosUsuarios as $usuarios) {
                              if($evaluacion_users==$usuarios['id']){
                                  $selected = 'selected';
                              }else{
                                  $selected = '';
                              }

                              echo "<option value='".$usuarios['id']."'  $selected>".$usuarios['nombres'].' '.$usuarios['apellidos']."</option>";
                          }
                      ?>
                  </select>
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
                    <input type="text" class="form-control" id="codigo_sesion" name="codigo_sesion" value="<?php echo $id_sesion ?>" readonly>
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

                <div class="form-group" style="<?php //echo $tip; ?>" id="contentBus">
                    <input type="hidden" class="form-control"  name="busqueda" id="busqueda"  placeholder="Escribe para Buscar" style="width : 190px; heigth : 190px" onKeyUp="buscarRegistros(1);"> 
                </div> 

                <div id="loader"></div>
                <div class="outer_div" id='limpiar'></div>

                <div class="form-group" style="<?php echo $tip; ?>" id="contentBus2">
                  <div class="card">
                      <div class="card-header" style="background-color: #009188;"> 
                          Contactos Agregados
                      </div>
                      <div class="card-body">
                          <div id="items" class="row"> No hay elementos </div>
                      </div>
                  </div>
                </div> 

                <div id="loaderDet"></div>
                <div class="outer_div_Det" id='limpiar2'></div>

                <input type="button" class="btn btn-primary" onclick="ValidarInformacionEvaluacion()" value='Guardar'>
                <a class='btn btn-secondary' onclick="LimpiarInformacionEvaluaciones()" > Limpiar </a>
                <a class='btn btn-secondary' onclick="eliminarSession()" > Limpiar Contactos </a>            
              </form>
            </div>
          </div>
        </div> 
      </div> 
    </div>   

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../../js/jquery.dataTables.js"></script>

    

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../js/validaciones.js"></script>
    
    <script type="text/javascript">

        let items = sessionStorage.getItem('itemsList')
        items = items ? JSON.parse(items) : []

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


        function buscarRegistros(page){
          var q           = document.getElementById('companies_id').value;
          var txtbus      = $("input#busqueda").val();
          var parametros  = {"action":"ajax","page":page,"txtbus":txtbus,"q":q};

            $("#loader").fadeIn("slow");
            $.ajax({
                url:"./contactsbus.php",
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

        function showBuscar1() {
            let element     = document.getElementById("contentBus");
            element.style.display='block';

            let element2     = document.getElementById("contentBus2");
            element2.style.display='block';
            showItems()
        }

        function AgregarCont(id,nombre) {
          items.push({ 'id': id,'Nombre': nombre})
          sessionStorage.setItem('itemsList', JSON.stringify(items))
          showItems()
        }

        function showItems() {
          let html = ''
          let cont = 0
          items.forEach((i, index) => {
              html += `<div class="col-4 mb-3" > ${i.id} <input type="hidden" class="form-control" id="contac${cont}" name="contac${cont}" value="${i.id}"></div>`
              html += `<div class="col-4 mb-3" > ${i.Nombre} <input type="hidden" class="form-control" id="nom${cont}" name="nom${cont}" value="${i.Nombre}"></div>`
              html += `<div class="col"> <a href="#" onclick="deleteItem(${index})" class="btn btn-danger" >X</a> </div>`
              cont++
          })
          html += `<div class="col-4 mb-3" ><input type="hidden" class="form-control" id="cantidadContac" name="cantidadContac" value="${cont}"></div>`
          document.getElementById('items').innerHTML = html
        }

        function eliminarSession() {
            sessionStorage.clear();
            sessionStorage.removeItem('items');
            items= [];
            document.getElementById('items').innerHTML = ""
        }

        function deleteItem(item) {
            items.splice(item, 1)
            showItems()
        }

    </script>
      <?php
        if(isset($_GET['empresa'])) { 
          echo  '<script type="text/javascript"> BuscarContactos(2); BuscarDetContactos(); showBuscar1(); </script>';
        } 
      ?>
    </body>
</html>