<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/stylesinicio.css">
    <link rel="stylesheet" href="../public/css/navbarppal.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../public/js/tablas.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Prueba Exactrack</title>
</head>
<body>

<?php  require_once('layoutnavbar.php');  ?>



<div class="containert">  <!--grid 2x2 contiene tabreg-->
        <div class="row">
        <div class="col">
          <div class="tab-search"><!--contenedor general de la tabla-->
                    <div id="shadowcontent" class="shadow-sm p-3 mb-5 bg-body-tertiary rounded"><!--contenedor de la search bar 2x2-->
                        <div class="row">
                            <div id="colContentFull" class="col">
                    
                            <label id="lblsearchbar" class="form-label">Buscar registros</label>
                            </div>
                            <div class="col">        
                                <div class="searchform">
                                    <form action="">
                                    <input id="idsearchform" class="form-control" type="text" placeholder="Buscar">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
            <!--Empieza la estructura de la tab-->
                <table id="tablafontsize" class="table table-hover" >
                    <thead> 
                        <tr>
                            <th>Identificador</th>
                            <th>Nombre de cuenta</th>
                            <th>Acciones</th>
                            <th>Placa</th>
                            <th>Fecha GPS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>863083037456755</td>
                            <td>LUIGEMI SA. DE CV</td>
                            <td><button id="accionbutton" class="btn btn-light" type="button">Cargar datos</button></td>
                            <td>P-22B22</td>
                            <td>2030-03-14 14:15:18</td>
                        </tr>
                        <tr>
                            <td>863083037456755</td>
                            <td>LUIGEMI SA. DE CV</td>
                            <td><button id="accionbutton" class="btn btn-light" type="button">Cargar datos</button></td>
                            <td>P-22B22</td>
                            <td>2030-03-14 14:15:18</td>
                        </tr>
                        <tr>
                            <td>863083037456755</td>
                            <td>LUIGEMI SA. DE CV</td>
                            <td><button id="accionbutton" class="btn btn-light" type="button">Cargar datos</button></td>
                            <td>P-22B22</td>
                            <td>2030-03-14 14:15:18</td>
                        </tr>
                        <tr>
                            <td>863083037456755</td>
                            <td>LUIGEMI SA. DE CV</td>
                            <td><button id="accionbutton" class="btn btn-light" type="button">Cargar datos</button></td>
                            <td>P-22B22</td>
                            <td>2030-03-14 14:15:18</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col">
            <p>this is a second col</p>
        </div>
    </div>
</div>





</body>
</html>