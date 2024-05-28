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
    <script src="https://kit.fontawesome.com/abdd954b71.js" crossorigin="anonymous"></script>
    <!--CSS MAIN-->
    <link rel="stylesheet" href="../public/css/stylesOptionReport.css">
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
                <img id="BannerPal" src="../public/img/SelectionReportType.svg" alt="Descripción de la imagen">
            </div>

            <div class="titleBanner">
                <div class="titleB">
                <span class="titlebannerSpan">Reportes</span>
                <span class="subtitlebannerSpan">Selecciona el tipo de reporte</span>
            </div>

            <div class="RpActivaciones  shadowBoxOptios">
                <i class="fa-solid fa-land-mine-on BoxIconSize"></i>
                <span class="titleBoxMenu">Activaciones</span>
                <span class="subtitleBoxMenu">Reporte de eventos</span>    
            </div>

            <a class="titleBoxMenu" style="text-decoration: none;" href="<?php echo site_url('/TecReport'); ?>">
            <div class="RpTecnicos  shadowBoxOptios">
                <i class="fa-solid fa-screwdriver-wrench BoxIconSize"></i>
                <span class="titleBoxMenu">Trabajos</span>
                <span class="subtitleBoxMenu">Trabajos realizados</span>    
            </div>
            </a>
            
            <div class="RpOperador  shadowBoxOptios">
                <i class="fa-solid fa-user-tie BoxIconSize"></i>
                <span class="titleBoxMenu">Administrativo</span>
                <span class="subtitleBoxMenu">Seguimientos</span>    
            </div>

            <div class="RpReaccion  shadowBoxOptios">
                <i class="fa-solid fa-shield BoxIconSize"></i>
                <span class="titleBoxMenu">Eventos</span>
                <span class="subtitleBoxMenu">Eventos confirmados</span>    
            </div>

            <div class="RpTodos  shadowBoxOptios">
                <i class="fa-solid fa-file-lines BoxIconSize"></i>
                <span class="titleBoxMenu">Todos</span>
                <span class="subtitleBoxMenu">Todos los registros</span>        
            </div>
      
            </div>
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