<?php

namespace App\Controllers;
use App\Models\MD_NOTES;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use CodeIgniter\HTTP\Response;


class CustomerReportView extends BaseController{

    public function CustomerReport()
    {
        $model = new MD_NOTES();
        
        $tipoReporte = $this->request->getPost('tipoReporte');
        $cuenta = $this->request->getPost('cuenta');
        $placa = $this->request->getPost('Placa');
        $date_start = $this->request->getPost('date_start');
        $date_end = $this->request->getPost('date_end');


          // Verifica si los valores no son nulos y son cadenas antes de convertir
          if (is_string($date_start) && is_string($date_end)) {
            // Convierte las fechas al formato 'Y-m-d H:i:s'
            $date_start = date('Y-m-d H:i:00', strtotime($date_start));
            $date_end = date('Y-m-d H:i:59', strtotime($date_end));
        } else {
            // Maneja el error si las fechas no son válidas
            return redirect()->back()->with('error', 'Las fechas no son válidas.');
        }

        $reportData = $model->getCustomerReport($cuenta, $placa, $date_start, $date_end, $tipoReporte);
        $session = session();
        $session->set('reportData', $reportData);
        return view('CustomerReportView', ['reportData' => $reportData]);
    }
   


}
