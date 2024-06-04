<?php

namespace App\Controllers;
use App\Models\MD_NOTES;

class CustomerReportView extends BaseController{

    public function CustomerReport()
    {
        $model = new MD_NOTES();
        
        $tipoReporte = $this->request->getPost('tipoReporte');
        $cuenta = $this->request->getPost('cuenta');
        $placa = $this->request->getPost('Placa');
        $date_start = $this->request->getPost('date_start');
        $date_end = $this->request->getPost('date_end');

        $reportData = $model->getCustomerReport($cuenta, $placa, $date_start, $date_end, $tipoReporte);

   
        return view('CustomerReportView', ['reportData' => $reportData]);
    }
   

    
}

?>