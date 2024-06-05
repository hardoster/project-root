$(document).ready(function() {
    var table = $('#tableReports').DataTable();

    $('#exportButton').on('click', function() {
        var data = table.rows().data().toArray();
        var json = JSON.stringify(data);
        console.log(json);


        $.ajax({
            url: 'DescargarExcel',
            type: 'POST',
            data: {jsonData: JSON.stringify(json)},
            success: function(response) {
                // Maneja la respuesta, por ejemplo, puedes descargar el archivo aquí
            },
            error: function(xhr, status, error) {
                // Maneja errores de AJAX
            }
        });



    });



















});