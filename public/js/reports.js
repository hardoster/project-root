$(document).ready(function () {
    // Obtén la referencia al select de búsqueda
    var SearchCustomerSelect = document.querySelector('#tipoBusqueda');

    // Escucha cambios en el select
    SearchCustomerSelect.addEventListener('change', function() {
        // Obtén el valor seleccionado del select
        var selectedOption = SearchCustomerSelect.value;

        // Variables para los inputs
        var cuentaInput = document.querySelector('#CuentaInput');
        var placaInput = document.querySelector('#placaInput');

        // Muestra u oculta inputs según el valor seleccionado
        if (selectedOption == 1) {
            cuentaInput.style.display = 'flex';
            document.querySelector('#cliente_id').value = '';
            placaInput.style.display = 'none';
        } else if (selectedOption == 2) {
            cuentaInput.style.display = 'none';
            document.querySelector('#Placa').value = '';
            placaInput.style.display = 'flex';
        }else {
            console.error("Uno o más elementos no se encontraron en el DOM.");
        }
    });




     // Cambiar la acción del formulario según el contenido
     $('#searchForm').on('submit', function(event) {
        event.preventDefault();

        var cuentaVal = $('#cuenta').val();
        
        var placaVal = $('#placa').val();

        if (cuentaVal.trim() !== '') {
            $(this).attr('action', 'TecReport/CustomerReport');
        } else if (placaVal.trim() !== '') {
            $(this).attr('action', 'TecReport/PlacaReport');
        }

        this.submit(); // Enviar el formulario después de modificar la acción
    });



});




$(document).ready(function () {
    var table = $('#tableReports').DataTable({
        pageLength: 3,
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
        }, 
    });
});