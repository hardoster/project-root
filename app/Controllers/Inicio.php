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

    public function UpdateNote(){
        $insertModelNote = new MD_NOTES();

        $JSON_Update_Notes = $this->request->getJSON();
        $id_mr_records = $JSON_Update_Notes->id_mr_records;
        $usuario = $JSON_Update_Notes->usuario;
         $mr_note = $JSON_Update_Notes->mr_note;

      $response = [
          'id_mr_records' => $id_mr_records,
          'usuario' => $usuario,
          'mr_note' => $mr_note
         ];
           $insertModelNote ->insert($response);
           return $this->response->setJSON($response);
        }
   /* public function UpdateNote(){
        $insertModelNote = new MD_NOTES();

        $JSON_Update_Notes = $this->request->getJSON();

           $id_mr_records = $JSON_Update_Notes->id_mr_records;
          $usuario = $JSON_Update_Notes->usuario;
           $mr_note = $JSON_Update_Notes->mr_note;
      
        
          $JsonData = array(
                'id_mr_records' => $id_mr_records,
                'usuario' => $usuario,
                'mr_note' => $mr_note
            );

           return $insertModelNote ->insert($JsonData);
    
        }
*/

    public function insert_note(){
        $insertModel = new MD_INSERT_NOTE();
        $insertModelNote = new MD_NOTES();

        $idmr_disposition = $this->request->getPost('dispositionadd'); //disposicion
        $idmr_vehiculo = $this->request->getPost('idvehicleadd');      //id vehiculo
        $idmr_cliente = $this->request->getPost('idclienteadd');       //id cliente
        $idmr_gps = $this->request->getPost('idgpsadd');               //id gps
        $idmr_employee = $this->request->getPost('idempleado');     //id empleado
        $codigotec = $this->request->getPost('codetecnicosadd');       //codigo tecnicos
        $mr_status = $this->request->getPost('statusNoteadd');         //estado de notas


        $mr_notes = $this -> request->getPost('notecodeadd');          //notas
        $iduser = $this -> request->getPost('idusuario');

        $dataRegister = array(
            'id_mr_disposition' => $idmr_disposition,
            'id_vehiculo' => $idmr_vehiculo,
            'id_cliente' => $idmr_cliente,
            'id_gps' => $idmr_gps,
            'id_empleado' => $idmr_employee,
            'TecCode' => $codigotec,
            'status' => $mr_status
          );

          $insertModel->insert($dataRegister);
          $id_mr_records  = $insertModel ->insertID(); //obtener el id insertado

            $dataNote = array(
                'id_mr_records' =>$id_mr_records,
                'usuario' => $iduser ,
                'mr_note' => $mr_notes

            );


        if (($insertModelNote)->insert($dataNote)) {
            return redirect()->to(site_url('/inicio'))->with('success', '¡Registro exitoso! Ahora puedes iniciar sesión.');
        } else {
            // Hubo un error al insertar en la base de datos, redirigir de nuevo al formulario de registro
            return redirect()->to(site_url('/inicio'))->with('error', 'Hubo un error al procesar el registro. Por favor, inténtalo de nuevo.');
        }

    }



}
