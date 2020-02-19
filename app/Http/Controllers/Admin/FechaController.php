<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class FechaController extends Controller
{
    public function index() 
    {
    $fecha =  DB::table('fecha')
                ->select('Fecha_actual')
                ->groupBy('Fecha_actual')
                ->get();
    
    return view('admin.home.index',compact('fecha'));
    }
}
