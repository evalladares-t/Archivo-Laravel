<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $permis = Permission::where("profile_id",auth()->user()->profile_id)->get();
        return view('home')->with(compact('permis'));
    }
}
