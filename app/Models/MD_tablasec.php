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

    protected $TB_ods = 'ods_records';
    protected $allowedFieldsODS = ['MR_Code_ods', 'MR_Sheet_ods'];

    protected $TB_records = 'records';
    protected $allowedFieldsRECORDS = ['MR_notes' , 'MR_status'];

    public $valsearch;

    public function obtenerRegistrostb2()
    { 
    
        $sql2 = "SELECT 
         tbvehiculos.placa AS placa,
        tbclientes.nombre_cuenta AS cliente_nombre_cuenta,
        tbgps.identificador AS gps_identificador,
        disposition.MR_dispositionName AS disposition_nombre,
        categorydisposition.MR_CategoryDisposition_name AS NAMECATDISPOSISION,
        records.MR_notes AS notes,
        ods_records.MR_Code_ods AS ods_code,
        ods_records.MR_Sheet_ods AS ods_sheet,
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
        monitoreorecords.ods_records ON records.id_MR_ods_records = ods_records.id_MR_ods_records
    JOIN 
        monitoreorecords.disposition ON records.id_MR_Disposition = disposition.id_MR_Disposition
        JOIN 
        monitoreorecords.categorydisposition ON disposition.id_MR_categoryDisposition = categorydisposition.id_MR_categoryDisposition;
        ";

        return $this->db->query($sql2)->getResultArray();
    } 
} 