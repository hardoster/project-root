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

    public function obtenerRegistrostb2($valVehicleSelect)
    { 
        $db = \Config\Database::connect();
        $builder= $db->table('tb_mr_records')

        ->select('tbvehiculos.placa AS placa,
        tbclientes.nombre_cuenta AS cliente_nombre_cuenta,
        tbgps.identificador AS gps_identificador,
        tb_mr_disposition.mr_dispositionName AS disposition_nombre,
        tb_mr_categorydisposition.mr_CategoryDisposition_name AS NAMECATDISPOSITION,
        tb_mr_records.TecCode AS ods_code,
        tbempleados.Nombre AS employee_name,
        tb_mr_records.date_add AS dateadd,
        tb_mr_records.status AS status,
        tb_mr_records.id_mr_records AS id_mr_records')
        ->join('tbclientes', 'tb_mr_records.id_cliente = tbclientes.id_cliente')
        ->join('tbvehiculos', 'tb_mr_records.id_vehiculo = tbvehiculos.id_vehiculo')
        ->join('tbgps', 'tb_mr_records.id_gps = tbgps.id_gps')
        ->join('tbempleados', 'tb_mr_records.id_empleado = tbempleados.id_empleado')
        ->join('tb_mr_disposition', 'tb_mr_records.id_mr_disposition = tb_mr_disposition.id_mr_disposition')
        ->join('tb_mr_categorydisposition', 'tb_mr_disposition.id_mr_categoryDisposition = tb_mr_categorydisposition.id_mr_categoryDisposition')
        ->where('tbvehiculos.id_vehiculo ', $valVehicleSelect);
    return $builder->get()->getResultArray();
    
    } 
} 