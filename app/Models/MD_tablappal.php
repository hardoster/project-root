<?php

namespace App\Models;

use CodeIgniter\Model; 
  
class MD_tablappal extends Model
{
  
  protected $DBGroup;
  protected $table;
  protected $primaryKey ;
  protected $allowedFields;
  
  public function vehiculos(){
      $this-> DBGroup ='exactrack';
      $this -> table = 'tbvehiculos';
      $this -> primaryKey = 'id_vehiculo';
      $this -> allowedFields = ['placa'];    
      return $this;
  }
 
  
  public function gps(){
      $this-> DBGroup ='exactrack';
      $this -> table = 'tbgps';
      $this -> primaryKey =  'id_gps';
      $this -> allowedFields = ['identificador'];
      return $this;
  }
  
  public function clientes(){
      $this-> DBGroup ='exactrack';
      $this -> table = 'tbclientes';
      $this -> primaryKey =  'id_cliente';
      $this -> allowedFields = ['nombre_cuenta'];
      return $this;
  }


    public function obtenerRegistrostb1()
    { 
      $db = \Config\Database::connect();
      $Builder = $db->table('tbvehiculos')
          ->select('tbgps.identificador, tbclientes.nombre_cuenta, tbvehiculos.placa, tbgps.fecha_gps_malo, 
                  tbvehiculos.estado, tipo_cliente, 
                  CONCAT(
                      IFNULL(tbclientes.nombre_contacto, \'\'), \' \', IFNULL(tbclientes.tel_fijo, \'\'), \' \',  
                      IFNULL(tbclientes.tel_celular, \'\'), \' \', 
                      IFNULL(tbclientes.otrocontacto, \'\'), \' \',  IFNULL(tbclientes.telfijo2, \'\'), \' \',  
                      IFNULL(tbclientes.telcel2, \'\'), \' \', 
                      IFNULL(tbclientes.contacto3, \'\'), \' \',  IFNULL(tbclientes.telcel3, \'\'), \' \',  
                      IFNULL(tbclientes.telfijo3, \'\')
                  ) AS datos_contacto, 
                  tbclientes.notas, tbvehiculos.marca, tbvehiculos.modelo, tbvehiculos.ano, 
                  tbvehiculos.color, tbgps.id_marca, tbgps.serie, tbgps.num_telefono, 
                  tbgps.sim, tbvehiculos.id_vehiculo, tbvehiculos.id_cliente, tbvehiculos.id_gps')
          ->join('tbclientes', 'tbvehiculos.id_cliente = tbclientes.id_cliente')
          ->join('tbgps', 'tbvehiculos.id_gps = tbgps.id_gps');
     return $Builder->get()->getResultArray();
    } 
} 
 