<?php
 
namespace App\Controllers;

use App\Models\MD_INSERT_NOTE;
use App\Models\MD_tablappal;
use App\Models\MD_tablasec;
use App\Models\MD_categoryDisposition;
use App\Models\MD_disposition;
use App\Models\MD_NOTES;
use App\Models\MD_empleados;

class Inicio extends BaseController
{   
   
    private $tb1models;
    private $tb2models;
    private $insertModel;
    public function __construct()
    {
        $this->tb1models = new MD_tablappal();
        $this->tb2models = new MD_tablasec();
        // $insertModel = new MD_INSERT_NOTE();
    }




   

    public function cargartablappal()
    {
        $md_tablappal = new MD_tablappal();
        $md_tablasec = new MD_tablasec();
        $md_catDisposition = new MD_categoryDisposition();
        $md_disposition = new MD_disposition();
        $md_empleados = new MD_empleados();
    
        // Obtener los datos de $md_catDisposition y asegurarse de que sea un array
        $datos3 = $md_catDisposition->findAll();

        $datos4 = $md_disposition->where('id_mr_categoryDisposition', 1)->findAll();
        $datos5 = $md_disposition->where('id_mr_categoryDisposition', 2)->findAll();
        $datos6 = $md_disposition->where('id_mr_categoryDisposition', 3)->findAll();
        $datos7 = $md_empleados->findAll();

        $datos = $md_tablappal->obtenerRegistrostb1();

        
        return view('vistag', [
            'datos' => $datos,
            'datos3' => $datos3,
            'datos4' => $datos4,
            'datos5' => $datos5,
            'datos6' => $datos6,
            'datos7' => $datos7
        ]);
    }
    

    public function cargarTb2(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $valVehicleSelect = $_POST['valVehicleSelect'];
            $md_tablasec = new MD_tablasec();
            $datos2 = $md_tablasec->obtenerRegistrostb2($valVehicleSelect);
            
            // Devolver los datos en formato JSON
            echo json_encode(['datos2' => $datos2]);
        } else {
            // Maneja el caso en que no se reciba una solicitud POST
            echo json_encode(['error' => 'Solicitud incorrecta']);
        }
    }


    public function SelectRowTB2(){
        $SelectRecord = $this->request->getPost('SelectRecord');
        $md_notes = new MD_NOTES();

        $data = $md_notes->where('id_mr_records', $SelectRecord)->findAll();

        return $this->response->setJSON(['data' => $data]);
    }


}
