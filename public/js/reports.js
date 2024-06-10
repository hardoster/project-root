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
            cuentaInput.style.display = 'flex'
            placaInput.style.display = 'none';
            document.querySelector('#cliente_id').value = '';
            

        } else if(selectedOption == 2) {
            cuentaInput.style.display = 'none';
            document.querySelector('#Placa').value = '';
            placaInput.style.display = 'flex';
        }
    });



    document.querySelector('#btnGenerar').disabled = true;

    document.querySelector('#tipoBusqueda').addEventListener('change', function() {
    
        var inputAccount = document.querySelector('#cuenta');
        var inputPlaca = document.querySelector('#Placa');
    
        // Función para habilitar/deshabilitar el botón según los valores de los campos
        function KeysValidate() {
            if (inputAccount.value.length > 3 || inputPlaca.value.length > 3) {
                document.querySelector('#btnGenerar').disabled = false;
            } else {
                document.querySelector('#btnGenerar').disabled = true;
            }
        }
    
        // Agregar eventos de teclado a los campos
        inputAccount.addEventListener('keyup', function() {
            KeysValidate();
        });
    
        inputPlaca.addEventListener('keyup', function() {
            KeysValidate();
        });
    
        // Llamar a la función para verificar el estado del botón cuando cambie la selección en el combobox
        KeysValidate();
    });
    


    
    
});



