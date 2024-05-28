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

    <div class="ReportPreviewContainer">
    <div class="bannerPreview">
    <img id="BannerPal" src="../public/img/LoadingReport.svg" alt="Descripción de la imagen">
    <span class="txtbaner">Aqui se mostrara tu reporte!</span>
    </div>

</div>

     

    <div class="ReportOptionsContainer">

        <div class="titleReportOptionsContainer">
        <span class="OptionTitle">Opciones de reporte</span>
        <span class="OptionSubTitle">Ajuste su reporte segun sus necesidades</span>
        </div>

        <div class="ReportForm">

        <form action="reporte.php" method="POST">

        <label for="">Tipo de busqueda</label>
        <select name="tipoBusqueda" id="tipoBusqueda" class="form-select" aria-label="Default select example">
        <option value="1">Buscar por cliente</option>
        <option value="2">Buscar por placa</option>
        </select>


        <label for="" style="margin-top: 20px;">Tipo de reporte</label>
        <select name="tipoReporte" id="tiporeporte" class="form-select" aria-label="Default select example">
        <option value="1">Trabajos realizados</option>
        <option value="2">Segimientos Administrativos</option>
        <option value="3">Eventos confirmados</option>
        <option value="4">Activaciones</option>
        <option value="5">Todos los registros</option>
        </select>

        <label for="Placa" style="margin-top: 20px;">Numero de placa</label>
        <input type="text" name="Placa" id="Placa" class="form-control"></input>

        <label for="Placa" style="margin-top: 20px;">Desde</label>
        <input type="date" id="start" name="trip-start" value="2018-07-22" min="2018-01-01" max="2018-12-31" />
        <br>
        <label for="Placa" style="margin-top: 20px;">Hasta</label>
        <input type="date" id="start" name="trip-start" value="2018-07-22" min="2018-01-01" max="2018-12-31" />


        <button type="submit" class="btn btn-primary" style="margin-top: 20px;">Generar</button>
        <button type="submit" class="btn btn-primary" style="margin-top: 20px;">Descargar</button>

        </form>
        </div>
        
    </div>


</div>

















 <!--ALERTAS-->
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!--JQUERY-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <!--JS MAIN LOCAL-->
        <script src="../public/js/tablas.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <!--DATATABLE JS-->
        <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>


</body>
</html>