<?php
 
namespace App\Controllers;

use App\Models\MD_RECORDS;

class UpdateRecord extends BaseController
{   


    public function UpdateRecord(){
        $insertModelNote2 = new MD_RECORDS();
        
        $JSON_Update_Notes1 = $this->request->getJSON();
        $id_mr_records = $JSON_Update_Notes1->id_mr_records;
        $status = $JSON_Update_Notes1->status;
        
        $data = [
            'status' => $status
        ];
        
        // Actualiza el registro con los datos proporcionados
        $insertModelNote2->where('id_mr_records', $id_mr_records)->update($data);
        
        // No retornar ningún valor
    }
    

}
