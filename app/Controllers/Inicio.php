<?php
 
namespace App\Controllers;

use App\Models\MD_INSERT_NOTE;
use App\Models\MD_tablappal;
use App\Models\MD_tablasec;

class Inicio extends BaseController
{   
   
    private $tb1models;
    private $tb2models;
    private $insertModel;
    public function __construct()
    {
        $this->tb1models = new MD_tablappal();
        $this->tb2models = new MD_tablasec();
        $this->insertModel = new MD_INSERT_NOTE();
    }

    public function cargartablappal()
    {
        $md_tablappal = new MD_tablappal();
        $md_tablasec = new MD_tablasec();

        $datos = $md_tablappal->obtenerRegistrostb1();
        $datos2 = $md_tablasec->obtenerRegistrostb2();
        $datos3 = $md_tablasec -> GetValidationsNotes();
        $datos4 = $md_tablasec -> GetValidationsNotesCategory1();
        $datos5 = $md_tablasec -> GetValidationsNotesCategory2();
        $datos6 = $md_tablasec -> GetValidationsNotesCategory3();
        $datos7 = $md_tablasec -> GetValidationsEmployees();
      //  return $this->response->setJSON($datos);  
       
       return view('vistag', ['datos' => $datos, 'datos2' => $datos2 , 'datos3' => $datos3,'datos4' => $datos4, 'datos5' => $datos5, 'datos6' => $datos6, 'datos7' => $datos7]);
        // return view('vistag', ['datos' => $datos]);

    }




    
    public function insert_note($idmr_disposition, $idmr_vehiculo, $idmr_cliente, $idmr_gps, $idmr_employee,
     $codigotec,$mr_notes, $date_add, $date_delete, $date_edit, $mr_status){

        $dataNote = array(
            'id_MR_disposition' => $idmr_disposition,
            'id_vehiculo' => $idmr_vehiculo,
            'id_cliente' => $idmr_cliente,
            'id_gps' => $idmr_gps,
            'id_MR_employee' => $idmr_employee,
            'codigoTec' => $codigotec,
            'MR_notes' => $mr_notes,
            'MR_date_add' => $date_add,
            'MR_date_delete' => $date_delete,
            'MR_date_edit' => $date_edit,
            'MR_status' => $mr_status
          );

         $valida = $this->insertModel->insert($dataNote);
         if ($valida > 0) {
            echo "datos guardados correctamente";
         }else{
            echo "datos no se guardaron correctamente";
         }

    }

}
