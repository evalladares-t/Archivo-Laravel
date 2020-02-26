<?php

namespace App\Http\Controllers\Mantenientos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Permission;
use App\Serie;
use App\SubSerie;

class ManSerDocumentalController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function indexSerD()
    {
        $permis = Permission::where("profile_id",auth()->user()->profile_id)->get();
        $series=Serie::all();
        $subseries=SubSerie::all();
        return view('mantenimientos/g_serieDocumental')->with(compact('permis','series','subseries'));
    }
}

