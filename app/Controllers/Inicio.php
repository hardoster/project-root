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
        // $insertModel = new MD_INSERT_NOTE();
    }

   

    public function cargartablappal()
    {
        $md_tablappal = new MD_tablappal();
        $md_tablasec = new MD_tablasec();
        $datos = $md_tablappal->obtenerRegistrostb1();
        $datos3 = $md_tablasec -> GetValidationsNotes();
        $datos4 = $md_tablasec -> GetValidationsNotesCategory1();
        $datos5 = $md_tablasec -> GetValidationsNotesCategory2();
        $datos6 = $md_tablasec -> GetValidationsNotesCategory3();
        $datos7 = $md_tablasec -> GetValidationsEmployees();

       return view('vistag', ['datos' => $datos, 'datos3' => $datos3,'datos4' => $datos4, 'datos5' => $datos5, 'datos6' => $datos6, 'datos7' => $datos7]);
  
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




    public function insert_note(){
      $insertModel = new MD_INSERT_NOTE();

        $idmr_disposition = $this->request->getPost('dispositionadd');
        $idmr_vehiculo = $this->request->getPost('idvehicleadd');
        $idmr_cliente = $this->request->getPost('idclienteadd');
        $idmr_gps = $this->request->getPost('idgpsadd');
        $idmr_employee = $this->request->getPost('idemployeeadd');
        $codigotec = $this->request->getPost('codetecnicosadd');
        $mr_notes = $this -> request->getPost('notecodeadd');
      
        $mr_status = $this->request->getPost('statusNoteadd');

        $dataNote = array(
            'id_MR_disposition' => $idmr_disposition,
            'id_vehiculo' => $idmr_vehiculo,
            'id_cliente' => $idmr_cliente,
            'id_gps' => $idmr_gps,
            'id_MR_employee' => $idmr_employee,
            'codigoTec' => $codigotec,
            'MR_notes' => $mr_notes,
            
            'MR_status' => $mr_status
          );

          if (($insertModel)->insert($dataNote)) {
            return redirect()->to(site_url('/inicio'))->with('success', '¡Registro exitoso! Ahora puedes iniciar sesión.');
        } else {
            // Hubo un error al insertar en la base de datos, redirigir de nuevo al formulario de registro
            return redirect()->to(site_url('/inicio'))->with('error', 'Hubo un error al procesar el registro. Por favor, inténtalo de nuevo.');
        }

    }

    /*
       if ((new MD_INSERT_NOTE())->insert($this->request->getPost())) {
            return redirect()->to(site_url('inicio'))->with('success', '¡Registro exitoso! Ahora puedes iniciar sesión.');
        } else {
            // Hubo un error al insertar en la base de datos, redirigir de nuevo al formulario de registro
            return redirect()->to(site_url('inicio'))->with('error', 'Hubo un error al procesar el registro. Por favor, inténtalo de nuevo.');
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

    }*/

}
