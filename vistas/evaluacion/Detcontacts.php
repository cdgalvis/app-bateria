
<?php 
    include_once("../../config/config.php");
    include_once("../../config/ruta.php");

    $empresa    = $_REQUEST['q'];
    $evaluacion = $_REQUEST['q2'];

    $conexion = new Database;  
    $resultContacts = $conexion->DatosDetContactosEvalu($empresa,$evaluacion);

?>

<div class="table-responsive">
  <table style="overflow-y: hidden" class="table">
        <thead>
            <tr class="text-white" style="background-color: #009188;">
                <th>Nombres</th>
                <th>Herramientas</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach ($resultContacts as $contacts) {
                    echo "<tr>";
                        echo "<td>".$contacts['nombres']."</td>";
                        echo "<td> <a class='btn btn-danger btn-sm' href='../../config/evaluacion_det_delete.php?id=".$contacts['id']."&eval=".$contacts['evaluacion_id']."&emp=".$contacts['companies_id']."'><i class='material-icons'>delete</i></a></td>";
                    echo "</tr>";
                }

            ?>
        </tbody>
    </table>
</div>