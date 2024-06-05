<?php

namespace App\Controllers;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

use DomDocument;

class ExcelController extends BaseController
{
    public function __construct()
    {
        // Incluir el autoloader de PhpSpreadsheet
        require_once APPPATH . 'ThirdParty/php_spreadsheet_loader.php';
    }



    public function export()
    {
        $html = $this->request->getPost('html');

        if (is_null($html) || !is_string($html)) {
            return $this->response->setStatusCode(400, 'Invalid HTML content');
        }

        $dom = new DomDocument();
        @$dom->loadHTML($html);
        $rows = $dom->getElementsByTagName('tr');

        $excel = new Spreadsheet();
        $hojaActiva = $excel->getActiveSheet();
        $hojaActiva->setTitle('Reporte de trabajos realizados');
        $hojaActiva->getColumnDimension('A')->setWidth(8);
        $hojaActiva->setCellValue('A1','Registro');
        $hojaActiva->getColumnDimension('B')->setWidth(25);
        $hojaActiva->setCellValue('B1','Nota');
        $hojaActiva->getColumnDimension('C')->setWidth(11);
        $hojaActiva->setCellValue('C1','Usuario');
        $hojaActiva->getColumnDimension('D')->setWidth(10);
        $hojaActiva->setCellValue('D1','Fecha_Nota');  
        $hojaActiva->getColumnDimension('E')->setWidth(18);
        $hojaActiva->setCellValue('E1','Codigo');
        $hojaActiva->getColumnDimension('F')->setWidth(23);
        $hojaActiva->setCellValue('F1','Estado');
        $hojaActiva->getColumnDimension('G')->setWidth(27);
        $hojaActiva->setCellValue('G1','Fecha Registro');
        $hojaActiva->getColumnDimension('H')->setWidth(9);
        $hojaActiva->setCellValue('H1','Placa');
        $hojaActiva->getColumnDimension('I')->setWidth(100);
        $hojaActiva->setCellValue('I1','Cuenta');
        $hojaActiva->getColumnDimension('J')->setWidth(100);
        $hojaActiva->setCellValue('J1','Disposicion');
        $hojaActiva->getColumnDimension('K')->setWidth(100);
        $hojaActiva->setCellValue('K1','Categoria');
        $hojaActiva->getColumnDimension('L')->setWidth(100);
        $hojaActiva->setCellValue('L1','Tecnico');
        
        $fila = 2;

        $writer = new Xlsx($spreadsheet);

        $fileName = 'exported_table_' . date('Ymd_His') . '.xls';

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="myfile.xls"');
        header('Cache-Control: max-age=0');


        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
        exit;
    }
}
