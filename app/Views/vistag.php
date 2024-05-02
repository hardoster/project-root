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
    <link rel="stylesheet" href="../public/css/stylesvista.css">
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
        <div class="shadow p-3 mb-5 bg-body rounded" id="tablep">

            <div class="containertb1">

                <table id="tablafontsize" class="table table-hover" style="width:100%">
                    <thead id="thead-fixed">
                        <tr>
                            <th>Identificador</th>
                            <th>Cliente</th>
                            <th>Placa</th>
                            <th>Fecha GPS</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                            <th>tempTipoCliente</th>
                            <th>tempnotas</th>
                            <th>tempdatosContacto</th>

                            <th>tempMarca</th>
                            <th>tempModelo</th>
                            <th>tempColor</th>
                            <th>tempAnio</th>

                            <th>tempMarcaGPS</th>
                            <th>tempSerieGPS</th>
                            <th>tempNtelefonoGPS</th>
                            <th>tempSimGps</th>

                            <th>tempidcar</th>
                            <th>tempidcliente</th>
                            <th>tempidgps</th>


                        </tr>
                    </thead>
                    <!-- tbody id="tableBody_user" -->
                    <tbody>
                        <?php foreach ($datos as $index => $car) : ?>
                            <tr>

                                <!--0-->
                                <td><?= $car['identificador'] ?></td>
                                <!--1-->
                                <td><?= $car['nombre_cuenta'] ?></td>
                                <!--2-->
                                <td><?= $car['placa'] ?></td>
                                <!--3-->
                                <td><?= $car['fecha_gps_malo'] ?></td>
                                <!--4-->
                                <td><?= $car['estado'] ?></td>
                                <!--5-->
                                <td>
                  
                                    <img class="view-data-btn" data-index="<?= $index ?>" width="20px" src="../public/img/cargardatosbtn.png" id="cargarDatosBtn">
                                </td>
                                <!--6-->
                                <td><?php if ($car['tipo_cliente'] == 1) {
                                        echo 'Acceso Web';
                                    } elseif ($car['tipo_cliente'] == 2) {
                                        echo 'monitoreo';
                                    } else {
                                        echo 'basico';
                                    }   ?></td>
                                <!--7-->
                                <td><?= $car['notas']          ?></td>
                                <!--8-->
                                <td><?= $car['datos_contacto'] ?></td>
                                <!--9-->
                                <td><?= $car['marca']  ?></td> <!--10-->
                                <td><?= $car['modelo']  ?></td> <!--11--->
                                <td><?= $car['color']   ?></td> <!--12-->
                                <td><?= $car['ano']   ?></td> <!--1-->
                                <td>
                                    <?php
                                    $marca = $car['id_marca'];
                                    switch ($marca) {
                                        case 8:
                                            echo 'SYRUS';
                                            break;
                                        case 15:
                                            echo 'MEITRACK';
                                            break;
                                        case 16:
                                            echo 'BOFAN';
                                            break;
                                        case 17:
                                            echo 'TELTONIKA';
                                            break;
                                        case 18:
                                            echo 'CELLOCATOR';
                                            break;
                                        case 19:
                                            echo 'CONCOX';
                                            break;
                                        default:
                                            echo 'UNDEFINED';
                                            break;
                                    }
                                    ?>
                                </td> <!--13-->
                                <td><?= $car['serie'] ?></td> <!--14-->
                                <td><?= $car['num_telefono'] ?></td> <!--15-->
                                <td><?= $car['sim'] ?></td><!--16-->
                                <td><?= $car['id_vehiculo'] ?></td>
                                <td><?= $car['id_cliente'] ?></td>
                                <td><?= $car['id_gps'] ?></td>


                            </tr><!--16-->

                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>

        </div>
        <!--SEGUNDO LADO-------------------------------------------------------------------------------------------------------------------------->
        <div class="infcustomer1 fade-in-right" style="display: grid;"> <!--inf de cuenta-->
            <div class="container1">
                <div class="accounttitle">
                    <span>Datos de la cuenta</span>
                </div>

                <div class="formgroup1">
                    <label id="inputnameaccount">Nombre de cuenta</label>

                    <div id="spannameaccount">
                        <span id="id_spannameaccount"></span>
                    </div>

                </div>
                <div class="formgroup2">
                    <label id="inputtypecustomer">Tipo de servicio</label>
                    <div id="id_spantypecustomer">
                        <span></span>
                    </div>
                </div>
                <div class="formgroup3">
                    <label id="inputcontact">Contactos</label>
                    <span id="id_spancontact"></span>
                </div>
                <div class="formgroup4">
                    <label id="inputinfc"> Contrato</label>
                    <span id="id_spaninfc"></span>
                </div>


            </div>
        </div>



        <div class="iconsinf"> <!--iconos de seleccion-->

            <img id="btnclienteinf" width="40px" src="../public/img/clienteicon.png" alt="Boton 1" onclick="mostrarInfo(1)">
            <img id="btnvehiculosinf" width="40px" src="../public/img/vehiculosicon.png" alt="Boton 2" onclick="mostrarInfo(2)">
            <img id="btngpsinf" width="40px" src="../public/img/gpsicon.png" alt="Boton 3" onclick="mostrarInfo(3)">

        </div>





        <div class="infcustomer2 fade-in-right" style="display: none;"><!--inf de vehiculo-->

            <div class="container2">

                <div class="datavhtitle">
                    <span id="id_spanPlacaTitle">Datos</span>
                </div>

                <div class="ilustration_vh">
                    <img id="il_vh" width="150px" src="../public/img/ilust_auto.png" alt="ilustracion 1">

                </div>

                <div class="marcavh">
                    <label>Marca</label>
                    <div id="marcaspanvh">
                        <span id="id_MarcaVH"></span>
                    </div>
                </div>


                <div class="modelovh">
                    <label>Modelo</label>
                    <div id="modelospanvh">
                        <span id="id_modelovhspann"></span>
                    </div>
                </div>

                <div class="colorvh">
                    <label>Color</label>
                    <div id="colorspanvh">
                        <span id="id_colorvhspann"></span>
                    </div>
                </div>

                <div class="aniovh">
                    <label>Año</label>
                    <div id="aniospanvh">
                        <span id="id_aniospann"></span>
                    </div>
                </div>
            </div>

        </div>



        <div class="infcustomer3 fade-in-right" style="display: none;"><!--inf de gps-->
            <div class="container3">

                <div class="datagpstitle">
                    <span>Datos del GPS</span>
                </div>
                <div class="img_gps_seccion">
                    <img id="il_gps" width="150px" src="../public/img/gps_seccion.png" alt="ilustracion 1">

                </div>
                <div class="idgps">
                    <label>Identificador</label>
                    <div id="idspangps">
                        <span id="id_spannidgps"></span>
                    </div>
                </div>
                <div class="marcagps">
                    <label>Marca</label>
                    <div id="marcaspangps">
                        <span id="id_marcagpsspann"></span>
                    </div>
                </div>

                <div class="seriegps">
                    <label>Serie</label>
                    <div id="seriespangps">
                        <span id="id_seriegpsspann"></span>
                    </div>
                </div>

                <div class="telefonogps">
                    <label>Telefono GPS</label>
                    <div id="telefonospangps">
                        <span id="id_telefonogpsspann"></span>
                    </div>
                </div>

                <div class="simgps">
                    <label>SIM</label>
                    <div id="simspangps">
                        <span id="id_simgpsspann"></span>
                    </div>
                </div>
            </div>
        </div>

        <div id="infcustomer4"><!--notas-------------------------------------------------------------------------------------------->


            <div id="spannotes">
                <span>NUEVA SERVICIO SOLO ACCESO WEB NO PANICO NO AUDIO NO ROAMING SI APAGADO EQUIPO ARRENDADO PLAZO DE 18 MESES CON CUOTA DE $11.00+ IVA ASESOR: JORGE NOSTHAS ORDEN: 2709
                </span>
            </div>


            <div id="editspannotev">
                <textarea name="" id="txtEditSpanNotes" style="width: 100%; height: 100%;" rows="5" placeholder="Escribe tu nota de seguimiento"></textarea>
            </div>

            <div id="areabtnnotes">
                <span class="spannButtonGeneralTH">Acciones</span>
                <hr>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" />
                    <label class="form-check-label spannButtonGeneralSUB" for="flexRadioDefault1"> Activo </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked />
                    <label class="form-check-label spannButtonGeneralSUB" for="flexRadioDefault2"> Finalizado </label>
                </div>

                <div class="ContainerControlBtn">
                    <span class="spannButtonGeneralSUB">Agregar</span>
                </div>
                <div class="ContainerControlBtn newnotebtn">
                    <span class="spannButtonGeneralSUB">nuevo</span>
                </div>
            </div>

        </div>

        <div id="tableregistros">
            <div class="tablep1 shadow p-3 mb-5 bg-body rounded" id="tablep1">
                <div class="table0">
                    <!--Empieza la estructura de la tab-->
                    <table id="table2" class="table table-hover">
                        <thead>
                            <tr>
                                <th>Placa</th>
                                <th>Cliente</th>
                                <th>Identificador</th>
                                <th>disposicion</th>
                                <th>categoriadisposicion</th>
                                <th>notas</th>
                                <th>odscode</th>
                                <th>Employee name</th>
                                <th>Employee last</th>
                                <th>status</th>
                                <th>Fecha</th>
                             
                            </tr>
                        </thead>
                        <tbody>
                        
                              <tr>  
                           <td></td>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td></td>
                    
                                </tr>
                                    
                        </tbody>
                    </table>

                </div>
            </div>

            <div class="filtrosarea">
                <div class="titlefiltros">
                    <span>Filtrar por</span>
                    <hr>
                </div>
                <div class="tecnicosbtn">
                    <span>Tecnicos</span>
                </div>
                <div class="operadorbtn">
                    <span>Operador</span>
                </div>
                <div class="reaccionbtn">
                    <span>Reaccion</span>
                </div>
            </div>
        </div>

        <div class="WaitSelectView">
            <div class="containerWSV">
                <div class="imgWSV">
                    <svg class="animated" id="freepik_stories-select" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 500" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs">
                        <style>
                            svg#freepik_stories-select:not(.animated) .animable {
                                opacity: 0;
                            }

                            svg#freepik_stories-select.animated #freepik--Tab--inject-114 {
                                animation: 1s 1 forwards cubic-bezier(.36, -0.01, .5, 1.38) slideLeft;
                                animation-delay: 0s;
                            }

                            svg#freepik_stories-select.animated #freepik--tabs--inject-114 {
                                animation: 1s 1 forwards cubic-bezier(.36, -0.01, .5, 1.38) slideLeft;
                                animation-delay: 0.5s;
                                opacity: 0
                            }

                            svg#freepik_stories-select.animated #freepik--Tabs--inject-114 {
                                animation: 1s 1 forwards cubic-bezier(.36, -0.01, .5, 1.38) slideLeft, 3s Infinite linear floating;
                                animation-delay: 0s, 1.5s;
                            }

                            svg#freepik_stories-select.animated #el1lccpc3u1bq {
                                animation: 0.6s 1 forwards ease-out slideUp;
                                animation-delay: 0.1s;
                                opacity: 0
                            }

                            svg#freepik_stories-select.animated #el5sh0gfym7a6 {
                                animation: 0.6s 1 forwards ease-out slideUp;
                                animation-delay: 0.03529411764705882s;
                                opacity: 0
                            }

                            svg#freepik_stories-select.animated #elovs65nrer6 {
                                animation: 0.6s 1 forwards ease-out slideUp;
                                animation-delay: 0.07058823529411765s;
                                opacity: 0
                            }

                            svg#freepik_stories-select.animated #elrlffum0h95j {
                                animation: 0.6s 1 forwards ease-out slideUp;
                                animation-delay: 0.10588235294117647s;
                                opacity: 0
                            }

                            svg#freepik_stories-select.animated #el8i721nw5g1y {
                                animation: 0.6s 1 forwards ease-out slideUp;
                                animation-delay: 0.1411764705882353s;
                                opacity: 0
                            }

                            svg#freepik_stories-select.animated #eldad87enl5ov {
                                animation: 0.6s 1 forwards ease-out slideUp;
                                animation-delay: 0.1764705882352941s;
                                opacity: 0
                            }

                            svg#freepik_stories-select.animated #elhhhnlbpgdd8 {
                                animation: 0.6s 1 forwards ease-out slideUp;
                                animation-delay: 0.21176470588235294s;
                                opacity: 0
                            }

                            svg#freepik_stories-select.animated #el6khz3od91af {
                                animation: 0.6s 1 forwards ease-out slideUp;
                                animation-delay: 0.24705882352941178s;
                                opacity: 0
                            }

                            svg#freepik_stories-select.animated #elycj7vjjuues {
                                animation: 0.6s 1 forwards ease-out slideUp;
                                animation-delay: 0.2823529411764706s;
                                opacity: 0
                            }

                            svg#freepik_stories-select.animated #elz7wilu33x0j {
                                animation: 0.6s 1 forwards ease-out slideUp;
                                animation-delay: 0.3176470588235294s;
                                opacity: 0
                            }

                            svg#freepik_stories-select.animated #el0uvr5r5xa77 {
                                animation: 0.6s 1 forwards ease-out slideUp;
                                animation-delay: 0.3529411764705882s;
                                opacity: 0
                            }

                            svg#freepik_stories-select.animated #elnygeg4eafd {
                                animation: 0.6s 1 forwards ease-out slideUp;
                                animation-delay: 0.38823529411764707s;
                                opacity: 0
                            }

                            svg#freepik_stories-select.animated #elsg67njv5lv {
                                animation: 0.6s 1 forwards ease-out slideUp;
                                animation-delay: 0.4235294117647059s;
                                opacity: 0
                            }

                            svg#freepik_stories-select.animated #elpyxq7ol4fx {
                                animation: 0.6s 1 forwards ease-out slideUp;
                                animation-delay: 0.4588235294117647s;
                                opacity: 0
                            }

                            svg#freepik_stories-select.animated #ely267nhq8ep {
                                animation: 0.6s 1 forwards ease-out slideUp;
                                animation-delay: 0.49411764705882355s;
                                opacity: 0
                            }

                            svg#freepik_stories-select.animated #elahdlocpi9vh {
                                animation: 0.6s 1 forwards ease-out slideUp;
                                animation-delay: 0.5294117647058824s;
                                opacity: 0
                            }

                            svg#freepik_stories-select.animated #elpcapujrous {
                                animation: 0.6s 1 forwards ease-out slideUp;
                                animation-delay: 0.5647058823529412s;
                                opacity: 0
                            }

                            svg#freepik_stories-select.animated #freepik--Hand--inject-114 {
                                animation: 0.6s 1 forwards ease-out slideUp;
                                animation-delay: 0.1s;
                                opacity: 0
                            }

                            @keyframes slideLeft {
                                0% {
                                    opacity: 0;
                                    transform: translateX(-30px);
                                }

                                100% {
                                    opacity: 1;
                                    transform: translateX(0);
                                }
                            }

                            @keyframes floating {
                                0% {
                                    opacity: 1;
                                    transform: translateY(0px);
                                }

                                50% {
                                    transform: translateY(-10px);
                                }

                                100% {
                                    opacity: 1;
                                    transform: translateY(0px);
                                }
                            }

                            @keyframes slideUp {
                                0% {
                                    opacity: 0;
                                    transform: translateY(30px);
                                }

                                100% {
                                    opacity: 1;
                                    transform: inherit;
                                }
                            }
                        </style>
                        <g id="freepik--Floor--inject-114" style="transform-origin: 250.621px 365.117px 0px;" class="animable">
                            <path id="freepik--floor--inject-114" d="M104.74,442c80.57,42.47,211.2,42.47,291.77,0s80.58-111.31,0-153.77-211.2-42.47-291.78,0S24.16,399.51,104.74,442Z" style="fill: rgb(245, 245, 245); transform-origin: 250.621px 365.117px 0px;" class="animable"></path>
                        </g>
                        <g id="freepik--Shadow--inject-114" style="transform-origin: 245.297px 355.446px 0px;" class="animable">
                            <path id="freepik--shadow--inject-114" d="M70.19,388.85,73.93,391a4.79,4.79,0,0,0,4.33,0l172.82-99.77a1.31,1.31,0,0,0,0-2.49l-3.71-2.12a4.79,4.79,0,0,0-4.33,0L70.19,386.35A1.32,1.32,0,0,0,70.19,388.85Z" style="fill: rgb(224, 224, 224); transform-origin: 160.638px 338.81px 0px;" class="animable"></path>
                            <ellipse id="freepik--shadow--inject-114" cx="319.68" cy="395.88" rx="52.74" ry="28.91" style="fill: rgb(224, 224, 224); transform-origin: 319.68px 395.88px 0px;" class="animable"></ellipse>
                            <ellipse id="freepik--shadow--inject-114" cx="380.61" cy="323.81" rx="40.69" ry="22.31" style="fill: rgb(224, 224, 224); transform-origin: 380.61px 323.81px 0px;" class="animable"></ellipse>
                        </g>
                        <g id="freepik--Plants--inject-114" style="transform-origin: 416.151px 294.179px 0px;" class="animable">
                            <g id="freepik--plants--inject-114" style="transform-origin: 416.151px 294.179px 0px;" class="animable">
                                <path d="M400.51,301.39c-.06-5.11,3.51-15.73,8.73-22.43s13.49-11.65,19.44-9.69c5.54,1.82,5,9.06-1.61,13.93s-16.61,11-19.46,19.34l-6.05,10.24Z" style="fill: rgb(39, 48, 107); transform-origin: 416.488px 290.809px 0px;" id="elknng07alik" class="animable"></path>
                                <g id="elxqrmodp0lx">
                                    <path d="M400.51,301.39c-.06-5.11,3.51-15.73,8.73-22.43s13.49-11.65,19.44-9.69c5.54,1.82,5,9.06-1.61,13.93s-16.61,11-19.46,19.34l-6.05,10.24Z" style="opacity: 0.1; transform-origin: 416.488px 290.809px 0px;" class="animable"></path>
                                </g>
                                <path d="M400.22,308.39a.38.38,0,0,0,.33-.31c3.21-17.48,17.15-31.82,25.55-35.05a.38.38,0,0,0,.22-.49.37.37,0,0,0-.48-.21c-8.57,3.29-22.77,17.87-26,35.62a.37.37,0,0,0,.3.43Z" style="fill: rgb(255, 255, 255); transform-origin: 413.089px 290.347px 0px;" id="elap19zwatoj6" class="animable"></path>
                                <path d="M403,319.52c.79-2.88,4.24-7.66,9.86-11.65,6.23-4.4,14.15-6.49,15.94-9.88,2.15-4.08-1.31-7.86-7.75-7s-17.66,9.81-19.32,23.07Z" style="fill: rgb(39, 48, 107); transform-origin: 415.584px 305.193px 0px;" id="elounp9lnihrj" class="animable"></path>
                                <path d="M401.67,316.52a.38.38,0,0,0,.32-.25c5.16-15,16.5-20.38,21.77-21.13a.38.38,0,0,0,.32-.42.37.37,0,0,0-.42-.32c-5.83.83-17.1,6.31-22.38,21.63a.37.37,0,0,0,.23.47A.3.3,0,0,0,401.67,316.52Z" style="fill: rgb(255, 255, 255); transform-origin: 412.671px 305.46px 0px;" id="elmw4rrhdopsj" class="animable"></path>
                            </g>
                        </g>
                        <g id="freepik--Tabs--inject-114" style="transform-origin: 167.725px 206.515px 0px;" class="animable">
                            <g id="freepik--Tab--inject-114" style="transform-origin: 159.225px 206.515px 0px;" class="animable">
                                <path d="M74.85,386.33l-.76-.44a4.86,4.86,0,0,1-2.2-3.8V125.83a4.89,4.89,0,0,1,2.2-3.81L239.21,26.7a4.87,4.87,0,0,1,4.4,0l.75.44a4.85,4.85,0,0,1,2.2,3.81V287.2a4.85,4.85,0,0,1-2.2,3.81L79.25,386.33A4.87,4.87,0,0,1,74.85,386.33Z" style="fill: rgb(39, 48, 107); transform-origin: 159.225px 206.515px 0px;" id="el3e55d3klw" class="animable"></path>
                                <g id="elqw67kuubv4a">
                                    <path d="M246.54,30.6c-.15-1.14-1.07-1.56-2.17-.93L79.24,125a4.54,4.54,0,0,0-1.55,1.64l-5.15-3A4.6,4.6,0,0,1,74.1,122L239.21,26.7a4.87,4.87,0,0,1,4.4,0l.76.44A5,5,0,0,1,246.54,30.6Z" style="fill: rgb(255, 255, 255); opacity: 0.4; transform-origin: 159.54px 76.4074px 0px;" class="animable"></path>
                                </g>
                                <g id="el12v3a4uest1f">
                                    <path d="M78.88,386.5a4.89,4.89,0,0,1-4-.17l-.77-.44a4.85,4.85,0,0,1-2.19-3.81V125.83a4.42,4.42,0,0,1,.64-2.16l5.15,3A4.61,4.61,0,0,0,77,128.8V385.06C77,386.32,77.84,386.91,78.88,386.5Z" style="opacity: 0.1; transform-origin: 75.4px 255.259px 0px;" class="animable"></path>
                                </g>
                            </g>
                            <g id="freepik--tabs--inject-114" style="transform-origin: 178.56px 202.285px 0px;" class="animable">
                                <g id="freepik--tab--inject-114" style="transform-origin: 173.29px 223.265px 0px;" class="animable">
                                    <path d="M96.52,293.65l-.76-.44a4.86,4.86,0,0,1-2.2-3.8V243.35a4.88,4.88,0,0,1,2.2-3.81l149.91-86.63a4.85,4.85,0,0,1,4.39,0l.76.44a4.85,4.85,0,0,1,2.2,3.81v46.06a4.83,4.83,0,0,1-2.2,3.8l-149.9,86.63A4.87,4.87,0,0,1,96.52,293.65Z" style="fill: rgb(235, 235, 235); transform-origin: 173.29px 223.28px 0px;" id="el5dthn2zll0i" class="animable"></path>
                                    <path d="M253,156.81c-.15-1.14-1.07-1.56-2.18-.93L100.91,242.52a4.54,4.54,0,0,0-1.55,1.64l-5.15-3a4.51,4.51,0,0,1,1.56-1.65l149.9-86.63a4.85,4.85,0,0,1,4.39,0l.76.44A4.93,4.93,0,0,1,253,156.81Z" style="fill: rgb(250, 250, 250); transform-origin: 173.605px 198.257px 0px;" id="elqrdotboa8fq" class="animable"></path>
                                    <path d="M100.54,293.83a4.87,4.87,0,0,1-4-.18l-.78-.43a4.9,4.9,0,0,1-2.18-3.81V243.35a4.42,4.42,0,0,1,.64-2.16l5.15,3a4.61,4.61,0,0,0-.65,2.16v46.07C98.71,293.64,99.51,294.23,100.54,293.83Z" style="fill: rgb(224, 224, 224); transform-origin: 97.06px 267.683px 0px;" id="elfefy3jpwyc" class="animable"></path>
                                    <path d="M122.11,239.43c8.55-4.94,15.48-1.1,15.48,8.58s-6.94,21.44-15.5,26.27-15.49,1-15.49-8.58S113.56,244.37,122.11,239.43Z" style="fill: rgb(39, 48, 107); transform-origin: 122.095px 256.822px 0px;" id="elqwndemc7iy" class="animable"></path>
                                </g>
                                <g id="freepik--tab--inject-114" style="transform-origin: 173.29px 285.7px 0px;" class="animable">
                                    <path d="M96.52,356.07l-.76-.44a4.86,4.86,0,0,1-2.2-3.8V305.77a4.88,4.88,0,0,1,2.2-3.81l149.91-86.63a4.85,4.85,0,0,1,4.39,0l.76.44a4.84,4.84,0,0,1,2.2,3.81v46.06a4.83,4.83,0,0,1-2.2,3.8l-149.9,86.63A4.87,4.87,0,0,1,96.52,356.07Z" style="fill: rgb(235, 235, 235); transform-origin: 173.29px 285.7px 0px;" id="eljt12crlp2qo" class="animable"></path>
                                    <path d="M253,219.22c-.15-1.14-1.07-1.55-2.18-.92L100.91,304.94a4.59,4.59,0,0,0-1.55,1.63l-5.15-3A4.44,4.44,0,0,1,95.77,302l149.9-86.63a4.85,4.85,0,0,1,4.39,0l.76.44A4.91,4.91,0,0,1,253,219.22Z" style="fill: rgb(250, 250, 250); transform-origin: 173.605px 260.707px 0px;" id="el9dotqkl5scd" class="animable"></path>
                                    <path d="M100.54,356.24a4.87,4.87,0,0,1-4-.17l-.78-.44a4.87,4.87,0,0,1-2.18-3.81V305.77a4.39,4.39,0,0,1,.64-2.16l5.15,3a4.68,4.68,0,0,0-.65,2.17v46.07C98.71,356.06,99.51,356.65,100.54,356.24Z" style="fill: rgb(224, 224, 224); transform-origin: 97.06px 330.1px 0px;" id="el7trnd5kfw2x" class="animable"></path>
                                    <path d="M122.11,301.85c8.55-4.94,15.48-1.1,15.48,8.58s-6.94,21.44-15.5,26.27-15.49,1-15.49-8.58S113.56,306.78,122.11,301.85Z" style="fill: rgb(39, 48, 107); transform-origin: 122.095px 319.242px 0px;" id="elbid6psuspf" class="animable"></path>
                                </g>
                                <g id="freepik--tab--inject-114" style="transform-origin: 173.29px 118.885px 0px;" class="animable">
                                    <path d="M96.52,189.27l-.76-.44a4.88,4.88,0,0,1-2.2-3.81V139a4.86,4.86,0,0,1,2.2-3.8L245.67,48.53a4.85,4.85,0,0,1,4.39,0l.76.44a4.83,4.83,0,0,1,2.2,3.8V98.83a4.85,4.85,0,0,1-2.2,3.81l-149.9,86.63A4.87,4.87,0,0,1,96.52,189.27Z" style="fill: rgb(235, 235, 235); transform-origin: 173.29px 118.9px 0px;" id="elhtcskgeys7e" class="animable"></path>
                                    <path d="M253,52.42c-.15-1.14-1.07-1.55-2.18-.92L100.91,138.14a4.43,4.43,0,0,0-1.55,1.63l-5.15-3a4.41,4.41,0,0,1,1.56-1.64l149.9-86.63a4.85,4.85,0,0,1,4.39,0l.76.44A4.91,4.91,0,0,1,253,52.42Z" style="fill: rgb(250, 250, 250); transform-origin: 173.605px 93.8724px 0px;" id="el1wj5gliiqncj" class="animable"></path>
                                    <path d="M100.54,189.44a4.87,4.87,0,0,1-4-.17l-.78-.44A4.87,4.87,0,0,1,93.57,185V139a4.42,4.42,0,0,1,.64-2.17l5.15,3a4.64,4.64,0,0,0-.65,2.17V188C98.71,189.26,99.51,189.84,100.54,189.44Z" style="fill: rgb(224, 224, 224); transform-origin: 97.055px 163.31px 0px;" id="el0y3kglndnp58" class="animable"></path>
                                    <path d="M122.11,135.05c8.55-4.94,15.48-1.1,15.48,8.57s-6.94,21.44-15.5,26.28-15.49,1-15.49-8.58S113.56,140,122.11,135.05Z" style="fill: rgb(39, 48, 107); transform-origin: 122.095px 152.444px 0px;" id="eljb86lzskgud" class="animable"></path>
                                </g>
                                <g id="freepik--tab--inject-114" style="transform-origin: 183.83px 177.375px 0px;" class="animable">
                                    <path d="M107.06,247.75l-.76-.44a4.85,4.85,0,0,1-2.2-3.81V197.44a4.87,4.87,0,0,1,2.2-3.81L256.2,107a4.87,4.87,0,0,1,4.4,0l.76.43a4.89,4.89,0,0,1,2.2,3.81v46.06a4.88,4.88,0,0,1-2.2,3.81L111.45,247.75A4.85,4.85,0,0,1,107.06,247.75Z" style="fill: rgb(55, 71, 79); transform-origin: 183.83px 177.375px 0px;" id="elhdh87j4km8p" class="animable"></path>
                                    <path d="M263.54,110.9c-.15-1.14-1.07-1.56-2.18-.92L111.45,196.62a4.54,4.54,0,0,0-1.56,1.63l-5.14-3a4.49,4.49,0,0,1,1.55-1.65L256.2,107a4.87,4.87,0,0,1,4.4,0l.76.43A4.93,4.93,0,0,1,263.54,110.9Z" style="fill: rgb(69, 90, 100); transform-origin: 184.145px 152.362px 0px;" id="el2thzyqbgq1h" class="animable"></path>
                                    <path d="M111.08,247.92a4.89,4.89,0,0,1-4-.17l-.77-.44a4.87,4.87,0,0,1-2.19-3.81V197.44a4.43,4.43,0,0,1,.65-2.16l5.14,3a4.59,4.59,0,0,0-.64,2.16v46.07C109.25,247.73,110,248.32,111.08,247.92Z" style="fill: rgb(38, 50, 56); transform-origin: 107.6px 221.774px 0px;" id="elbc4mp840lfk" class="animable"></path>
                                    <path d="M132.65,193.52c8.55-4.93,15.48-1.09,15.48,8.58s-6.94,21.44-15.5,26.28-15.5,1-15.49-8.58S124.1,198.46,132.65,193.52Z" style="fill: rgb(245, 245, 245); transform-origin: 132.635px 210.922px 0px;" id="el8ed0y8j3laf" class="animable"></path>
                                    <path d="M133,221.35a1.68,1.68,0,0,1-1.9.09l-6.8-5.14c-.91-.69-.8-2.58.25-4.24s2.64-2.44,3.54-1.75l4.74,3.59L146,185.61c.82-1.77,2.39-3,3.51-2.65s1.36,2,.53,3.74L135,219a5.43,5.43,0,0,1-1.93,2.29Z" style="fill: rgb(39, 48, 107); transform-origin: 137.109px 202.296px 0px;" id="elas8pm3gbs8h" class="animable"></path>
                                </g>
                            </g>
                        </g>
                        <g id="freepik--Hand--inject-114" style="transform-origin: 233.414px 196.417px 0px;" class="animable animator-active">
                            <path d="M263.52,179.3l-4.35-2.51h0c-1.89-1.08-4.2,0-5.42.74L251,176h0c-3.29-2-7.87,2.17-8.89,3.16l-1.18-.67h0c-3.49-2.1-9.84,3.53-9.84,3.53V161l2.76-1.33-4.39-2.54h0l0,0h0a3.93,3.93,0,0,0-3.9.41h0a12.32,12.32,0,0,0-5.58,9.66v48.57c-4-3-8.28-4.8-12-4.13a12.08,12.08,0,0,0-7.26,5c-1.84,3.26,1.2,5.3,5.12,9.78s7.32,9.8,10.86,13.1a19.15,19.15,0,0,0,6.11,4.16V250l4.3,2.49,28.48-21.41v-6.33s4.06-16.22,5.36-23c1.25-6.52,2.4-16.93.25-22.33l2.33-.16Z" style="fill: rgb(39, 48, 107); transform-origin: 231.85px 204.641px 0px;" id="el1lccpc3u1bq" class="animable"></path>
                            <g id="el5sh0gfym7a6">
                                <path d="M263.52,179.3l-4.35-2.51h0c-1.89-1.08-4.2,0-5.42.74L251,176h0c-3.29-2-7.87,2.17-8.89,3.16l-1.18-.67h0c-3.49-2.1-9.84,3.53-9.84,3.53V161l2.76-1.33-4.39-2.54h0l0,0h0a3.93,3.93,0,0,0-3.9.41h0a12.32,12.32,0,0,0-5.58,9.66v48.57c-4-3-8.28-4.8-12-4.13a12.08,12.08,0,0,0-7.26,5c-1.84,3.26,1.2,5.3,5.12,9.78s7.32,9.8,10.86,13.1a19.15,19.15,0,0,0,6.11,4.16V250l4.3,2.49,28.48-21.41v-6.33s4.06-16.22,5.36-23c1.25-6.52,2.4-16.93.25-22.33l2.33-.16Z" style="fill: rgb(255, 255, 255); opacity: 0.4; transform-origin: 231.85px 204.641px 0px;" class="animable"></path>
                            </g>
                            <path d="M231.41,235.12l-21.54-12.43-9.43-5.45c-1.2,2.94,1.71,5,5.39,9.21,3.89,4.45,7.32,9.8,10.86,13.1a19.15,19.15,0,0,0,6.11,4.16V250l4.3,2.49,6.29-4.73C232.58,242.42,231.41,235.12,231.41,235.12Z" style="fill: rgb(39, 48, 107); transform-origin: 216.778px 234.865px 0px;" id="elovs65nrer6" class="animable"></path>
                            <polygon points="224.29 169.71 219.99 167.22 219.99 218.17 224.29 218.28 224.29 169.71" style="fill: rgb(39, 48, 107); transform-origin: 222.14px 192.75px 0px;" id="elrlffum0h95j" class="animable"></polygon>
                            <path d="M258.08,182.57l3.34-2.46c-.08-.22-.14-.44-.23-.65l1.22-.08-2.68-.12-4.47-2.47a10.61,10.61,0,0,0-1.51.75l1.4.81Z" style="fill: rgb(39, 48, 107); transform-origin: 258.08px 179.68px 0px;" id="el8i721nw5g1y" class="animable"></path>
                            <path d="M246.25,181.84l3.13-2.38-4.32-2.62a19,19,0,0,0-2.91,2.3l3,1.74Z" style="fill: rgb(39, 48, 107); transform-origin: 245.765px 179.34px 0px;" id="eldad87enl5ov" class="animable"></path>
                            <polygon points="239.71 181.61 235.43 179.11 235.45 179.07 235.45 184.48 240.43 182.66 239.71 181.61" style="fill: rgb(39, 48, 107); transform-origin: 237.93px 181.775px 0px;" id="elhhhnlbpgdd8" class="animable"></polygon>
                            <g id="el6khz3od91af">
                                <g style="opacity: 0.15; transform-origin: 231.288px 209.855px 0px;" class="animable">
                                    <path d="M231.41,235.12l-21.54-12.43-9.43-5.45c-1.2,2.94,1.71,5,5.39,9.21,3.89,4.45,7.32,9.8,10.86,13.1a19.15,19.15,0,0,0,6.11,4.16V250l4.3,2.49,6.29-4.73C232.58,242.42,231.41,235.12,231.41,235.12Z" id="elyw4ircw1orf" style="transform-origin: 216.778px 234.865px 0px;" class="animable"></path>
                                    <polygon points="224.29 169.71 219.99 167.22 219.99 218.17 224.29 218.28 224.29 169.71" id="eltpq98umri2" style="transform-origin: 222.14px 192.75px 0px;" class="animable"></polygon>
                                    <path d="M258.08,182.57l3.34-2.46c-.08-.22-.14-.44-.23-.65l1.22-.08-2.68-.12-4.47-2.47a10.61,10.61,0,0,0-1.51.75l1.4.81Z" id="el0jsc0166gdv8" style="transform-origin: 258.08px 179.68px 0px;" class="animable"></path>
                                    <path d="M246.25,181.84l3.13-2.38-4.32-2.62a19,19,0,0,0-2.91,2.3l3,1.74Z" id="el9mde6vedmi5" style="transform-origin: 245.765px 179.34px 0px;" class="animable"></path>
                                    <polygon points="239.71 181.61 235.43 179.11 235.45 179.07 235.45 184.48 240.43 182.66 239.71 181.61" id="elw7pplw8stph" style="transform-origin: 237.93px 181.775px 0px;" class="animable"></polygon>
                                </g>
                            </g>
                            <path d="M227.1,252.53V246.2A19.19,19.19,0,0,1,221,242c-3.54-3.3-7-8.66-10.86-13.1s-7-6.53-5.12-9.78a12.08,12.08,0,0,1,7.26-5c3.74-.67,8,1.16,12,4.13V169.71a12.32,12.32,0,0,1,5.57-9.66h0c3.08-1.78,5.58-.34,5.58,3.22v21.21s7.69-6.82,10.79-2.64c0,0,7.56-7.91,11-1.23,0,0,5.54-4.47,8,.72s1.3,16.17,0,22.95-5.37,23-5.37,23v6.33Z" style="fill: rgb(39, 48, 107); transform-origin: 235.561px 205.908px 0px;" id="elycj7vjjuues" class="animable"></path>
                            <path d="M235.45,193.59s.7-9.68,4.26-12l-.13,0a23.6,23.6,0,0,0-4.13,2.83v-.18a.21.21,0,0,0,0,.18Z" style="fill: rgb(69, 90, 100); transform-origin: 237.57px 187.59px 0px;" id="elz7wilu33x0j" class="animable"></path>
                            <path d="M246.25,181.84v8.86s1-9.11,3-11.31A17.66,17.66,0,0,0,246.25,181.84Z" style="fill: rgb(69, 90, 100); transform-origin: 247.75px 185.045px 0px;" id="el0uvr5r5xa77" class="animable"></path>
                            <path d="M257.21,180.61h0v8.89s.54-8.95,2.47-10.27A9.71,9.71,0,0,0,257.21,180.61Z" style="fill: rgb(69, 90, 100); transform-origin: 258.445px 184.365px 0px;" id="elnygeg4eafd" class="animable"></path>
                            <path d="M225.54,151.44h0c-.7.4-1.26.17-1.26-.53v-7a2.6,2.6,0,0,1,1.26-2h0c.69-.4,1.25-.16,1.25.53v7A2.59,2.59,0,0,1,225.54,151.44Z" style="fill: rgb(235, 235, 235); transform-origin: 225.535px 146.676px 0px;" id="elsg67njv5lv" class="animable"></path>
                            <path d="M215,162.53h0c-.49.84-1.28,1.3-1.77,1l-4.07-2.35c-.49-.28-.49-1.2,0-2h0c.49-.85,1.28-1.31,1.77-1l4.07,2.35C215.53,160.76,215.53,161.68,215,162.53Z" style="fill: rgb(235, 235, 235); transform-origin: 212.095px 160.853px 0px;" id="elpyxq7ol4fx" class="animable"></path>
                            <path d="M210.69,177.06v.2a2.78,2.78,0,0,1-1.35,2.12l-5.56,3.21c-.74.43-1.35.18-1.35-.57v-.2a2.81,2.81,0,0,1,1.35-2.12l5.56-3.21C210.09,176.06,210.69,176.31,210.69,177.06Z" style="fill: rgb(235, 235, 235); transform-origin: 206.56px 179.54px 0px;" id="ely267nhq8ep" class="animable"></path>
                            <path d="M240.38,160.12v-.2a2.78,2.78,0,0,1,1.35-2.13l5.56-3.21c.74-.43,1.35-.17,1.35.57v.2a2.81,2.81,0,0,1-1.35,2.12l-5.56,3.21C241,161.11,240.38,160.86,240.38,160.12Z" style="fill: rgb(235, 235, 235); transform-origin: 244.51px 157.631px 0px;" id="elahdlocpi9vh" class="animable"></path>
                            <path d="M236,150.4h0c-.49-.28-.49-1.19,0-2l4.07-7c.49-.85,1.28-1.31,1.77-1h0c.49.29.49,1.2,0,2.05l-4.07,7C237.32,150.23,236.52,150.69,236,150.4Z" style="fill: rgb(235, 235, 235); transform-origin: 238.92px 145.395px 0px;" id="elpcapujrous" class="animable"></path>
                        </g>
                        <g id="freepik--character-2--inject-114" style="transform-origin: 366.832px 220.27px 0px;" class="animable">
                            <path d="M394.22,315.22v-1.14c-.45,1.33-2.53,7.08-5.68,10-2.51,2.29-5.94,4.93-6.81,7.48s4.77,3.55,7.11,3.14c2.73-.49,6.25-2,8.17-4.39,1.35-1.66,2.21-3.62,3.17-4.93s3.18-2.75,3.71-4.26c.28-.83-.06-2.65-.46-4.18s-.77-2.95-1.25-2.82V315a6.32,6.32,0,0,1-4,1.34C397,316.34,394.21,316.1,394.22,315.22Z" style="fill: rgb(38, 50, 56); transform-origin: 392.816px 324.435px 0px;" id="eloixr0dvwyt" class="animable"></path>
                            <path d="M386.26,326.05c.78-.69,1.57-1.37,2.28-2,2.2-2,3.88-5.42,4.85-7.75a11,11,0,0,0,.83-4.19v-4.53h8v7.38h0v.2l0,0c-.38,1.65-4,6-6.11,8.92-1.39,1.92-4,4.36-7.19,4.79C385.85,329.27,384.32,328.32,386.26,326.05Z" style="fill: rgb(255, 168, 167); transform-origin: 393.809px 318.269px 0px;" id="elmc92qb5f3ws" class="animable"></path>
                            <path d="M363.19,307.37v-1.14c-.45,1.34-2.54,7.09-5.69,10-2.51,2.29-5.94,4.94-6.81,7.49s4.77,3.55,7.11,3.13c2.73-.48,6.25-2,8.17-4.38,1.35-1.66,2.21-3.63,3.17-4.93s3.19-2.76,3.71-4.27c.28-.83-.06-2.64-.46-4.17s-.77-3-1.25-2.83v.87a6.29,6.29,0,0,1-4,1.35C366,308.49,363.18,308.26,363.19,307.37Z" style="fill: rgb(38, 50, 56); transform-origin: 361.776px 316.586px 0px;" id="elyrcsgaftji9" class="animable"></path>
                            <path d="M355.23,318.21c.77-.7,1.56-1.37,2.27-2,2.2-2,3.88-5.43,4.85-7.76a10.91,10.91,0,0,0,.84-4.18v-4.54h7.95v7.38h0v.2l0,0c-.38,1.66-4,6.05-6.11,8.92-1.39,1.92-4,4.37-7.19,4.79C354.81,321.42,353.28,320.48,355.23,318.21Z" style="fill: rgb(255, 168, 167); transform-origin: 362.75px 310.42px 0px;" id="elqshvw0wpcn" class="animable"></path>
                            <path d="M400.6,191.55c6.17,13.47-.23,60.94-.23,60.94.19,2.18,2.69,6.49,3.62,16.11,1.1,11.37-1.73,39.92-1.73,39.92a8.6,8.6,0,0,1-8,.32s-7.58-43-9-54.3C384,244.67,381.58,223,381.58,223l-6.79,31.5a59,59,0,0,1,2.15,9.74c.65,6.65-5.8,37.61-5.8,37.61s-2.74,1-7.95.24c0,0-2.28-41.09-2.88-49.1-1-13.45,2.56-55.43,5-63.39Z" style="fill: rgb(55, 71, 79); transform-origin: 382.191px 249.637px 0px;" id="el7jhs7w4wjb9" class="animable"></path>
                            <path d="M381.58,223l-2-12.52s-8.48-1.75-12.32-5.37a21.88,21.88,0,0,0,10,6.66l2.25,9.64-3.93,29.17Z" style="fill: rgb(38, 50, 56); transform-origin: 374.42px 227.845px 0px;" id="elqzyl84gsqts" class="animable"></path>
                            <path d="M376.55,144.37a11.43,11.43,0,0,0-10.13,4.54c-3.18,4.16-15.37,20-15.37,20s-18-9-18.85-10.06-.38-3.22-.14-4.4.65-3.83.91-4.57c.46-1.29-1.45-.94-2.58.27s-1.62,3.57-2.19,4-4.83-4.51-6.91-6.88-3-4-4.43-3.05c-1,.7-.36,2.11,1.13,4.14a27.44,27.44,0,0,1,1.92,2.7c.17.36-.37.65-.59.85-.4.36-1.12,1-1.17,1.51a4.69,4.69,0,0,1-.06.92c-.19.68-1,1-1.26,1.66-.17.47,0,1-.08,1.51-.06.32-.24.61-.3.94a2.23,2.23,0,0,0,.67,1.74c1.45,1.74,3.44,2.4,5.35,3.46,1.59.88,3.23,1.26,5.06,2.07s23.05,15.53,26.41,13.67,20.7-22,20.7-22C379.64,149.08,376.55,144.37,376.55,144.37Z" style="fill: rgb(255, 168, 167); transform-origin: 346.936px 161.749px 0px;" id="el74h6tbri2p8" class="animable"></path>
                            <path d="M389.72,144.74h0c7.9.55,8.46,4.37,10.44,8.54a13.54,13.54,0,0,1,.37,10.2L395,179.42s2.58,6.24,5.58,12.13c-13.83,7.72-31.1,3.66-35.26-2-.18-1.2.89-10.54,1.55-16.64-2.44-6.11-3.08-10-2.05-14,1.91-7.5,9.31-14.8,12.59-14.54Z" style="fill: rgb(245, 245, 245); transform-origin: 382.85px 170.087px 0px;" id="elvkj2pf7hfd" class="animable"></path>
                            <path d="M382.11,138.19h3.07A16.17,16.17,0,0,0,401.35,122h0a16.26,16.26,0,0,0-16.26-16.25H382.2A16.25,16.25,0,0,0,366,122h0A16.16,16.16,0,0,0,382.11,138.19Z" style="fill: rgb(38, 50, 56); transform-origin: 383.675px 121.97px 0px;" id="eluj94cc6jy4q" class="animable"></path>
                            <path d="M410,146.71h0a9.56,9.56,0,0,1-9.55-9.55V116.7h0a9.55,9.55,0,0,1,9.55,9.56Z" style="fill: rgb(38, 50, 56); transform-origin: 405.225px 131.705px 0px;" id="el1jtrp4ckquy" class="animable"></path>
                            <path d="M402.2,113.08l-2.39,3.84a2.2,2.2,0,0,0,3.12-.63A2.39,2.39,0,0,0,402.2,113.08Z" style="fill: rgb(38, 50, 56); transform-origin: 401.538px 115.198px 0px;" id="eli350vgoffcn" class="animable"></path>
                            <path d="M371.76,112.93c-1.87,1.1-4.18,5.8-3.95,15.66.19,8.36,2.9,10.42,4.26,11s4,.23,6.53-.2v5s-3.52,4.09-3.3,6.39,5.09,2.84,8.39.6a21.51,21.51,0,0,0,5.41-5.67V133.63a3.19,3.19,0,0,0,4.53.43c2.82-1.87,2.93-6.5,1.29-8.16s-5.17-1.13-5.82,1.16c0,0-4.07.15-9.48-2.82A15.22,15.22,0,0,1,371.76,112.93Z" style="fill: rgb(255, 168, 167); transform-origin: 381.892px 132.87px 0px;" id="elz6g9nwaa57" class="animable"></path>
                            <path d="M378.07,126.49a1.05,1.05,0,1,0,1.11-1A1.09,1.09,0,0,0,378.07,126.49Z" style="fill: rgb(38, 50, 56); transform-origin: 379.119px 126.539px 0px;" id="el13yfrzciwzdj" class="animable"></path>
                            <path d="M376.86,133.58l-2.44.77a1.26,1.26,0,0,0,1.58.88A1.34,1.34,0,0,0,376.86,133.58Z" style="fill: rgb(242, 143, 143); transform-origin: 375.668px 134.432px 0px;" id="ell4sa6ok65jq" class="animable"></path>
                            <path d="M369.46,123.27l2.12-1.48a1.24,1.24,0,0,0-1.76-.36A1.36,1.36,0,0,0,369.46,123.27Z" style="fill: rgb(38, 50, 56); transform-origin: 370.413px 122.239px 0px;" id="elgcqx40y7zrn" class="animable"></path>
                            <path d="M370,125.73a1.06,1.06,0,0,0,1,1.14,1.09,1.09,0,1,0-1-1.14Z" style="fill: rgb(38, 50, 56); transform-origin: 371.088px 125.784px 0px;" id="el8afw1inx9mr" class="animable"></path>
                            <polygon points="375.08 125.13 374.91 131.46 371.58 130.43 375.08 125.13" style="fill: rgb(242, 143, 143); transform-origin: 373.33px 128.295px 0px;" id="el4w62u7q963s" class="animable"></polygon>
                            <path d="M378.6,139.41c2.69-.35,8.22-1.94,9.08-4.12a5.7,5.7,0,0,1-1.94,2.79c-1.65,1.41-7.14,3-7.14,3Z" style="fill: rgb(242, 143, 143); transform-origin: 383.14px 138.185px 0px;" id="elwgeyu9wpmbo" class="animable"></path>
                            <g id="elxhcruxj4tfb">
                                <path d="M386.18,193.05a8.35,8.35,0,0,0,6.22-10.19,3,3,0,0,0-2.94-2.29h0a8.08,8.08,0,0,0,3.46-5.15l1.68-10a11.54,11.54,0,0,0-.43-4.85l5.56-6.43,1,.71a13.82,13.82,0,0,1-.23,8.62L395,179.42s2.58,6.24,5.58,12.13a35.75,35.75,0,0,1-29.55,2A40.45,40.45,0,0,0,386.18,193.05Z" style="opacity: 0.1; transform-origin: 386.17px 174.988px 0px;" class="animable"></path>
                            </g>
                            <path d="M414.75,184.43c-7.18-29.35-12.49-39.14-21.21-39-2.55,3-1.84,12.24,2.18,17.82,0,0,9,18.93,10.41,25.66,1.25,5.91,2.68,13.35,2.59,18.43a3.71,3.71,0,0,1-1,2.42c-1.64,1.78-1.64,3.21-2.71,5.17-.83,1.54-1.74,2.12-1.48,2.46a2,2,0,0,0,2.7.2,10.25,10.25,0,0,0,2-2,20.39,20.39,0,0,1-1.62,5.45c-1.84,4.15-1.39,6.27,4.21,4.79,3.51-.93,5.72-3.85,6.25-12.3a65.1,65.1,0,0,0,.09-9.34C416.45,196.19,415.91,189.15,414.75,184.43Z" style="fill: rgb(255, 168, 167); transform-origin: 404.666px 185.865px 0px;" id="el8oiwf5clwf" class="animable"></path>
                        </g>
                        <g id="freepik--character-1--inject-114" style="transform-origin: 295.333px 300.081px 0px;" class="animable">
                            <path d="M343.51,268.34c.77-28.57-1.52-35.41-9.12-40.64l-2.95,16.55s3.46,19.5,3.09,26c-.32,5.71-.88,12.85-2.23,17.46a3.48,3.48,0,0,1-1.51,2c-1.94,1.21-2.72,2.45-4.18,4-1.14,1.2-2.11,1.49-2,1.87a1.89,1.89,0,0,0,2.41.86,13.61,13.61,0,0,0,2.74-1.49,17.4,17.4,0,0,1-2.81,4.83c-2.72,3.33-2.84,5.38,2.65,5.43,3.43,0,6.17-2.09,8.76-9.66a62.16,62.16,0,0,0,2.41-8.51C342.13,279.49,343.39,272.94,343.51,268.34Z" style="fill: rgb(177, 102, 104); transform-origin: 334.126px 266.455px 0px;" id="el2xcpcg8uoag" class="animable"></path>
                            <path d="M328,225.53c3.63-.53,8.56.23,11.75,5.93s4,15.51,4.33,25.26c0,0-6.33,5.29-13.93,2.69Z" style="fill: rgb(39, 48, 107); transform-origin: 336.04px 242.759px 0px;" id="elvfjsp36tpsk" class="animable"></path>
                            <g id="eljvlksrqdd1g">
                                <path d="M328,225.53c3.63-.53,8.56.23,11.75,5.93s4,15.51,4.33,25.26c0,0-6.33,5.29-13.93,2.69Z" style="opacity: 0.1; transform-origin: 336.04px 242.759px 0px;" class="animable"></path>
                            </g>
                            <path d="M338.67,382.64c.57.22.72,1.32.81,3.5.06,1.65.42,4.54-1.52,5.11s-4.77.28-6-1.27c-1.55-2-2.59-3.66-4.8-6-1.92-2.06-4-4-4.76-6.86-.7-2.61-.12-3.74,1.66-4.5,2.44-1,6.29,2.37,8.2,2.9C333.9,376,338.09,382.42,338.67,382.64Z" style="fill: rgb(38, 50, 56); transform-origin: 330.828px 381.978px 0px;" id="elkfwybc6o9es" class="animable"></path>
                            <path d="M338.67,380.62v2.68a6.57,6.57,0,0,1-6.78.18c-.11-.26-.7-3.83-.7-3.83Z" style="fill: rgb(177, 102, 104); transform-origin: 334.93px 381.992px 0px;" id="elyi1cjjvmij" class="animable"></path>
                            <path d="M317,398.09a44.32,44.32,0,0,1,1.18,4.37c.33,1.62.8,4.33.24,5.55s-2.78,2-6.22,2c-2.22,0-5.68,1.49-8.05,2.81s-7.55,1.91-10.14,1.61c-3.05-.36-6.21-2.13-6.71-3.4s.16-2.57,7.36-5.64c.07,0,10-3.26,13.48-7.1Z" style="fill: rgb(38, 50, 56); transform-origin: 302.926px 406.298px 0px;" id="eld6h9a2ilelm" class="animable"></path>
                            <path d="M317,395.19s0,2,0,3.13-1.33,2.83-4.81,2.7c-2.44-.08-4.14-.74-4-2.75v-2.9Z" style="fill: rgb(177, 102, 104); transform-origin: 312.591px 398.109px 0px;" id="eleb6h16piph" class="animable"></path>
                            <path d="M340.41,345.05a73.36,73.36,0,0,0-3.16-14s.95-12,1.41-23.46c.5-12.34,0-27.84.21-30.92,0,0-39.8-8-40.51,6.2s1.57,50.56,2,56.82,1.55,11.81,2.85,22,4.85,33.68,4.85,33.68a9.4,9.4,0,0,0,8.86-.18s2.8-28.51,2.51-35.74a61.8,61.8,0,0,0-2.74-15.77s.75-11.76,1.42-22,1.37-15.14,1.52-19.58l.86-.43s.87,17.64,1.34,23.91,1.47,12.27,3.28,23.9c1.58,10.1,6.26,31.45,6.26,31.45,4.54,2.46,7.26-.32,7.26-.32S341.64,353.81,340.41,345.05Z" style="fill: rgb(55, 71, 79); transform-origin: 319.465px 335.408px 0px;" id="elglqqkz41mmg" class="animable"></path>
                            <path d="M319.67,302.11s9.66-4.76,14.49-9.05c0,0-4.49,6.32-10.38,9.12,0,0-2.09,21.92-2.08,21.48l-1.21-21.59Z" style="fill: rgb(38, 50, 56); transform-origin: 326.915px 308.363px 0px;" id="el5vslthh3bpr" class="animable"></path>
                            <polygon points="311.08 221.01 313.44 233.97 325.14 233.12 322.69 218.42 311.08 221.01" style="fill: rgb(177, 102, 104); transform-origin: 318.11px 226.195px 0px;" id="elz8ulf1j1h4p" class="animable"></polygon>
                            <path d="M337.51,232.17c-1.16-3.52-5.63-7.36-10.1-6.53a132.64,132.64,0,0,0-19.6,4.89c-4.1,1.47-7.83,5-8.17,18.48,0,0-1.37,31.42-1.39,37.49,10.28,4.07,21,3.95,26.89,2.66,12.32-2.69,13.8-7.8,13.8-7.8s.16-22.59-.21-32.35C338.42,240.72,338.31,234.59,337.51,232.17Z" style="fill: rgb(39, 48, 107); transform-origin: 318.612px 257.742px 0px;" id="eln9gbkyo46sb" class="animable"></path>
                            <path d="M302.05,205.24s-3,4.74-2.61,5.19,2.63.81,2.63.81Z" style="fill: rgb(177, 102, 104); transform-origin: 300.738px 208.24px 0px;" id="el4glfy5h1a37" class="animable"></path>
                            <path d="M310.29,192.15c-6.19,1.45-7.92,4.22-8.29,14.12-.38,10.34.75,13.56,2.14,14.92.93.92,6,1,8.58.21,3.19-1,10.4-3.7,13.68-9,3.86-6.2,4.73-14.5.37-17.81C320.63,190,312.81,191.55,310.29,192.15Z" style="fill: rgb(177, 102, 104); transform-origin: 315.805px 206.675px 0px;" id="el85glkbmuinj" class="animable"></path>
                            <path d="M311.21,221.72c2.1-1.69,1.91-2.78,1.91-2.78-1.5,1.41-7.08,2.61-9,2.25C304.91,222,308.54,222.12,311.21,221.72Z" style="fill: rgb(154, 74, 77); transform-origin: 308.622px 220.441px 0px;" id="el5defnsdmmuh" class="animable"></path>
                            <path d="M302.07,194.72c1.82,3.11,5.76,4.6,5.76,4.6,1.19,1.35.53,6.63,2.62,7.46,0,0,.9-3.84,4.13-3.43s3.78,4.53,1.79,7.08-3.9,1.64-3.9,1.64.22,5.45,2.71,8.49c0,0,2.77.83,7.8-.37,3.1-.73,7.41-4.72,9.16-8.87,3.72-8.8,3.81-16.64-1.8-18.86-.69-4-3.89-5.73-7.51-6.48-7.79-1.6-12.81,3.26-18.81,2.84C300.58,188.58,299.94,191.07,302.07,194.72Z" style="fill: rgb(38, 50, 56); transform-origin: 317.806px 203.248px 0px;" id="elvi1lmbg76c8" class="animable"></path>
                            <path d="M330.47,193.8l3.67-2.28a2.16,2.16,0,1,0-3.67,2.28Z" style="fill: rgb(38, 50, 56); transform-origin: 332.142px 192.15px 0px;" id="elxf4d8un2si" class="animable"></path>
                            <path d="M308.13,230.48s-5.82,1.08-8.86,5.68-16.2,21.1-16.2,21.1-18.92-9.47-19.85-10.6-.41-3.39-.15-4.64.68-4,1-4.8c.48-1.37-1.53-1-2.72.27s-1.71,3.76-2.3,4.19-5.1-4.75-7.28-7.25-3.21-4.25-4.68-3.22c-1.05.75-.37,2.23,1.19,4.37a24.15,24.15,0,0,1,2,2.84c.19.38-.39.69-.61.89-.43.38-1.18,1-1.24,1.6a5.26,5.26,0,0,1,0,1c-.21.71-1.09,1-1.34,1.74-.18.51,0,1.07-.08,1.6-.07.34-.25.64-.32,1a2.39,2.39,0,0,0,.71,1.84c1.53,1.83,3.63,2.53,5.64,3.64,1.67.93,3.4,1.33,5.33,2.19s24.61,17.62,28.15,15.67,21.68-23.15,21.68-23.15A14.65,14.65,0,0,0,308.13,230.48Z" style="fill: rgb(177, 102, 104); transform-origin: 278.557px 250.114px 0px;" id="elf65d6i0h9hk" class="animable"></path>
                            <path d="M310.16,229.8c-2.5.28-6-.18-10.91,5.08a153.17,153.17,0,0,0-11,14.2,13.91,13.91,0,0,0,11,10.33s8.58-8.79,11-13.64S313.1,233.06,310.16,229.8Z" style="fill: rgb(39, 48, 107); transform-origin: 300.234px 244.605px 0px;" id="eleypxvue1wbn" class="animable"></path>
                            <g id="el6xcau0b49s">
                                <path d="M310.16,229.8c-2.5.28-6-.18-10.91,5.08a153.17,153.17,0,0,0-11,14.2,13.91,13.91,0,0,0,11,10.33s8.58-8.79,11-13.64S313.1,233.06,310.16,229.8Z" style="opacity: 0.1; transform-origin: 300.234px 244.605px 0px;" class="animable"></path>
                            </g>
                        </g>
                        <defs>
                            <filter id="active" height="200%">
                                <feMorphology in="SourceAlpha" result="DILATED" operator="dilate" radius="2"></feMorphology>
                                <feFlood flood-color="#32DFEC" flood-opacity="1" result="PINK"></feFlood>
                                <feComposite in="PINK" in2="DILATED" operator="in" result="OUTLINE"></feComposite>
                                <feMerge>
                                    <feMergeNode in="OUTLINE"></feMergeNode>
                                    <feMergeNode in="SourceGraphic"></feMergeNode>
                                </feMerge>
                            </filter>
                            <filter id="hover" height="200%">
                                <feMorphology in="SourceAlpha" result="DILATED" operator="dilate" radius="2"></feMorphology>
                                <feFlood flood-color="#ff0000" flood-opacity="0.5" result="PINK"></feFlood>
                                <feComposite in="PINK" in2="DILATED" operator="in" result="OUTLINE"></feComposite>
                                <feMerge>
                                    <feMergeNode in="OUTLINE"></feMergeNode>
                                    <feMergeNode in="SourceGraphic"></feMergeNode>
                                </feMerge>
                                <feColorMatrix type="matrix" values="0   0   0   0   0                0   1   0   0   0                0   0   0   0   0                0   0   0   1   0 "></feColorMatrix>
                            </filter>
                        </defs>
                    </svg>
                </div>
                <div class="textWSV">
                    <span>Por favor selecciona un registro</span>
                </div>
            </div>
        </div>

        <div id="contNoteShadowBacground">
            <div id="FormNotesAdd">
                <div class="iconTitle">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V173.3c0-17-6.7-33.3-18.7-45.3L352 50.7C340 38.7 323.7 32 306.7 32H64zm0 96c0-17.7 14.3-32 32-32H288c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V128zM224 288a64 64 0 1 1 0 128 64 64 0 1 1 0-128z" />
                    </svg>
                    <svg id="svgClose" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path fill="#b0b0b0" d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                    </svg>

                    <span>Nueva nota</span>
                    <!--fecha y hora-->
                    <label id="fechaHoraAuto">26/04/2024 08:54:87</label>
                </div>

                <div id="formNotes" >
                 









                    <form id="FormAddNoteppal" method="post" action="<?= site_url('/Inicio/AddNotes')?>">
                        <div class="form-floating mb-3">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                <option selected>Seleccione la disposicion</option>
                                <?php foreach ($datos3 as $indexOP1 => $value1) : ?>
                                    <option value="<?= $indexOP1 + 1 ?>"><?= $value1['MR_CategoryDisposition_name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <label for="floatingSelect">Disposicion</label>
                        </div>
                        <!--CATEGORIAS SON 3 EN TOTAL-->
                        <!--TECNICOS-->
                        <div class="form-floating mb-3 tecnicoscmb">
                            <select class="form-select" id="floatingSelect1" aria-label="Floating label select example">
                                <option selected>Selecciona una categoria</option>
                                <?php foreach ($datos4 as $indexOP4 => $value4) : ?>
                                    <option value="<?= $indexOP4 + 1 ?>"><?= $value4['MR_dispositionName'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <label for="floatingSelect1">Categoria</label>
                        </div>

                        <!--OPERADOR-->
                        <div class="form-floating mb-3   operadorcmb">
                            <select class="form-select" id="floatingSelect2" aria-label="Floating label select example">
                                <option selected>Selecciona una categoria</option>
                                <?php foreach ($datos5 as $indexOP5 => $value5) : ?>
                                    <option value="<?= $indexOP5 + 1 ?>"><?= $value5['MR_dispositionName'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <label for="floatingSelect2">Categoria</label>
                        </div>

                        <!--REACCION-->
                        <div class="form-floating mb-3 reaccioncmb">
                            <select class="form-select" id="floatingSelect3" aria-label="Floating label select example">
                                <option selected>Selecciona una categoria</option>
                                <?php foreach ($datos6 as $indexOP6 => $value6) : ?>
                                    <option value="<?= $indexOP6 + 1 ?>"><?= $value6['MR_dispositionName'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <label for="floatingSelect3">Categoria</label>
                        </div>





                        <!--EMPLEADOS-->
                        <div class="form-floating mb-3">
                            <select class="form-select" id="floatingSelect4" aria-label="Floating label select example">
                                <option selected>Realizado por</option>
                                <?php foreach ($datos7 as $indexOP7 => $value7) : ?>
                                    <option value="<?= $indexOP7 + 1 ?>"><?= $value7['Fullname2'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <label for="floatingSelect">Empleado</label>
                        </div>





                        <div class="form-code-sheet ocultarcodigo">
                            <div class="form-floating mb-3 code-size">
                                <input type="text" class="form-control" id="floatingInputc1" placeholder="name@example.com">
                                <label for="floatingInputc1">Codigo</label>
                            </div>

                            <div class="form-floating mb-3 sheet-size">
                                <input type="text" class="form-control" id="floatingInputh1" placeholder="name@example.com">
                                <label for="floatingInputh1">Hoja</label>
                            </div>
                        </div>

                        <!--Text area-->
                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                            <label for="floatingTextarea2">Nota</label>
                        </div>

                        <div class="btn-radiobutton">
                            <button type="submit" class="btn btn-primary" id="BtnSendNote">Submit</button>


                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault11" />
                                <label class="form-check-label spannButtonGeneralSUB" for="flexRadioDefault1"> Activo </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault22" checked />
                                <label class="form-check-label spannButtonGeneralSUB" for="flexRadioDefault2"> Finalizado </label>
                            </div>

                            <!--OTROS NECESARIOS PARA GUARDAR UNA NOTA-->
                            <span id="idvehiculospann" style="display: none;"></span>
                            <span id="idclientespann" style="display: none;"></span>
                            <span id="idgpsspann" style="display: none;"></span>
                            <span id="idclientespann" style="display: none;"></span>


                        </div>


                    </form>
                </div>


            </div>
        </div>


        <!--JQUERY-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <!--JS MAIN LOCAL-->
        <script src="../public/js/tablas.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <!--DATATABLE JS-->
        <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>

        <!--variable de base url por que js se ejecuta del lado del cliente-->
        <script>
            const baseUrl = '<?= base_url() ?>';
        </script>

</body>

































</html>