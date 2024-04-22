<?php

namespace App\Models;

use CodeIgniter\Model; 
  
class MD_tablappal extends Model
{
    protected $tableVH = 'tbvehiculos';
    
    protected $allowedFieldsVH = ['placa', 'estado', 'notas', 'tipo_cliente', 'nombre_contacto', 'tel_fijo', 
    'tel_celular', 'otrocontacto', 'telfijo2', 'telcel2','contacto3', 'telcel3', 'telfijo3'];
 
    protected $tableGPS = 'tbgps';
    protected $allowedFieldsGPS = ['identificador', 'fecha_gps_malo'];
 
    protected $tableCUSTOMER = 'tbclientes';
    protected $allowedFieldsCUSTOMER = ['nombre_cuenta'];
 
    public $valsearch;

    public function obtenerRegistrostb1()
    { 
      /*
      $sql = "SELECT tbgps.identificador, tbclientes.nombre_cuenta, tbvehiculos.placa,  tbgps.fecha_gps_malo, 
            tbvehiculos.estado, tipo_cliente, 
            CONCAT(
                IFNULL(nombre_contacto, ''),  ' ', IFNULL(tel_fijo, ''), ' ',  IFNULL(tel_celular, ''), 
                ' ', 
                IFNULL(otrocontacto, ''), ' ',  IFNULL(telfijo2, ''), ' ',  IFNULL(telcel2, ''), 
                ' ', 
                IFNULL(contacto3, ''), ' ',  IFNULL(telcel3, ''),  ' ',  IFNULL(telfijo3, ''))
                 AS datos_contacto, tbclientes.notas, tbvehiculos.marca, tbvehiculos.modelo, 
                 tbvehiculos.ano, tbvehiculos.color, tbgps.id_marca, tbgps.serie, tbgps.num_telefono
                 , tbgps.sim
        FROM $this->tableVH 
        INNER JOIN $this->tableCUSTOMER ON $this->tableVH.id_cliente = $this->tableCUSTOMER.id_cliente 
        INNER JOIN $this->tableGPS ON $this->tableVH.id_gps = $this->tableGPS.id_gps";*/

        $sql = "SELECT tbgps.identificador, tbclientes.nombre_cuenta, tbvehiculos.placa,  tbgps.fecha_gps_malo, 
            tbvehiculos.estado, tipo_cliente, 
            CONCAT(
                IFNULL(nombre_contacto, ''),  ' ', IFNULL(tel_fijo, ''), ' ',  IFNULL(tel_celular, ''), 
                ' ', 
                IFNULL(otrocontacto, ''), ' ',  IFNULL(telfijo2, ''), ' ',  IFNULL(telcel2, ''), 
                ' ', 
                IFNULL(contacto3, ''), ' ',  IFNULL(telcel3, ''),  ' ',  IFNULL(telfijo3, ''))
                 AS datos_contacto, tbclientes.notas, tbvehiculos.marca, tbvehiculos.modelo, 
                 tbvehiculos.ano, tbvehiculos.color, tbgps.id_marca, tbgps.serie, tbgps.num_telefono
                 , tbgps.sim
        FROM tbvehiculos 
        INNER JOIN tbclientes ON tbvehiculos.id_cliente = tbclientes.id_cliente 
        INNER JOIN tbgps ON tbvehiculos.id_gps = tbgps.id_gps";
        

     return $this->db->query($sql)->getResultArray();
    } 

    /*
  public function SelectInfoCar(){
    $placa = $_POST['placa']; 
    $sql2 = "SELECT marca , modelo, ano, color
    FROM tbvehiculos
    WHERE tbvehiculos.placa = ?";

    return $this->db->query($sql2, [$placa])->getResultArray();
}*/





} 
 