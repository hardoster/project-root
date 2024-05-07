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
        $this-> DBGroup ='default';
        $this -> table = 'tbvehiculos';
        $this -> primaryKey = 'id_vehiculo';
        $this -> allowedFields = ['placa'];    
        return $this;
    }
   
    
    public function gps(){
        $this-> DBGroup ='default';
        $this -> table = 'tbgps';
        $this -> primaryKey =  'id_gps';
        $this -> allowedFields = ['identificador'];
        return $this;
    }
    
    public function clientes(){
        $this-> DBGroup ='default';
        $this -> table = 'tbclientes';
        $this -> primaryKey =  'id_cliente';
        $this -> allowedFields = ['nombre_cuenta'];
        return $this;
    }
    
    public function CatDisposition(){
    $this-> DBGroup = 'default';
        $this->table = 'tb_mr_categorydisposition';
        $this -> primaryKey =  'id_mr_categoryDisposition';
    $this->allowedFields = ['mr_CategoryDisposition_name'];
    return $this;
    }
    public function disposition(){
        $this-> DBGroup = 'default';
        $this->table   = 'tb_mr_disposition';
        $this -> primaryKey =  'id_mr_disposition';
         $this->allowedFields = ['id_mr_categoryDisposition','mr_dispositionName']; 
         return $this;
    }
    public function empleados(){
        $this-> DBGroup = 'default';
        $this-> table     = 'tbempleados';
        $this -> primaryKey =  'id_MR_employees';
        $this-> allowedFields = ['id_empleado', 'No_empleado','Nombre', 'Cargo'];
        return $this;
    }
    public function records(){
        $this-> DBGroup = 'default';
     $this->table = 'tb_mr_records';
     $this -> primaryKey =  'id_mr_records';
      $this->allowedFields= ['id_mr_disposition' ,'id_vehiculo', 'id_cliente','id_gps','id_empleado','TecCode','status'];
      return $this;
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