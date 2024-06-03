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
            document.querySelector('#cuenta').value = '';
            placaInput.style.display = 'none';
        } else if (selectedOption == 2) {
            cuentaInput.style.display = 'none';
            document.querySelector('#Placa').value = '';
            placaInput.style.display = 'flex';
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
} else {
    console.error("Uno o más elementos no se encontraron en el DOM.");
}
});