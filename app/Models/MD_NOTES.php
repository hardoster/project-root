<?php

namespace App\Models;

use CodeIgniter\Model;  
 
class MD_INSERT_NOTE extends Model
{ 
    protected $DBGroup = 'exactrack';
    protected $table = 'tb_mr_notes'; 
    protected $primaryKey = 'id_mr_note'; 
    protected $useAtoIncrement = true;
    protected $useSoftDeletes = true;
    protected $returnType = 'array';
    
    protected $allowedFields = [
        'id_mr_records',
        'id_usuario',
        'mr_note',
  
      
    ]; 

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'date_add';
    protected $updatedField  = 'date_edit';
    protected $deletedField  = 'date_delete';

} 

