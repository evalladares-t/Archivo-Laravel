<?php

namespace App\Http\Controllers\Mantenientos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Section;
use App\SubSection;
use App\Permission;


class ManSDocumentalesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function indexSD()
    {
        $permis = Permission::where("profile_id",auth()->user()->profile_id)->get();
        $sections=Section::all();
        $subsections=SubSection::all();
        return view('mantenimientos/g_seccionDocumental')->with(compact('permis','sections','subsections'));
    }

    //registrar en la bd new
    public function storeSDS(Request $request){     

        $Section= new Section();
        $Section->code=$request->input('code_secction');
        $Section->name=$request->input('name_secction');
        $Section->acronym=$request->input('acronym_section');
        $Section->state=$request->boolean('state_section');
        $Section->observation=$request->input('observation_secction');
        $Section->save();//insert

        return redirect('mantenimientosSD');                
    }

    //en la bd eliminar
    public function destroySection(Request $request,$id){

        $Section= Section::find($id);
        $SubSection = SubSection::where("section_id",$id)->get();            
        if($request->ajax()){
            if(count($SubSection)>=1){
                foreach($SubSection as $pe){
                    $pe->delete();
                }                
            }   
            $Section->delete();
        }
        
    } 

    //Cargar datos en un ajax para arrojar el modal edit 
    public function editSection(Request $request, $id){        
        if($request->ajax()){
            $Section= Section::find($id);   
            return response()->json([
                'id'=>$Section->id,
                'code'=>$Section->code,
                'name'=>$Section->name,
                'acronym'=>$Section->acronym,
                'state'=>$Section->state,
                'observation'=>$Section->observation,
            ]);
        }
    }

    //Cargar datos en un ajax para arrojar el modal edit 
    public function updateSection(Request $request, $id){        
        if($request->ajax()){
            $Section= Section::find($id);  
            $Section->code=$request->input('code_secctionE');
            $Section->name=$request->input('name_secctionE');
            $Section->acronym=$request->input('acronym_sectionE');
            $Section->state=$request->boolean('state_sectionE');
            $Section->observation=$request->input('observation_secctionE');
            $Section->save();
        }
    }

    //registrar en la bd new
    public function storeSubsection(Request $request){     

        $SubSection= new SubSection();
        $SubSection->code=$request->input('code_subsecction');
        $SubSection->name=$request->input('name_subsecction');
        $SubSection->acronym=$request->input('acronym_subsection');
        $SubSection->state=$request->boolean('state_subsection');
        $SubSection->section_id=$request->input('sectionid_subsection');
        $SubSection->observation=$request->input('observation_subsecction');
        $SubSection->save();//insert

        return redirect('mantenimientosSD');                
    }
    
    //en la bd eliminar
    public function destroySubsection(Request $request,$id){

        $SubSection= SubSection::find($id);        
        if($request->ajax()){
            $SubSection->delete();
        }
        
    } 

    //Cargar datos en un ajax para arrojar el modal edit 
    public function editSubsection(Request $request, $id){        
        if($request->ajax()){
            $SubSection= SubSection::find($id);   
            return response()->json([
                'id'=>$SubSection->id,
                'code'=>$SubSection->code,
                'section_id'=>$SubSection->section_id,
                'name'=>$SubSection->name,
                'acronym'=>$SubSection->acronym,
                'state'=>$SubSection->state,
                'observation'=>$SubSection->observation,
            ]);
        }
    }

    //Cargar datos en un ajax para arrojar el modal edit 
    public function updateSubsection(Request $request, $id){        
        if($request->ajax()){
            $SubSection= SubSection::find($id);  
            $SubSection->code=$request->input('code_subsecctionE');
            $SubSection->name=$request->input('name_subsecctionE');
            $SubSection->section_id=$request->input('sectionid_subsection');
            $SubSection->acronym=$request->input('acronym_subsectionE');
            $SubSection->state=$request->boolean('state_subsectionE');
            $SubSection->observation=$request->input('observation_subsecctionE');
            $SubSection->save();
        }
    }
}
