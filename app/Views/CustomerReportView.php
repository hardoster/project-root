<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--BOOTSTRAP 5 PARA ALGUNOS DISE;OS RAPIDOS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--GOOGLE FONTS-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">

    <!--CSS MAIN-->
    <link rel="stylesheet" href="../public/css/stylesTecReport.css">
    <!--CSS NAVBAR-->
    <link rel="stylesheet" href="../public/css/navbarppal.css">
    <!--AWESOME PARA ICONOS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha384-xwfpv40gDwuMH5Q11c5XNPtxh+ToSibU++v2Z5AtnJhzphoJmWTvPeOyFZTh5m6v" crossorigin="anonymous">
    <!--DATA TABLE DE JQUERY-->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css" />


    <title>Document</title>
</head>

<header>
    <?php require_once('layoutnavbar.php') ?>
</header>

<body>

    <div id="container">
    

            <div class="titleReportOptionsContainer">
                <div class="flex"><span class="titulos24">Reporte <span class="titulo24blue">GPS</span></span></div>
                <div class="flex"><span class="subtitulos13">Puedes exportar tu reporte a excel</span></div>
                <div class="flex"><span class="subtitulos13">precionando el boton "Exportar"</span></div>
                <div id="btnExportar" class="btnExportar"><span>Exportar</span></div>
            </div>


            <div class="tableReports">
                <table id="tableReports" class="table table-hover subtitulos13">
                    <thead>
                        <tr>
                            <th>Registro</th>
                            <th>Nota</th>
                            <th>Usuario</th>
                            <th>Fecha nota</th>
                            <th>Código</th>
                            <th>Estado</th>
                            <th>Fecha registro</th>
                            <th>Placa</th>
                            <th>Cuenta</th>
                            <th>Disposición</th>
                            <th>Categoría</th>
                            <th>Técnico</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($reportData as $data) : ?>
                            <tr>
                                <td><?= $data->id_mr_records ?></td>
                                <td><?= $data->mr_note ?></td>
                                <td><?= $data->usuario ?></td>
                                <td><?= $data->notes_date_add ?></td>
                                <td><?= $data->TecCode ?></td>
                                <td><?= $data->status ?></td>
                                <td><?= $data->records_date_add ?></td>
                                <td><?= $data->placa ?></td>
                                <td><?= $data->nombre_cuenta ?></td>
                                <td><?= $data->mr_dispositionName ?></td>
                                <td><?= $data->mr_CategoryDisposition_name ?></td>
                                <td><?= $data->Nombre ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>


    


        <!--ALERTAS-->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!--JQUERY-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <!--JS MAIN LOCAL-->
        <script src="../public/js/tablas.js"></script>
        <script src="../public/js/reports.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <!--DATATABLE JS-->
        <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>



</body>

</html>