<?php

namespace App\Controllers;
use App\Models\MD_NOTES;

class TecReport extends BaseController{

    public function TecReportView()
    {
        return view('TecReport');
    }


    public function CustomerReport()
    {
        $model = new MD_NOTES();
        
        $cuenta = $this->request->getPost('cuenta');
        $date_start = $this->request->getPost('date_start');
        $date_end = $this->request->getPost('date_end');

        $reportData = $model->getCustomerReport($cuenta, $date_start, $date_end);

   
        return view('CustomerReportView', ['reportData' => $reportData]);
    }

    
}

?>