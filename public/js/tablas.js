
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
         targets: [4, 6, 7, 8 , 9, 10, 11, 12, 13, 14, 15, 16,17,18,19], //  indice a ocultar de la comulma
         visible: false // ocultar columna
        }]

        document.querySelector('#dt-search-0').style = 'border-radius = 0';


    }); // Cierra la DataTable

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
        document.querySelector('#id_marcagpsspann').textContent = rowData[13];
        document.querySelector('#id_seriegpsspann').textContent = rowData[14];
        document.querySelector('#id_telefonogpsspann').textContent = rowData[15];
        document.querySelector('#id_simgpsspann').textContent = rowData[16];

        document.querySelector('#idvehiculospann').textContent = rowData[17];
        valVehicleSelect = document.querySelector('#idvehiculospann').innerHTML;
        console.log(valVehicleSelect) 

        document.querySelector('#idclientespann').textContent = rowData[18];
        valCustomerSelect = document.querySelector('#idclientespann').innerHTML;
        console.log(valCustomerSelect) 

        document.querySelector('#idgpsspann').textContent = rowData[19];
        valgpsSelect = document.querySelector('#idgpsspann').innerHTML;
        console.log(valgpsSelect) 









        //activar contenedores de informacion
        document.querySelector('.infcustomer1').style.display = 'grid';
        document.querySelector('.iconsinf').style.display = 'grid';
        document.querySelector('#infcustomer4').style.display = 'grid';
        document.querySelector('#tableregistros').style.display = 'grid';

        document.querySelector('.WaitSelectView').style.display = 'none';

        fetch() 



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
    var table = $('#table2').DataTable({
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
            targets: [1 , 2,4, 5,6,7,8], 
            visible: false // ocultar columna
        }],

        searching: false,
        paging: false

    }); // Cierra la DataTable

  


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
            break;
    }
}






/*************************************************************************************************************/

/* se apagan las vistas solo para poder trabajar el diseño de la carga de espera*/
$(document).ready(function(){

    document.querySelector('.infcustomer1').style.display = 'none';
    document.querySelector('.iconsinf').style.display = 'none';
    document.querySelector('#infcustomer4').style.display = 'none';
    document.querySelector('#tableregistros').style.display = 'none';
    document.querySelector('#contNoteShadowBacground').style.display = 'none';
    

   document.querySelector('.tecnicoscmb').style.display = 'none';;
   document.querySelector('.operadorcmb').style.display = 'none';;
   document.querySelector('.reaccioncmb').style.display = 'none';;
 
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

    document.querySelector('.newnotebtn').addEventListener('click', function(){
        POPUPNOTE.style.display = 'grid';
    });

   document.querySelector('#svgClose').addEventListener('click', function(){
    POPUPNOTE.style.display = 'none'
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
            break;
        case 2:
            operadorCMB.style.display = 'grid';
            break;
        case 3:
            reaccionCMB.style.display = 'grid';
            break;
        default:
            tecnicosCMB.style.display = 'grid';
    }

    const employeesoption = document.querySelector('#floatingSelect4')
    employeesoption.addEventListener('change' , CMBemployees);

    function CMBemployees (){
        CBMoptiomEMP = parseInt(employeesoption.value);

        if (CBMoptiomEMP == 5 ) {
                document.querySelector('.ocultarcodigo').style.display = 'none';
        }
        else {
            document.querySelector('.ocultarcodigo').style.display = 'flex';

        }

    }

    //********************************************para insertar la nota***************************************************** */
    /*PARA OBTENER LA CATEGORIA Y DISPOSICION*/
    const reaccionCMB1 = document.querySelector('#floatingSelect3'); //obtener valor seleccionado de combobox reaccion
    const operadorCMB1 = document.querySelector('#floatingSelect2'); //obtener valor seleccionado de combobox operador
    const tecnicosCMB1 = document.querySelector('#floatingSelect1'); //obtener valor seleccionado de combobox tecnicos
    var valorSeleccionado; //valor seleccionado no procesado aun como entero

            reaccionCMB1.addEventListener('change', function() {
                     valorSeleccionado = parseInt(reaccionCMB1.value)
                     console.log(valorSeleccionado)
            });
            operadorCMB1.addEventListener('change', function() {
                valorSeleccionado = parseInt(operadorCMB1.value)
                console.log(valorSeleccionado)

            });
            tecnicosCMB1.addEventListener('change', function() {
                valorSeleccionado = parseInt(tecnicosCMB1.value)
                console.log(valorSeleccionado)

            });

    const empleadoidcmb = document.querySelector('#floatingSelect4'); //obtener valor seleccionado de combobox empleados
    var idclienteval;
    empleadoidcmb.addEventListener('change', function(){
        idclienteval = parseInt(empleadoidcmb.value)
        console.log(idclienteval)
    })


    


    /*Para obtener el valor disposicion esta en la variable DispositionAdd*/ 
    /*PARA OBTENER EL VEHICULO ID*/ //se esta guardando en la variable valVehicleSelect cuando se da clic a una fila
    /*para obtener el id cliente idclientespann*/
    /*para obtener el id gps idgpsspann*/
    /*para obtener id mr employees esta en la variable idclienteval*/
     /*PARA OBTENER EL CODIGO DE TECNICOS ES LA VARIABLE */
        //COLOCAR SIGUIENTE COODIGO EN EL BOTON SUBMIT
        var codetecnicoselector = document.querySelector('#floatingInputc1').value;
        var hojatecnicoselector = document.querySelector('#floatingInputh1').value;
        codetecnico = console.log(codetecnicoselector +  '//' + hojatecnicoselector ); 
        console.log(codetecnico)
    /*PARA GUARDAR LA NOTA ES LA VARIABLE  */
        var notecode = document.querySelector('#floatingTextarea2').value;
        console.log(notecode)
    /*para guardar la fecha de adicion de la nota */
        var dateadd = document.querySelector('#fechaHoraAuto').value
        console.log(dateadd)
    
        
}






















































