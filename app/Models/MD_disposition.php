<?php

namespace App\Models;

use CodeIgniter\Model;  
 
class MD_INSERT_NOTE extends Model
{ 
    protected $DBGroup = 'exactrack';
    protected $table = 'tb_mr_disposition'; 
    protected $primaryKey = 'id_mr_disposition'; 
    protected $useAtoIncrement = true;
    protected $useSoftDeletes = true;
    protected $returnType = 'array';
    
    protected $allowedFields = [
        'id_mr_categoryDisposition',
        'mr_dispositionName',

  
      
    ]; 

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'Date_add';
    protected $updatedField  = 'Date_edit';
    protected $deletedField  = 'Date_delete';

}