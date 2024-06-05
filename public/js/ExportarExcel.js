function exportTableToExcel() {
    var tableReport = document.querySelector('#tableReports');
    var html = tableReport.outerHTML;

    $.ajax({
        url: 'DescargarExcel', // Ajusta la URL según sea necesario
        method: 'POST',
        data: { html: html },
        xhrFields: {
            responseType: 'blob' // importante para recibir el archivo binario
        },
        success: function(data, status, xhr) {
            var disposition = xhr.getResponseHeader('Content-Disposition');
            var filename = "exported_table.xlsx";
            if (disposition && disposition.indexOf('attachment') !== -1) {
                var matches = /filename[^;=\n]*=((['"]).*?\2|[^;\n]*)/.exec(disposition);
                if (matches != null && matches[1]) {
                    filename = matches[1].replace(/['"]/g, '');
                }
            }

            var blob = new Blob([data], { type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' });

            // Crear un enlace para la descarga
            var link = document.createElement('a');
            link.href = window.URL.createObjectURL(blob);
            link.download = filename;
            link.click();
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error('Error al exportar la tabla:', textStatus, errorThrown);
        }
    });
}