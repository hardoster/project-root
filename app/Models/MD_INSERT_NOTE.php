<?php

namespace App\Models;

use CodeIgniter\Model;  
 
class MD_INSERT_NOTE extends Model
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

    










  

 

} 