<?php
 
namespace App\Controllers;


use App\Models\MD_NOTES;
use App\Models\MD_RECORDS;

class InsertNote extends BaseController
{   
    public function insert_note(){
        $insertModel = new MD_RECORDS();
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

            $insertModelNote->insert($dataNote);
        if (($insertModelNote)->insert($dataNote)) {
            return redirect()->to(site_url('/inicio'))->with('success', '¡Registro exitoso! Ahora puedes iniciar sesión.');
        } else {
            return redirect()->to(site_url('/inicio'))->with('error', 'Hubo un error al procesar el registro. Por favor, inténtalo de nuevo.');
        }

    }



}
