<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SulfatoController extends Controller
{
    Public function index()
    {
        return view('admin.sulfato.index');   
    }
}
