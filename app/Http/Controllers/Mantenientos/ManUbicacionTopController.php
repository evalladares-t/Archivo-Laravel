<?php

namespace App\Http\Controllers\Mantenientos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Permission;
use App\Shelf;
use App\ConservationType;

class ManUbicacionTopController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function indexM()
    {
        $permis = Permission::where("profile_id",auth()->user()->profile_id)->get();
        $Shelves=Shelf::all();
        $c_type=ConservationType::all();
        return view('mantenimientos/g_ubicacionTop')->with(compact('permis','Shelves','c_type'));
    }

    //registrar en la bd new
    public function storeME(Request $request){     

        $Shelf= new Shelf();
        $Shelf->number=$request->input('name_number');
        $Shelf->inventory=$request->input('inventary');
        $Shelf->reference=$request->input('reference');
        $Shelf->state=$request->boolean('state_shelf');
        $Shelf->observation=$request->input('observation');
        $Shelf->save();//insert

        return redirect('mantenimientos');                
    }

    //en la bd eliminar
    public function destroyShelf(Request $request,$id){

        $Shelf= Shelf::find($id);            
        if($request->ajax()){
            $Shelf->delete();
        }
    }    

    //Cargar datos en un ajax para arrojar el modal edit 
        public function editShelf(Request $request, $id){        
            if($request->ajax()){
                $Shelf= Shelf::find($id);  
                return response()->json([
                    'id'=>$Shelf->id,
                    'number'=>$Shelf->number,
                    'inventory'=>$Shelf->inventory,
                    'reference'=>$Shelf->reference,
                    'state'=>$Shelf->state,
                    'observation'=>$Shelf->observation,                
                ]);
            }
        }

    //Cargar datos en un ajax para arrojar el modal edit 
    public function updateShelf(Request $request, $id){        
        if($request->ajax()){
            $Shelf= Shelf::find($id);  
            $Shelf->number=$request->input('name_numberE');
            $Shelf->inventory=$request->input('inventaryE');
            $Shelf->reference=$request->input('referenceE');
            $Shelf->state=$request->boolean('state_shelfE');
            $Shelf->observation=$request->input('observationE');
            $Shelf->save();
        }
    }

    public function storeCT(Request $request){     

        $ctype= new ConservationType();
        $ctype->name=$request->input('name_numberCT');
        $ctype->state=$request->boolean('state_ctype');
        $ctype->observation=$request->input('observationCT');
        $ctype->save();//insert

        return redirect('mantenimientos');                
    }


    //en la bd eliminar
    public function destroyCT(Request $request,$id){

        $Ctype= ConservationType::find($id);            
        if($request->ajax()){
            $Ctype->delete();
        }
    }   
    
    //Cargar datos en un ajax para arrojar el modal edit 
    public function editCT(Request $request, $id){        
        if($request->ajax()){
            $Ctype= ConservationType::find($id);   
            return response()->json([
                'id'=>$Ctype->id,
                'name'=>$Ctype->name,
                'state'=>$Ctype->state,
                'observation'=>$Ctype->observation,
            ]);
        }
    }

    //Cargar datos en un ajax para arrojar el modal edit 
    public function updateCT(Request $request, $id){        
        if($request->ajax()){
            $Ctype= ConservationType::find($id);
            $Ctype->name=$request->input('nameCTE');            
            $Ctype->state=$request->boolean('state_ctypeE');
            $Ctype->observation=$request->input('observationCTE');
            $Ctype->save();
        }
    }
}
