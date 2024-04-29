<?php

namespace App\Models;

use CodeIgniter\Model;  
 
class MD_tablasec extends Model
{ //PARA BASE DE DATOS EXACTRACK
    protected $tableVH = 'tbvehiculos';
    protected $allowedFieldsVH = ['placa', 'id_vehiculo'];
 
    protected $tableGPS = 'tbgps';
    protected $allowedFieldsGPS = ['identificador', 'id_gps'];
 
    protected $tableCUSTOMER = 'tbclientes';
    protected $allowedFieldsCUSTOMER = ['nombre_cuenta', 'id_cliente'];
 
    //PARA BASE DE DATOS MONITOREORECORDS
    protected $TB_Catdisposition = 'categorydisposition';
    protected $allowedFieldsCTDIS = ['MR_CategoryDisposition_name'];

    protected $TB_Disposition   = 'disposition';
    protected $allowedFieldsDIS = ['MR_dispositionName']; 

    protected $TB_Employees     = 'mr_employees';
    protected $allowedFieldsEMP = ['MR_employee_name', 'MR_employee_lastName'];

    protected $TB_ods = 'codigoTec';
    

    protected $TB_records = 'records';
    protected $allowedFieldsRECORDS = ['MR_notes' , 'MR_status'];

    public $valsearch;

  

    public function GetValidationsNotes(){
        $sql3 ="SELECT monitoreorecords.categorydisposition.id_MR_categoryDisposition,
         monitoreorecords.categorydisposition.MR_CategoryDisposition_name 
        from monitoreorecords.categorydisposition;
        ";

                 return $this->db->query($sql3)->getResultArray();
    }
    public function GetValidationsNotesCategory1(){
        $sql4 = "SELECT monitoreorecords.categorydisposition.id_MR_categoryDisposition, monitoreorecords.categorydisposition.MR_CategoryDisposition_name,
        monitoreorecords.disposition.id_MR_Disposition, 
        monitoreorecords.disposition.MR_dispositionName 
        FROM monitoreorecords.disposition
        INNER JOIN monitoreorecords.categorydisposition ON monitoreorecords.disposition.id_MR_categoryDisposition = monitoreorecords.categorydisposition.id_MR_categoryDisposition
        WHERE monitoreorecords.disposition.id_MR_categoryDisposition = 1";
  
  return $this->db->query($sql4)->getResultArray();
    }


    public function GetValidationsNotesCategory2(){
        $sql5 = "SELECT monitoreorecords.categorydisposition.id_MR_categoryDisposition, monitoreorecords.categorydisposition.MR_CategoryDisposition_name,
        monitoreorecords.disposition.id_MR_Disposition, 
        monitoreorecords.disposition.MR_dispositionName 
        FROM monitoreorecords.disposition
        INNER JOIN monitoreorecords.categorydisposition ON monitoreorecords.disposition.id_MR_categoryDisposition = monitoreorecords.categorydisposition.id_MR_categoryDisposition
        WHERE monitoreorecords.disposition.id_MR_categoryDisposition = 2";
  
  return $this->db->query($sql5)->getResultArray();
    }


    public function GetValidationsNotesCategory3(){
        $sql6 = "SELECT monitoreorecords.categorydisposition.id_MR_categoryDisposition, monitoreorecords.categorydisposition.MR_CategoryDisposition_name,
        monitoreorecords.disposition.id_MR_Disposition, 
        monitoreorecords.disposition.MR_dispositionName 
        FROM monitoreorecords.disposition
        INNER JOIN monitoreorecords.categorydisposition ON monitoreorecords.disposition.id_MR_categoryDisposition = monitoreorecords.categorydisposition.id_MR_categoryDisposition
        WHERE monitoreorecords.disposition.id_MR_categoryDisposition = 3";
  
  return $this->db->query($sql6)->getResultArray();
    }



    public function GetValidationsEmployees(){
      //  $sql7= "SELECT monitoreorecords.mr_employees.id_MR_employees AS idempleado ,CONCAT(monitoreorecords.mr_employees.MR_employee_name, ' ',monitoreorecords.mr_employees.MR_employee_lastName) AS Fullname2 FROM `monitoreorecords.mr_employees`";
        $sql7 = "SELECT mr_employees.id_MR_employees,CONCAT(mr_employees.MR_employee_name, ' ',mr_employees.MR_employee_lastName) AS Fullname2 FROM monitoreorecords.mr_employees";
  return $this->db->query($sql7)->getResultArray();
    }











    public function obtenerRegistrostb2()
    { 
    
        $sql2 = "SELECT 
         tbvehiculos.placa AS placa,
        tbclientes.nombre_cuenta AS cliente_nombre_cuenta,
        tbgps.identificador AS gps_identificador,
        disposition.MR_dispositionName AS disposition_nombre,
        categorydisposition.MR_CategoryDisposition_name AS NAMECATDISPOSISION,
        records.MR_notes AS notes,
        records.codigoTec AS ods_code,
        mr_employees.MR_employee_name AS employee_name,
        mr_employees.MR_employee_lastName AS employee_lastName,
        records.MR_date_add AS dateadd,
        records.MR_status AS status
    FROM 
        monitoreorecords.records
        
    JOIN 
        exactrack.tbclientes ON records.id_cliente = tbclientes.id_cliente
    JOIN 
        exactrack.tbvehiculos ON records.id_vehiculo = tbvehiculos.id_vehiculo
    JOIN 
        exactrack.tbgps ON records.id_gps = tbgps.id_gps
    JOIN 
        monitoreorecords.MR_employees ON records.id_MR_employee = MR_employees.id_MR_employees

    JOIN 
        monitoreorecords.disposition ON records.id_MR_Disposition = disposition.id_MR_Disposition
        JOIN 
        monitoreorecords.categorydisposition ON disposition.id_MR_categoryDisposition = categorydisposition.id_MR_categoryDisposition;
        ";

        return $this->db->query($sql2)->getResultArray();
    } 
} 