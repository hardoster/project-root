<?php
 
namespace App\Controllers;


use App\Models\MD_tablappal;
use App\Models\MD_tablasec;
use App\Models\MD_categoryDisposition;
use App\Models\MD_disposition;
use App\Models\MD_NOTES;
use App\Models\MD_records;

class FilterTb2 extends BaseController
{   

    public function FilterReac(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $valVehicleSelect = $_POST['valVehicleSelect'];
            $md_records = new MD_records();
            $dataRE = $md_records->GetFilterReac($valVehicleSelect);

            echo json_encode(['dataRE' => $dataRE]);

          }else{
            echo json_encode(['errot' => 'solicitud incorrecta']);
          }
    }

    public function FilterOP(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $valVehicleSelect = $_POST['valVehicleSelect'];
            $md_records = new MD_records();
            $dataFO = $md_records->GetFilterOP($valVehicleSelect);

            echo json_encode(['dataFO' => $dataFO]);

          }else{
            echo json_encode(['errot' => 'solicitud incorrecta']);
          }
    }
   

    public function FilterTec(){
              if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $valVehicleSelect = $_POST['valVehicleSelect'];
                $md_records = new MD_records();
                $dataFT = $md_records->GetFilterTec($valVehicleSelect);

                echo json_encode(['dataFT' => $dataFT]);

              }else{
                echo json_encode(['errot' => 'solicitud incorrecta']);
              }
    }




}
