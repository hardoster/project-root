<?php

namespace App\Models;

use CodeIgniter\Model;  
 
class MD_NOTES extends Model
{ 
    protected $DBGroup = 'default';
    protected $table = 'tb_mr_notes'; 
    protected $primaryKey = 'id_mr_note'; 
    protected $useAtoIncrement = true;
    protected $useSoftDeletes = true;
    protected $returnType = 'array';
    
    protected $allowedFields = [
        'id_mr_records',
        'usuario',
        'mr_note'
       
  
      
    ]; 

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'date_add';
    protected $updatedField  = 'date_edit';
    protected $deletedField  = 'date_delete';


//reportes por cliente  
    public function getCustomerReport($cuenta,$Placa, $dateStart, $dateEnd, $tipoReporte)
    { 
        $db = \Config\Database::connect();
        $builder = $this->db->table($this->table);
        $builder->select('
        tb_mr_notes.id_mr_records,
        tb_mr_notes.mr_note, 
        tb_mr_notes.usuario, 
        tb_mr_notes.date_add AS notes_date_add, 
        tb_mr_records.TecCode, 
        tb_mr_records.status, 
        tb_mr_records.date_add AS records_date_add, 
        tbvehiculos.placa, 
        tbclientes.nombre_cuenta, 
        tb_mr_disposition.mr_dispositionName, 
        tb_mr_categorydisposition.mr_CategoryDisposition_name,
        tbempleados.Nombre
        ');
        $builder->join('tb_mr_records', 'tb_mr_notes.id_mr_records = tb_mr_records.id_mr_records');
        $builder->join('tbvehiculos', 'tb_mr_records.id_vehiculo = tbvehiculos.id_vehiculo');
        $builder->join('tbclientes', 'tb_mr_records.id_cliente = tbclientes.id_cliente');
        $builder->join('tbempleados', 'tb_mr_records.id_empleado = tbempleados.id_empleado');
        $builder->join('tb_mr_disposition', 'tb_mr_records.id_mr_disposition = tb_mr_disposition.id_mr_disposition');
        $builder->join('tb_mr_categorydisposition', 'tb_mr_disposition.id_mr_categorydisposition = tb_mr_categorydisposition.id_mr_categorydisposition');
        $builder->groupStart()
        ->where('tbclientes.nombre_cuenta', $cuenta)
        ->orWhere('tbvehiculos.Placa', $Placa)
        ->groupEnd();
        $builder->where('tb_mr_records.date_add >=', $dateStart);
        $builder->where('tb_mr_records.date_add <=', $dateEnd);
        
        if (in_array($tipoReporte, [1, 2, 3])) {
            $builder->where('tb_mr_categorydisposition.id_mr_categoryDisposition', $tipoReporte);
        }

        $builder->orderBy('tb_mr_notes.id_mr_records');
    
        return $builder->get()->getResult();
    } 


} 




