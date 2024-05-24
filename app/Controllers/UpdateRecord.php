<?php
 
namespace App\Controllers;

use App\Models\MD_RECORDS;

class UpdateRecord extends BaseController
{   
    public function UpdateRecord(){
        $insertModelNote2 = new MD_RECORDS();
        
        $requestData = $this->request->getJSON();
        $id_mr_records = $requestData->id_mr_records;
        $status = $requestData->status;

      $insertModelNote2->set('status', $status);
      $insertModelNote2->where('id_mr_records', $id_mr_records);
      $insertModelNote2->update();
    
      return $this->response->setJSON(['success' => true, 'message' => 'Record updated successfully.']);

    }


}

?>