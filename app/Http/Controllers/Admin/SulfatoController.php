<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SulfatoController extends Controller
{
    Public function index()
    {
        $provincia = array('CHANCHAMAYO', 'CHUPACA', 'CONCEPCION', 'HUANCAYO', 'JAUJA','JUNIN','SATIPO','TARMA','YAULI');
        $redes = array('','CHANCHAMAYO', 'JAUJA', 'JUNIN', 'NO PERTENECE', 'PICHANAKI','CHUPACA','SM PANGOA','SATIPO','TARMA','V MANTARO');
        $data_p  = array(195, 69, 54, 594, 72, 30, 303, 93,22);
        $data_red = array(9.14,60,80,84,18,69,97,81,77,96,51);
        return view('admin.sulfato.index',['Provincia' => $provincia, 'Data_p' => $data_p,'Redes' => $redes,'Data_red' => $data_red]);
                
        //return view('admin.sulfato.index');   
    }
}
