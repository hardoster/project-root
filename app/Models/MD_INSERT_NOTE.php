<?php

namespace App\Models;

use CodeIgniter\Model;  
 
class MD_INSERT_NOTE extends Model
{ 

    protected $table = 'records'; 
    protected $primaryKey = 'id_MR_records'; 
    protected $useAtoIncrement = true;
    protected $returnType = 'array';
    
    protected $allowedFields = [
        'id_MR_disposition',
        'id_vehiculo',
        'id_cliente',
        'id_gps',
        'id_MR_employee',
        'codigoTec',
        'MR_notes',
        'MR_date_add',
        'MR_date_delete',
        'MR_date_edit',
        'MR_status'
    ]; 

    










  

 

} 