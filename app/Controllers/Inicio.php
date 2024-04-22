<?php
 
namespace App\Controllers;
    
use App\Models\MD_tablappal;
use App\Models\MD_tablasec;

class Inicio extends BaseController
{ 
   
    private $tb1models;
    private $tb2models;
    public function __construct()
    {
        $this->tb1models = new MD_tablappal();
        $this->tb2models = new MD_tablasec();
    }

    public function cargartablappal()
    {
        $md_tablappal = new MD_tablappal();
        $md_tablasec = new MD_tablasec();

        $datos = $md_tablappal->obtenerRegistrostb1();
        $datos2 = $md_tablasec->obtenerRegistrostb2();
      //  return $this->response->setJSON($datos);  
       
       return view('vistag', ['datos' => $datos, 'datos2' => $datos2]);
        // return view('vistag', ['datos' => $datos]);

    }

/*    public function DataLoadCar()
    {
        $md_tablappal = new MD_tablappal();
        $datos2 = $md_tablappal->SelectInfoCar();
        return view('vistag', ['datos2' => $datos2]);
    }*/
}
