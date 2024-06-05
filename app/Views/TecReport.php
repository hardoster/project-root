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

<div id="container2">
    
            <div class="Section1TecReport">
                <img src="../public/img/LoadingReport.svg" class="imgbanner2" alt=" ">
                <div class="t1 "><span class="titulos50">Reportes <span>GPS</span></span></div>
                <div class="t2"><span class="fontfixsize16">Selecciona las opciones para tu reporte</span></div>
                <div class="t3"><span class="fontfixsize14">recuerda seleccionar todos los campos para generar correctamente</span></div>
            </div>

            <form action="CustomerReport" class="Section2TecReport" method="POST">
                    <div class="flrow">
                    <span class="titulos50thin">Opciones</span>
                    <SPAN class="fontfixsize16">selecciona las condiciones</SPAN>
                    </div>
                    <div class="tipobusquedacontainer">
                    <label for="">Tipo de busqueda</label>
                    <select name="tipoBusqueda" id="tipoBusqueda" class="form-select" aria-label="Default select example">
                    <option value="1">Buscar por cliente</option>
                    <option value="2">Buscar por placa</option>
                    </select>
            
                    </div>
                    <div id="placaInput" class="paddingboxes" style="margin-top: 10px;">
                        <input class="form-control" type="text" name="Placa" id="Placa" placeholder="Ingrese el numero de placa"></input>
                    </div>
                   
                
                
                    <div id="CuentaInput" class="paddingboxes" style="margin-top: 10px;">
                        <input class="form-control" type="text" name="cuenta" id="cuenta" placeholder="Ingrese el nombre de la cuenta">
                    </div>
                    <div class="paddingboxes">

                    <label for="" style="margin-top: 20px;">Tipo de reporte</label>
                    <select name="tipoReporte" id="tiporeporte" class="form-select" aria-label="Default select example">
                    <option value="1">Trabajos realizados</option>
                    <option value="2">Administrativo</option>
                    <option value="3">Eventos confirmados</option>
                    <option value="5">Todos los registros</option>
                    </select>
                    </div>
                
                
                
                    <div class="paddingboxes">

                    <label class="form-label" for="start1" style="margin-top: 20px;">Desde</label>
                    <input class="form-control" type="datetime-local" id="start1" name="date_start" value="2024-05-01T00:00" min="2020-01-01T00:00" max="2025-12-31T23:59" required />
                    
                    <label class="form-label" for="start2" style="margin-top: 20px;">Hasta</label>
                    <input class="form-control" type="datetime-local" id="start2" name="date_end" value="2024-05-26T23:59" min="2020-01-01T00:00" max="2025-12-31T23:59" required />
                
                    </div>            

                <div class="buttonSubmitContainer paddingboxes">
                    <button type="submit" class="btn btn-primary" id="btnGenerar" style="margin-top: 20px;">Generar</button>
                </div>
            </form>
</div>

<script>
    
</script>

 <!--ALERTAS-->
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!--JQUERY-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <!--JS MAIN LOCAL-->
        <script src="../public/js/tablas.js"></script>
        <script src="../public/js/reports.js"></script>
        <script src="../public/js/ExportarExcel.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <!--DATATABLE JS-->
        <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>



</body>
</html>