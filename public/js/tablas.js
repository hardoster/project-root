
$(document).ready(function () {
    var table = $('#tablafontsize').DataTable({
        language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": " _START_ a _END_ de _TOTAL_",
            "infoEmpty": "",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": " _MENU_ ",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        }, //para agregar otra propiedad a la datatable

        columnDefs: [{
            targets: [ 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19], //  indice a ocultar de la comulma
            visible: false // ocultar columna
        }]



    }); // Cierra la DataTable


    //para limpiar text area de notas al seleccionar nuevo registro---------------------------------------------------------------
    $('#tablafontsize tbody').on('click', 'tr', cleanTxtArea);

    function cleanTxtArea(){
        document.querySelector('#txtAreaNotes').value = ' ';
        document.querySelector('#txtEditSpanNotes').value = ' ';
        
        document.querySelector('#addUpdateNote').style.display = 'none'
    }
   // ----------------------------------------------------------------------------------------------------------------------------
    //para mostrar elemtos recuperados

    $('#tablafontsize tbody').on('click', 'tr', function () {

        var rowData = table.row(this).data();

        document.querySelector('#id_spannameaccount').textContent = rowData[1]; //nombre cliente 
        document.querySelector('#id_spantypecustomer').textContent = rowData[6]; //tipo de cliente
        document.querySelector('#id_spaninfc').textContent = rowData[7]; //notas del contrato
        document.querySelector('#id_spancontact').textContent = rowData[8]; //contactos a llamar
        document.querySelector('#id_spanPlacaTitle').textContent = 'Datos del Vehiculo: ' + rowData[2]; //contactos a llamar
        document.querySelector('#id_MarcaVH').textContent = rowData[9];
        document.querySelector('#id_modelovhspann').textContent = rowData[10];
        document.querySelector('#id_colorvhspann').textContent = rowData[11];
        document.querySelector('#id_aniospann').textContent = rowData[12];
        document.querySelector('#id_spannidgps').textContent = rowData[0];
        document.querySelector('#marcagps').textContent = 'Datos de GPS: '  + rowData[13];
        document.querySelector('#id_seriegpsspann').textContent = rowData[14];
        document.querySelector('#id_telefonogpsspann').textContent = rowData[15];
        document.querySelector('#id_simgpsspann').textContent = rowData[16];

        document.querySelector('#idvehiculospann').textContent = rowData[17];
        valVehicleSelect = parseInt(document.querySelector('#idvehiculospann').innerHTML);
        console.log(valVehicleSelect)

        document.querySelector('#idclientespann').textContent = rowData[18];
        valCustomerSelect = document.querySelector('#idclientespann').innerHTML;
        console.log(valCustomerSelect)

        document.querySelector('#idgpsspann').textContent = rowData[19];
        valgpsSelect = document.querySelector('#idgpsspann').innerHTML;
        console.log(valgpsSelect)

        document.querySelector('#table2').style = 'width: 100%';
        document.getElementById('btnclienteinf').style.opacity = '1';




        $.ajax({
            type: 'POST',
            url: 'tablaRegistro',
            data: { valVehicleSelect: valVehicleSelect },
            dataType: 'json',
            success: function (response) {
                console.log('Respuesta del servidor:', response);

                var datos2 = response.datos2;

                
                var table2 = $('#table2').DataTable();
                table2.clear().draw();

                // Agregar las nuevas filas con los datos recibidos
                $.each(datos2, function (index, tb2) {
                    table2.row.add([
                        tb2.placa,
                        tb2.cliente_nombre_cuenta,
                        tb2.gps_identificador,
                        tb2.disposition_nombre,
                        tb2.NAMECATDISPOSITION,
                        tb2.ods_code,
                        tb2.employee_name,
                        tb2.dateadd,
                        tb2.status,
                        tb2.id_mr_records


                    ]).draw();
                });

            },
            error: function (xhr, status, error) {
                console.error('Error:', error);
            }
        });





        //activar contenedores de informacion
        document.querySelector('.container1').style.display = 'grid';
        document.querySelector('.infcustomer1').style.display = 'grid';
        document.querySelector('.iconsinf').style.display = 'grid';
        document.querySelector('#infcustomer4').style.display = 'grid';
        document.querySelector('#tableregistros').style.display = 'grid';

        document.querySelector('.WaitSelectView').style.display = 'none';



    });

    //START STYLES MOFICABLES POR MEDIO DE JS PARA LA DATA TABLE
    document.querySelector('label[for="dt-search-0"]').textContent = 'Buscar';
    document.querySelector('label[for="dt-search-0"]').style.fontSize = '14px';

    document.querySelector('#dt-search-0').style.height = '30px';
    document.querySelector('#dt-search-0').style.borderRadius = '10px';

    document.querySelector('#tablafontsize_info').style.fontSize = '14px';
    document.querySelector('div.dt-container .dt-input').style.border = 'none';
    document.querySelector('div.dt-container .dt-input').style.fontSize = '14px';
    document.querySelector('#dt-search-0').style.border = '1px solid rgba(100, 100, 100, 0.4)';

    //END STYLES MOFICABLES POR MEDIO DE JS PARA LA DATA TABLE

});



$(document).ready(function () {

    keyupValuesTextArea2();

    var table2 = $('#table2').DataTable({
        language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": " _START_ a _END_ de _TOTAL_",
            "infoEmpty": "",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": " _MENU_ ",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        }, //para agregar otra propiedad a la datatable

        columnDefs: [{
            targets: [1, 2, 5, 6, 9],
            visible: false // ocultar columna
        }],

        searching: false,
        paging: true,
        pageLength: 3



    }); // Cierra la DataTable


    
    function keyupValuesTextArea2() {
        var textarea = document.querySelector('#txtEditSpanNotes');
        var btnUpdateN = document.querySelector('#addUpdateNote');
    
        textarea.addEventListener('keyup', function () {
            var textLength = this.value.length;
    
            if (textLength > 5) {
                btnUpdateN.disabled = false;
            } else {
                btnUpdateN.disabled = true;
            }
        });
    }
    
  
    
    $('#table2 tbody').on('click', 'tr', function () {

        var rowData2 = table2.row(this).data();

        console.log('de la fila', rowData2);
        var SelectRecord = document.querySelector('#SelectRecord').value = rowData2[9];
        console.log(SelectRecord);
      

        $.ajax({
            type: 'POST',
            url: 'RowTb2',
            data: { SelectRecord: SelectRecord },
            dataType: 'json',
            success: function (response) {
                console.log('Respuesta del servidor:', response);

                var datosR = response.data;

                var contador1 = '';

                datosR.forEach(function (nota) {
                    var date_add = nota.date_add;
                    var mr_note = nota.mr_note;
                    var usuario = nota.usuario;

                    var contador = date_add + ' | ' + usuario + ' | ' + mr_note + '\n' + '\n';
                    contador1 = contador1 + contador;
                });

                document.querySelector('#txtAreaNotes').value = contador1;


            },
            error: function (xhr, status, error) {
                console.error('Error:', error);
            }

        });

        if (rowData2[8] == "Activo") {
            flexRadioDefault1.checked = true;
            flexRadioDefault2.checked = false;
            document.querySelector('#addUpdateNote').style.display = 'flex';
            document.querySelector('#addUpdateNote').disabled = true;

        } else {
            flexRadioDefault1.checked = false;
            flexRadioDefault2.checked = true;
            document.querySelector('#addUpdateNote').style.display = 'none';
        }

          // Remover la clase 'selectedRecordTb2' de todas las filas
          $('#table2 tbody tr').removeClass('selectedRecordTb2');

          // Añadir la clase 'selectedRecordTb2' a la fila actualmente seleccionada
          $(this).addClass('selectedRecordTb2');
    
    });


});


document.querySelector('#addUpdateNote').addEventListener('click', function () {
    const temp_ready_send_idrecords = document.querySelector('#SelectRecord').value //document.querySelector('#temp_id_record').value // variable lista para enviar y guardar mis datos
    var temp_ready_send_note = document.querySelector('#txtEditSpanNotes').value
    var temp_ready_send_user = document.querySelector('#inputUser').value
    let temp_ready_send_status;

    const flexRadioDefault1 = document.querySelector('#flexRadioDefault1');

    if (flexRadioDefault1 && flexRadioDefault1.checked) {
        temp_ready_send_status = 'Activo';
    } else {
        temp_ready_send_status = 'Finalizado';
    }

    var url1 = "UpdateNotes";
    var url2 = "UpdateRecord";
 
    var dataUpNote = {
        id_mr_records: temp_ready_send_idrecords,
        usuario: temp_ready_send_user,
        mr_note: temp_ready_send_note,
    };

    const responseStatus = {
        id_mr_records: temp_ready_send_idrecords,
        status: temp_ready_send_status
    };

    fetch(url1, {
        method: "POST",
        body: JSON.stringify(dataUpNote),
        headers: {
            "Content-Type": "application/json",
        },
    })
        .then((res) => res.json())
        .catch((error) => console.error("Error", error))
        .then((response) => console.log("Success:", response));

        fetch(url2, {
            method: "POST",
            body: JSON.stringify(responseStatus),
            headers: {
                "Content-Type": "application/json",
            },
        })
        .then((res) => res.json())
        .then((response) => {
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "Registro guardado correctamente",
                showConfirmButton: false,
                timer: 4500
            });
        })
        .catch((error) => 
        
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "algo no salio como se esperaba!",
                footer: error
              })
        
        );
        

   

    document.querySelector('#txtEditSpanNotes').value = ' ';
    location.reload();
    });









/*botones intercambiables */
function mostrarInfo(numero) {
    const infcustomer1 = document.querySelector('.infcustomer1');
    const infcustomer2 = document.querySelector('.infcustomer2');
    const infcustomer3 = document.querySelector('.infcustomer3');

    // Ocultar todos los elementos infcustomer
    infcustomer1.classList.remove('slide-in-right');
    infcustomer2.classList.remove('slide-in-right');
    infcustomer3.classList.remove('slide-in-right');

    var iconcliente = document.getElementById('btnclienteinf');
    var iconcar = document.getElementById('btnvehiculosinf');
    var icongps = document.getElementById('btngpsinf');


    // Mostrar el elemento infcustomer correspondiente con animación
    switch (numero) {
        case 1:
            infcustomer1.style.display = 'grid';
            infcustomer2.style.display = 'none';
            infcustomer3.style.display = 'none';
            iconcliente.style.opacity = '1';
            iconcar.style.opacity = '0.5';
            icongps.style.opacity = '0.5';
            infcustomer1.classList.add('slide-in-right'); // Aplicar la animación a infcustomer1

            break;
        case 2:
            infcustomer1.style.display = 'none';
            infcustomer2.style.display = 'grid';
            infcustomer3.style.display = 'none';
            iconcliente.style.opacity = '0.5';
            iconcar.style.opacity = '1';
            icongps.style.opacity = '0.5';
            infcustomer2.classList.add('slide-in-right'); // Aplicar la animación a infcustomer2
            break;
        case 3:
            infcustomer1.style.display = 'none';
            infcustomer2.style.display = 'none';
            infcustomer3.style.display = 'grid';
            iconcliente.style.opacity = '0.5';
            iconcar.style.opacity = '0.5';
            icongps.style.opacity = '1';
            infcustomer3.classList.add('slide-in-right'); // Aplicar la animación a infcustomer3
            break;
        default:

 infcustomer1.style.display = 'grid';
            infcustomer2.style.display = 'none';
            infcustomer3.style.display = 'none';
            iconcliente.style.opacity = '1';
            iconcar.style.opacity = '0.5';
            icongps.style.opacity = '0.5';
            infcustomer1.classList.add('slide-in-right'); // Aplicar la animación a infcustomer1

            break;
    }
}






/*************************************************************************************************************/

/* se apagan las vistas solo para poder trabajar el diseño de la carga de espera*/
$(document).ready(function () {

    document.querySelector('.infcustomer1').style.display = 'none';
    document.querySelector('.iconsinf').style.display = 'none';
    document.querySelector('#infcustomer4').style.display = 'none';
    document.querySelector('#tableregistros').style.display = 'none';
    document.querySelector('#contNoteShadowBacground').style.display = 'none';


    document.querySelector('.tecnicoscmb').style.display = 'none';
    document.querySelector('.operadorcmb').style.display = 'none';
    document.querySelector('.reaccioncmb').style.display = 'none';

    //campos desabilitados del formulario
    document.querySelector('#floatingSelect4').disabled = 'true';
    document.querySelector('#floatingInputc1').disabled = 'true';
    document.querySelector('#floatingInputh1').disabled = 'true';
    document.querySelector('#floatingTextarea2').disabled = 'true';

    document.querySelector('#BtnSendNote').disabled = true;

    document.querySelector('#addUpdateNote').style.display = 'none';

    document.querySelector('#txtAreaNotes').disabled = true;





})

/************************************PARA MOSTRAR LA FECHA Y LA HORA*********************************************/

function actualizarFechaYHora() {
    var fechaHora = new Date();

    // Formatear la fecha y hora
    var fecha = fechaHora.toLocaleDateString();
    var hora = fechaHora.toLocaleTimeString();


    document.getElementById('fechaHoraAuto').textContent = fecha + ' ' + hora;
}

actualizarFechaYHora();

// Llamar a la función cada segundo para que se actualice la fecha y hora
//setInterval(actualizarFechaYHora, 1000);


/*--------------mostrar POPUP DE NOTAS-----------------------------------------------------------*/

const POPUPNOTE = document.querySelector('#contNoteShadowBacground');

document.querySelector('.newnotebtn').addEventListener('click', function () {
    POPUPNOTE.style.display = 'grid';
});

document.querySelector('#svgClose').addEventListener('click', function () {
    POPUPNOTE.style.display = 'none'
    document.querySelector('.nav-bar').style.zIndex = 1;
});


/*----------------------*------------------------------------------------------------------------*/

/*---------------------------------SELECCIONAR COMBOBOX CORRECTO******------------------------------*/

const selectElement = document.querySelector('#floatingSelect');

selectElement.addEventListener('change', CMBdinamic);

function CMBdinamic() {
    const CMBoption = parseInt(selectElement.value);
    const tecnicosCMB = document.querySelector('.tecnicoscmb');
    const operadorCMB = document.querySelector('.operadorcmb');
    const reaccionCMB = document.querySelector('.reaccioncmb');


    // Oculta todos los elementos antes de mostrar uno nuevo
    tecnicosCMB.style.display = 'none';
    operadorCMB.style.display = 'none';
    reaccionCMB.style.display = 'none';

    // Muestra el elemento correspondiente según la opción seleccionada
    switch (CMBoption) {
        case 1:
            tecnicosCMB.style.display = 'grid';
            document.querySelector('.ocultarcodigo').style.display = 'flex';
            document.querySelector('#floatingSelect4').disabled = false;
            document.querySelector('#floatingInputc1').disabled = false;

            keyupValuesTextArea();
            break;
        case 2:
            operadorCMB.style.display = 'grid';
            document.querySelector('#IdocultarCodigo').style.display = 'none';
            document.querySelector('.ocultarcodigo').style.display = 'none';
            document.querySelector('#floatingSelect4').disabled = true;


            keyupValuesTextArea();

            break;
        case 3:
            reaccionCMB.style.display = 'grid';
            document.querySelector('.ocultarcodigo').style.display = 'none';
            document.querySelector('#floatingSelect4').disabled = true;

            keyupValuesTextArea();
            break;
        default:
            tecnicosCMB.style.display = 'grid';
    }
}



//********************************************para insertar la nota***************************************************** */

var ultimoSeleccionado;

document.querySelectorAll('select[name = "dispositionSelected"]').forEach(function (select) {
    select.addEventListener('change', function () {
        ultimoSeleccionado = this.value;
        console.log(ultimoSeleccionado)
    })
});

/*PARA OBTENER EL VEHICULO ID*/ //se esta guardando en la variable valVehicleSelect cuando se da clic a una fila
/*para obtener el id cliente valCustomerSelect*/
/*para obtener el id gps idgpsspann*/
/*PARA OBTENER EL CODIGO DE TECNICOS ES LA VARIABLE */

/*PARA OBTENER LA CATEGORIA Y DISPOSICION*/
const reaccionCMB1 = document.querySelector('#floatingSelect3'); //obtener valor seleccionado de combobox reaccion
const operadorCMB1 = document.querySelector('#floatingSelect2'); //obtener valor seleccionado de combobox operador
const tecnicosCMB1 = document.querySelector('#floatingSelect1'); //obtener valor seleccionado de combobox tecnicos

document.querySelector('#floatingInputc1').addEventListener('click', function () {
    document.querySelector('#floatingInputh1').disabled = false;
    document.querySelector('#floatingTextarea2').disabled = false;



});


reaccionCMB1.addEventListener('change', function () {
    document.querySelector('#floatingTextarea2').disabled = false;
    keyupValuesTextArea();
});


operadorCMB1.addEventListener('change', function () {
    document.querySelector('#floatingTextarea2').disabled = false;

    keyupValuesTextArea();
});


function keyupValuesTextArea() {
    var textarea = document.querySelector('#floatingTextarea2');
    var btnSendNote = document.querySelector('#BtnSendNote');

    textarea.addEventListener('keyup', function () {
        var textLength = this.value.length;

        if (textLength > 2) {
            btnSendNote.disabled = false;
        } else {
            btnSendNote.disabled = true;
        }
    });
}




document.querySelector('#BtnSendNote').addEventListener('click', function (event) {


    codetecnico = document.querySelector('#floatingInputc1').value + '/' + document.querySelector('#floatingInputh1').value
    console.log(codetecnico);

    /*PARA GUARDAR LA NOTA ES LA VARIABLE  */
    var notecode = document.querySelector('#floatingTextarea2').value;
    console.log(notecode)

    /*PARA OBTENER EL ESTADO SI ES ACTIVO O FINALIZADO */
    var radio1 = document.querySelector("#flexRadioDefault11");
    // Verificar el estado
    var estadoRadio1 = radio1.checked;
    //variable que contrndra se llama statusNote
    var statusNote;





    if (estadoRadio1 == true) {
        statusNote = 'Activo';
        console.log(statusNote)
    } else if (estadoRadio1 == false) {
        statusNote = 'Finalizado';
        console.log(statusNote)
    }

    $('<input>').attr({
        type: 'hidden',
        name: 'dispositionadd',
        value: ultimoSeleccionado
    }).appendTo('#FormAddNoteppal');


    $('<input>').attr({
        type: 'hidden',
        name: 'idvehicleadd',
        value: valVehicleSelect
    }).appendTo('#FormAddNoteppal');

    $('<input>').attr({
        type: 'hidden',
        name: 'idclienteadd',
        value: valCustomerSelect
    }).appendTo('#FormAddNoteppal');

    $('<input>').attr({
        type: 'hidden',
        name: 'idgpsadd',
        value: valgpsSelect
    }).appendTo('#FormAddNoteppal');

    $('<input>').attr({
        type: 'hidden',
        name: 'codetecnicosadd',
        value: codetecnico
    }).appendTo('#FormAddNoteppal');

    $('<input>').attr({
        type: 'hidden',
        name: 'notecodeadd',
        value: notecode
    }).appendTo('#FormAddNoteppal');

    $('<input>').attr({
        type: 'hidden',
        name: 'statusNoteadd',
        value: statusNote

    }).appendTo('#FormAddNoteppal');

    const placacar = document.querySelector('#id_spanPlacaTitle').textContent;
        Swal.fire({
      position: "top-end",
      icon: "success",
      
      title: "Registro guardado correctamente " + '\n' + placacar,
      showConfirmButton: false,
      timer: 4500
    });
    
    document.querySelector('#txtEditSpanNotes').value = ' ';


});




/*********************************************************************FILTROS DE TB2************************************************************************ */

$(document).ready(function () {


    const btnFilterTec = document.querySelector('#btnFilterTec');
    const btnFilterOp  = document.querySelector('#btnOperadorFilter');
    const btnFilterRe = document.querySelector('#btnFilterReaccion');

    btnFilterTec.addEventListener('click', filtrarTecnicos);
    btnFilterOp.addEventListener('click' , filterOpe);
    btnFilterRe.addEventListener('click' , filterReact);
  

    function filtrarTecnicos(){
       // var temp_id_record = document.querySelector('#temp_id_record').value ;
        console.log(valVehicleSelect)
        $.ajax({
            type: 'POST',
            url: 'filterT',
            data: { valVehicleSelect: valVehicleSelect },
            dataType: 'json',
            success: function (response) {
                console.log('Respuesta del servidor:', response);
    
                var dataFT = response.dataFT;
    
    
                var table2 = $('#table2').DataTable();
                table2.clear().draw();
    
                // Agregar las nuevas filas con los datos recibidos
                $.each(dataFT, function (index, tb2) {
                    table2.row.add([
                        tb2.placa,
                        tb2.cliente_nombre_cuenta,
                        tb2.gps_identificador,
                        tb2.disposition_nombre,
                        tb2.NAMECATDISPOSITION,
                        tb2.ods_code,
                        tb2.employee_name,
                        tb2.dateadd,
                        tb2.status,
                        tb2.id_mr_records
    
    
                    ]).draw();
                });
            },
            error: function (xhr, status, error) {
                console.error('Error:', error);
            }
        });
    
    }

    function filterOpe(){

        console.log(valVehicleSelect)
        $.ajax({
            type: 'POST',
            url: 'filterO',
            data: { valVehicleSelect: valVehicleSelect },
            dataType: 'json',
            success: function (response) {
                console.log('Respuesta del servidor:', response);
    
                var dataFO = response.dataFO;
    
                var table2 = $('#table2').DataTable();
                table2.clear().draw();
    
                // Agregar las nuevas filas con los datos recibidos
                $.each(dataFO, function (index, tb2) {
                    table2.row.add([
                        tb2.placa,
                        tb2.cliente_nombre_cuenta,
                        tb2.gps_identificador,
                        tb2.disposition_nombre,
                        tb2.NAMECATDISPOSITION,
                        tb2.ods_code,
                        tb2.employee_name,
                        tb2.dateadd,
                        tb2.status,
                        tb2.id_mr_records
    
    
                    ]).draw();
                });
            },
            error: function (xhr, status, error) {
                console.error('Error:', error);
            }
        });
    }

    function filterReact(){

        console.log(valVehicleSelect)
        $.ajax({
            type: 'POST',
            url: 'filterR',
            data: { valVehicleSelect: valVehicleSelect },
            dataType: 'json',
            success: function (response) {
                console.log('Respuesta del servidor:', response);
    
                var dataRE = response.dataRE;
    
                var table2 = $('#table2').DataTable();
                table2.clear().draw();
    
                // Agregar las nuevas filas con los datos recibidos
                $.each(dataRE, function (index, tb2) {
                    table2.row.add([
                        tb2.placa,
                        tb2.cliente_nombre_cuenta,
                        tb2.gps_identificador,
                        tb2.disposition_nombre,
                        tb2.NAMECATDISPOSITION,
                        tb2.ods_code,
                        tb2.employee_name,
                        tb2.dateadd,
                        tb2.status,
                        tb2.id_mr_records
    
    
                    ]).draw();
                });
            },
            error: function (xhr, status, error) {
                console.error('Error:', error);
            }
        });
    }


});

//for Btn_NewData show FormNotesAdd-------------------------------------------------------------------------------------------------------
document.querySelector('#Btn_NewData').addEventListener('click', function(){
    document.querySelector('#FormNotesAdd').style.display = 'grid';
    document.querySelector('.nav-bar').style.zIndex = 0;
});


//for show div info vehiculos---------------------------------------------------------------------------------------------------------------

 document.getElementById('btnvehiculosinf').addEventListener('click', function(){

    document.querySelector('.container2').style.display = 'grid'; 

 });

//for show div info gps information----------------------------------------------------------------------------------------------------------


document.getElementById('btngpsinf').addEventListener('click', function(){

    document.querySelector('.container3').style.display = 'grid'; 

 });




















































