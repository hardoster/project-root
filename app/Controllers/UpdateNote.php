<?php
 
namespace App\Controllers;


use App\Models\MD_NOTES;


class UpdateNote extends BaseController
{   
   
    public function UpdateNote(){
        $insertModelNote = new MD_NOTES();

        $JSON_Update_Notes = $this->request->getJSON();
        $id_mr_records = $JSON_Update_Notes->id_mr_records;
        $usuario = $JSON_Update_Notes->usuario;
         $mr_note = $JSON_Update_Notes->mr_note;
         $update

      $response = [
          'id_mr_records' => $id_mr_records,
          'usuario' => $usuario,
          'mr_note' => $mr_note
         ];
           $insertModelNote ->insert($response);
           return $this->response->setJSON($response);
        }



}
