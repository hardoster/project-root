function exportToExcel() {
    var workbook = XLSX.utils.table_to_book(document.querySelector("#tableReports"));

    // Obtener la primera hoja del libro de Excel
    var sheetName = workbook.SheetNames[0];
    var worksheet = workbook.Sheets[sheetName];

    // Aplicar el formato de celda "@" a todas las celdas
    var range = XLSX.utils.decode_range(worksheet['!ref']);
    for (var row = range.s.r; row <= range.e.r; row++) {
        for (var col = range.s.c; col <= range.e.c; col++) {
            var cellAddress = XLSX.utils.encode_cell({ r: row, c: col });
            var cell = worksheet[cellAddress];
            if (cell) {
                cell.z = "@"; // Aplicar formato de celda "@"
            }
        }
    }

    // Generar el archivo Excel
    var excelBuffer = XLSX.write(workbook, { bookType: "xlsx", type: "array" });

    // Convertir el buffer de Excel a un objeto Blob
    var blob = new Blob([excelBuffer], { type: "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" });

    // Crear una URL para el archivo Blob
    var url = URL.createObjectURL(blob);

    // Crear un enlace para descargar el archivo Excel
    var link = document.createElement("a");
    link.setAttribute("href", url);
    link.setAttribute("download", "ReporteH.xlsx");
    document.body.appendChild(link);

    // Hacer clic en el enlace para iniciar la descarga
    link.click();

    // Limpiar la URL del objeto Blob
    URL.revokeObjectURL(url);
}
