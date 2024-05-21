<?php

namespace App\Models;

use CodeIgniter\Model;  
 
class MD_empleados extends Model
{ 
    protected $DBGroup = 'default';
    protected $table = 'tbempleados'; 
    protected $primaryKey = 'id_empleado'; 
    protected $useAtoIncrement = true;
    protected $useSoftDeletes = true;
    protected $returnType = 'array';
    
    protected $allowedFields = [
        'No_empleado',
        'Nombre',
        'Cargo'
    ]; 

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'Date_add';
    protected $updatedField  = 'Date_edit';
    protected $deletedField  = 'Date_delete';


}