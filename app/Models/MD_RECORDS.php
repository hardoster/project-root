<?php

namespace App\Models;

use CodeIgniter\Model;  
 
class MD_RECORDS extends Model
{ 
    protected $DBGroup = 'default';
    protected $table = 'tb_mr_records'; 
    protected $primaryKey = 'id_mr_records'; 
    protected $useAtoIncrement = true;
    protected $useSoftDeletes = true;
    protected $returnType = 'array';
    
    protected $allowedFields = [
        'id_mr_disposition',
        'id_vehiculo',
        'id_cliente', 
        'id_gps',
        'id_empleado',
      'TecCode',
        'status',
      
    ]; 

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'date_add';
    protected $updatedField  = 'date_edit';
    protected $deletedField  = 'date_delete';

    
    
    public function GetFilterTec($temp_id_vehiculo)
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
        ->join('tbempleados', 'tb_mr_records.id_empleado = tbempleados.id_empleado',"LEFT")
        ->join('tb_mr_disposition', 'tb_mr_records.id_mr_disposition = tb_mr_disposition.id_mr_disposition')
        ->join('tb_mr_categorydisposition', 'tb_mr_disposition.id_mr_categoryDisposition = tb_mr_categorydisposition.id_mr_categoryDisposition')
        ->where('tbvehiculos.id_vehiculo', $temp_id_vehiculo)
        ->where('tb_mr_categorydisposition.mr_CategoryDisposition_name', "Tecnicos");

    return $builder->get()->getResultArray();
    } 

    public function GetFilterOP($temp_id_vehiculo){
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
        ->join('tbempleados', 'tb_mr_records.id_empleado = tbempleados.id_empleado' , "LEFT")
        ->join('tb_mr_disposition', 'tb_mr_records.id_mr_disposition = tb_mr_disposition.id_mr_disposition')
        ->join('tb_mr_categorydisposition', 'tb_mr_disposition.id_mr_categoryDisposition = tb_mr_categorydisposition.id_mr_categoryDisposition')
        ->where('tbvehiculos.id_vehiculo', $temp_id_vehiculo)
        ->where('tb_mr_categorydisposition.mr_CategoryDisposition_name', "Operador");

    return $builder->get()->getResultArray();
    }

    public function GetFilterReac($temp_id_vehiculo){
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
        ->join('tbempleados', 'tb_mr_records.id_empleado = tbempleados.id_empleado' , "LEFT")
        ->join('tb_mr_disposition', 'tb_mr_records.id_mr_disposition = tb_mr_disposition.id_mr_disposition')
        ->join('tb_mr_categorydisposition', 'tb_mr_disposition.id_mr_categoryDisposition = tb_mr_categorydisposition.id_mr_categoryDisposition')
        ->where('tbvehiculos.id_vehiculo', $temp_id_vehiculo)
        ->where('tb_mr_categorydisposition.mr_CategoryDisposition_name', "Reaccion");

    return $builder->get()->getResultArray();

    }





























  

 

} 