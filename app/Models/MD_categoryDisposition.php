<?php

namespace App\Models;

use CodeIgniter\Model;  
 
class MD_categoryDisposition extends Model
{ 
    protected $DBGroup = 'default';
    protected $table = 'tb_mr_categorydisposition'; 
    protected $primaryKey = 'id_mr_categoryDisposition'; 
    protected $useAtoIncrement = true;
    protected $useSoftDeletes = true;
    protected $returnType = 'array';
    


    protected $allowedFields = [
        'mr_CategoryDisposition_name'
    ]; 

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'Date_add';
    protected $updatedField  = 'Date_edit';
    protected $deletedField  = 'Date_delete';


}


