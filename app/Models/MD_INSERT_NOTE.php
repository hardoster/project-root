<?php

namespace App\Models;

use CodeIgniter\Model;  
 
class MD_INSERT_NOTE extends Model
{ 
    protected $DBGroup = 'monitoreorecords';
    protected $table = 'records'; 
    protected $primaryKey = 'id_MR_records'; 
    protected $useAtoIncrement = true;
    protected $useSoftDeletes = true;
    protected $returnType = 'array';
    
    protected $allowedFields = [
        'id_MR_disposition',
        'id_vehiculo',
        'id_cliente',
        'id_gps',
        'id_MR_employee',
        'codigoTec',
        'MR_notes',
        'MR_status'
    ]; 

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'MR_date_add';
    protected $updatedField  = 'MR_date_edit';
    protected $deletedField  = 'MR_date_delete';

    










  

 

} 