$(document).ready( function () {
    $('#tablafontsize').DataTable();
}); 







<table id="tablafontsize" class="table table-hover">
<thead id="thead-fixed">
    <tr>
        <th>Identificador</th>
        <th>Cliente</th>
        <th>Placa</th>
        <th>Fecha GPS</th>
        <th>Estado</th>
        <th>Acciones</th>
    </tr>
</thead>
<tbody>
    <?php foreach ($datos as $index => $car) : ?>
        <tr>
           
            <td><?= $car['identificador'] ?></td>
            <td><?= $car['nombre_cuenta'] ?></td>
            <td><?= $car['placa'] ?></td>
            <td><?= $car['fecha_gps_malo'] ?></td>
            <td><?= $car['estado'] ?></td>
            <td>
            <button class="view-data-btn" data-index="<?= $index ?>">Ver datos</button>
        <!--img class="viewDataContent" data-index="<?= $index ?>" width="20px" src="../public/img/cargardatosbtn.png">
    -->
    </td>
        </tr>
    <?php endforeach; ?>
</tbody>
</table>