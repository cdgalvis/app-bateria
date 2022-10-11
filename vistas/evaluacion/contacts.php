
<?php 
    include_once("../../config/config.php");
    include_once("../../config/ruta.php");

    $empresa = $_REQUEST['q'];

    $conexion = new Database;  
    $resultContacts = $conexion->DatosContactosEmpresa($empresa);

?>

<div class="table-responsive">
  <table style="overflow-y: hidden" class="table" id="table_id" class="display">
        <thead>
            <tr class="text-white" style="background-color: #009188;">
                <th>Seleccionar</th>
                <th>Nombres</th>
                <th>Identificacion</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $cont = 0; 

                foreach ($resultContacts as $contacts) {
                    $nombre = $contacts['nombres'].' '.$contacts['apellidos'];
                    $nombre1 = "'".$contacts['nombres'].' '.$contacts['apellidos']."'";
                    $id = $contacts["id"];
                    $identificacion = $contacts['identificacion'];
            ?>        
                <tr>
                    <td class='text-center'>
                        <input type='button' class='btn btn-primary' value="+" onclick="AgregarCont(<?php echo $id ?>,<?php echo $nombre1 ?>)">
                    </td>
                    <td> <?php echo  $nombre; ?>
                        <input type='hidden' name='companies$cont' id='companies$cont' class='form-control' value='<?php echo  $contacts['companies_id']; ?>'>
                        <input type='hidden' name='nombres$cont'   id='nombres$cont'   class='form-control' value='<?php echo  $contacts['nombres']; ?>'>
                        <input type='hidden' name='apellidos$cont' id='apellidos$cont' class='form-control' value='<?php echo  $contacts['apellidos']; ?>'>
                    </td>
                    <td> <?php echo  $identificacion; ?>
                        <input type='hidden' name='identificacion$cont' id='identificacion$cont' class='form-control' value='<?php echo  $contacts['identificacion']; ?>'>
                    </td>
                </tr>

            <?php  $cont++; } ?> 

            <input type='hidden' name='cont' id='cont' class='form-control' value='<?php echo $cont; ?>'>

        </tbody>
    </table>
</div>
<br>

<script>
    $(document).ready( function () {
        $('#table_id').DataTable();
    } );
</script>