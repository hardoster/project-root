<?php

namespace App\Models;

use CodeIgniter\Model;  
 
class MD_tablasec extends Model
{ //PARA BASE DE DATOS EXACTRACK

    protected $DBGroup;
    protected $table;
    protected $primaryKey ;
    protected $allowedFields;
    
    public function vehiculos(){
        $this-> DBGroup ='exactrack';
        $this -> table = 'tbvehiculos';
        $this -> primaryKey = 'id_vehiculo';
        $this -> allowedFields = ['placa'];    
        return $this;
    }
   
    
    public function gps(){
        $this-> DBGroup ='exactrack';
        $this -> table = 'tbgps';
        $this -> primaryKey =  'id_gps';
        $this -> allowedFields = ['identificador'];
        return $this;
    }
    
    public function clientes(){
        $this-> DBGroup ='exactrack';
        $this -> table = 'tbclientes';
        $this -> primaryKey =  'id_cliente';
        $this -> allowedFields = ['nombre_cuenta'];
        return $this;
    }
    
    //PARA BASE DE DATOS MONITOREORECORDS
    public function CatDisposition(){
    $this-> DBGroup = 'monitoreorecords';
        $this->table = 'categorydisposition';
        $this -> primaryKey =  'id_MR_categoryDisposition';
    $this->allowedFields = ['MR_CategoryDisposition_name'];
    return $this;
    }
    public function disposition(){
        $this-> DBGroup = 'monitoreorecords';
        $this->table   = 'disposition';
        $this -> primaryKey =  'id_MR_Disposition';
         $this->allowedFields = ['MR_dispositionName']; 
         return $this;
    }
    public function empleados(){
        $this-> DBGroup = 'monitoreorecords';
        $this-> table     = 'mr_employees';
        $this -> primaryKey =  'id_MR_employees';
        $this-> allowedFields = ['MR_employee_name', 'MR_employee_lastName'];
        return $this;
    }
    public function records(){
        $this-> DBGroup = 'monitoreorecords';
     $this->table = 'records';
     $this -> primaryKey =  'id_MR_records';
      $this->allowedFields= ['MR_notes' ,'codigoTec', 'MR_status'];
      return $this;
    }
    
    
  

    public function GetValidationsNotes(){
        $query = $this->db->table('monitoreorecords.categorydisposition')
        ->select('monitoreorecords.categorydisposition.id_MR_categoryDisposition,
        monitoreorecords.categorydisposition.MR_CategoryDisposition_name');


        return $query->get()->getResultArray();
    }
    public function GetValidationsNotesCategory1(){
        $query = $this->db->table('monitoreorecords.disposition')
        ->select('monitoreorecords.categorydisposition.id_MR_categoryDisposition, monitoreorecords.categorydisposition.MR_CategoryDisposition_name,
        monitoreorecords.disposition.id_MR_Disposition, 
        monitoreorecords.disposition.MR_dispositionName')
        ->join('monitoreorecords.categorydisposition ',' monitoreorecords.disposition.id_MR_categoryDisposition = monitoreorecords.categorydisposition.id_MR_categoryDisposition')
        ->where('monitoreorecords.disposition.id_MR_categoryDisposition = 1');
    
  
       return $query->get()->getResultArray();
    }


    public function GetValidationsNotesCategory2(){
        $query = $this->db->table('monitoreorecords.disposition')
        ->select('monitoreorecords.categorydisposition.id_MR_categoryDisposition, monitoreorecords.categorydisposition.MR_CategoryDisposition_name,
        monitoreorecords.disposition.id_MR_Disposition, 
        monitoreorecords.disposition.MR_dispositionName')
        ->join('monitoreorecords.categorydisposition',' monitoreorecords.disposition.id_MR_categoryDisposition = monitoreorecords.categorydisposition.id_MR_categoryDisposition')
        ->where('monitoreorecords.disposition.id_MR_categoryDisposition = 2');
  
        return $query->get()->getResultArray();
    }


    public function GetValidationsNotesCategory3(){
        $query = $this->db->table('monitoreorecords.disposition')
        ->select('monitoreorecords.categorydisposition.id_MR_categoryDisposition, monitoreorecords.categorydisposition.MR_CategoryDisposition_name,
        monitoreorecords.disposition.id_MR_Disposition, 
        monitoreorecords.disposition.MR_dispositionName')
        ->join('monitoreorecords.categorydisposition' , 'monitoreorecords.disposition.id_MR_categoryDisposition = monitoreorecords.categorydisposition.id_MR_categoryDisposition')
        ->where('monitoreorecords.disposition.id_MR_categoryDisposition = 3');
  
        return $query->get()->getResultArray();
    }



    public function GetValidationsEmployees(){
      //  $sql7= "SELECT monitoreorecords.mr_employees.id_MR_employees AS idempleado ,CONCAT(monitoreorecords.mr_employees.MR_employee_name, ' ',monitoreorecords.mr_employees.MR_employee_lastName) AS Fullname2 FROM `monitoreorecords.mr_employees`";
       
      $query = $this->db->table('monitoreorecords.mr_employees')
      ->select('mr_employees.id_MR_employees,CONCAT(mr_employees.MR_employee_name, " " , mr_employees.MR_employee_lastName) AS Fullname2');
      
  
      return $query->get()->getResultArray();
    }












    public function obtenerRegistrostb2($valVehicleSelect)
    { 
        $db = \Config\Database::connect();
        $builder= $db->table('monitoreorecords.records')

        ->select('tbvehiculos.placa AS placa,
            tbclientes.nombre_cuenta AS cliente_nombre_cuenta,
            tbgps.identificador AS gps_identificador,
            disposition.MR_dispositionName AS disposition_nombre,
            categorydisposition.MR_CategoryDisposition_name AS NAMECATDISPOSISION,
            records.MR_notes AS notes,
            records.codigoTec AS ods_code,
            mr_employees.MR_employee_name AS employee_name,
            mr_employees.MR_employee_lastName AS employee_lastName,
            records.MR_date_add AS dateadd,
            records.MR_status AS status')
        ->join('exactrack.tbclientes', 'records.id_cliente = tbclientes.id_cliente')
        ->join('exactrack.tbvehiculos', 'records.id_vehiculo = tbvehiculos.id_vehiculo')
        ->join('exactrack.tbgps', 'records.id_gps = tbgps.id_gps')
        ->join('monitoreorecords.MR_employees', 'records.id_MR_employee = MR_employees.id_MR_employees')
        ->join('monitoreorecords.disposition', 'records.id_MR_Disposition = disposition.id_MR_Disposition')
        ->join('monitoreorecords.categorydisposition', 'disposition.id_MR_categoryDisposition = categorydisposition.id_MR_categoryDisposition')
        ->where('tbvehiculos.id_vehiculo ', $valVehicleSelect);
    return $builder->get()->getResultArray();
    
    } 
} 