<?php

namespace App\Controllers;


use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use CodeIgniter\HTTP\Response;

class ExcelController extends BaseController
{
    public function __construct()
    {
        // Incluir el autoloader de PhpSpreadsheet
        require_once APPPATH . 'ThirdParty/PhpSpreadsheet/src/PhpSpreadsheet/Bootstrap.php';
    }

    public function export()
    {

        $jsonData = $this->request->getPost('jsonData');

        if (!is_string($jsonData)) {
            return $this->response->setStatusCode(400)->setJSON(['error' => 'El JSON no es una cadena de texto válida']);
        }
        $dataArray = json_decode($jsonData, true);


        $spreadsheet = new Spreadsheet();
        $hojaActiva = $spreadsheet->getActiveSheet();
        $hojaActiva->setTitle('Reporte de trabajos realizados');

        // Array de títulos de las columnas
        $titulos = [
            'Registro', 'Nota', 'Usuario', 'Fecha_Nota', 'Codigo',
            'Estado', 'Fecha Registro', 'Placa', 'Cuenta', 'Disposicion',
            'Categoria', 'Tecnico'
        ];

        // Ancho de las columnas
        $anchoColumnas = [
            8, 25, 11, 10, 18, 23, 27, 9, 100, 100, 100, 100
        ];

        // Establecer los títulos de las columnas y el ancho de las columnas
        foreach ($titulos as $index => $titulo) {
            $columna = chr(65 + $index); // Convertir el índice en la letra de la columna
            $hojaActiva->setCellValue($columna . '1', $titulo);
            $hojaActiva->getColumnDimension($columna)->setWidth($anchoColumnas[$index]);
        }

        // Guardar el archivo Excel en el servidor
        $writer = new Xlsx($spreadsheet);
        $fileName = 'excel_file.xlsx';
        $filePath = WRITEPATH . 'uploads/' . $fileName;
        $writer->save($filePath);

        // Devolver el archivo Excel al cliente
        return $this->response->download($filePath, null)->setFileName($fileName);
    }
}
