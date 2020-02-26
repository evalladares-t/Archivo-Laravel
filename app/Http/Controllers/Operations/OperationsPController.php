<?php

namespace App\Http\Controllers\Operations;
use App\Http\Controllers\Controller;
use App\Permission;
use App\Profile;
use App\User;

use Illuminate\Http\Request;

class OperationsPController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function indexP(){
        //Permisos que tiene el usuario logueado
        $permis = Permission::where("profile_id",auth()->user()->profile_id)->get();
        //Todos los perfiles
        $profiles=Profile::all();
        //Todos los permisos
        $access=Permission::all();
        return view('operations/g_perfil')->with(compact('permis','profiles','access'));
    }

    
    //registrar en la bd new
    public function storeP(Request $request){     
        
        /*Creo el perfil*/
        $profile= new Profile();
        $profile->name=$request->input('name_perfil');
        $profile->save();//insert
        //Menu 1
        if($request->boolean('gPerfilCb') or $request->boolean('gUsuarioCb')){
            $permiss= new Permission();
            $permiss->activar=true;
            $permiss->profile_id=$profile->id;
            $permiss->menu_id=1;
            $permiss->save();

            $permiss= new Permission();
            $permiss->activar=$request->boolean('gPerfilCb');
            $permiss->profile_id=$profile->id;
            $permiss->menu_id=2;
            $permiss->save();

            $permiss= new Permission();
            $permiss->activar=$request->boolean('gUsuarioCb');
            $permiss->profile_id=$profile->id;
            $permiss->menu_id=3;
            $permiss->save();
        }

        if(!($request->boolean('gPerfilCb') or $request->boolean('gUsuarioCb'))){
            $permiss= new Permission();
            $permiss->activar=false;
            $permiss->profile_id=$profile->id;
            $permiss->menu_id=1;
            $permiss->save();
    
            $permiss= new Permission();
            $permiss->activar=false;
            $permiss->profile_id=$profile->id;
            $permiss->menu_id=2;
            $permiss->save();
    
            $permiss= new Permission();
            $permiss->activar=$request->boolean('gUsuarioCb');
            $permiss->profile_id=$profile->id;
            $permiss->menu_id=3;
            $permiss->save();
        }
        //Menu 2
        if($request->boolean('gArchivoCb') or $request->boolean('gAudioCb') or $request->boolean('gTomoCb') or $request->boolean('gPlanoCb')){
            $permiss= new Permission();
            $permiss->activar=true;
            $permiss->profile_id=$profile->id;
            $permiss->menu_id=4;
            $permiss->save();

            $permiss= new Permission();
            $permiss->activar=$request->boolean('gArchivoCb');
            $permiss->profile_id=$profile->id;
            $permiss->menu_id=5;
            $permiss->save();

            $permiss= new Permission();
            $permiss->activar=$request->boolean('gAudioCb');
            $permiss->profile_id=$profile->id;
            $permiss->menu_id=6;
            $permiss->save();

            $permiss= new Permission();
            $permiss->activar=$request->boolean('gTomoCb');
            $permiss->profile_id=$profile->id;
            $permiss->menu_id=7;
            $permiss->save();

            $permiss= new Permission();
            $permiss->activar=$request->boolean('gPlanoCb');
            $permiss->profile_id=$profile->id;
            $permiss->menu_id=8;
            $permiss->save();
        }

        if(!($request->boolean('gArchivoCb') or $request->boolean('gAudioCb') or $request->boolean('gTomoCb') or $request->boolean('gPlanoCb'))){
            $permiss= new Permission();
            $permiss->activar=false;
            $permiss->profile_id=$profile->id;
            $permiss->menu_id=4;
            $permiss->save();

            $permiss= new Permission();
            $permiss->activar=$request->boolean('gArchivoCb');
            $permiss->profile_id=$profile->id;
            $permiss->menu_id=5;
            $permiss->save();

            $permiss= new Permission();
            $permiss->activar=$request->boolean('gAudioCb');
            $permiss->profile_id=$profile->id;
            $permiss->menu_id=6;
            $permiss->save();

            $permiss= new Permission();
            $permiss->activar=$request->boolean('gTomoCb');
            $permiss->profile_id=$profile->id;
            $permiss->menu_id=7;
            $permiss->save();

            $permiss= new Permission();
            $permiss->activar=$request->boolean('gPlanoCb');
            $permiss->profile_id=$profile->id;
            $permiss->menu_id=8;
            $permiss->save();
        }
        //Menu 3
        if($request->boolean('gMiACb') or $request->boolean('gMsACb') or $request->boolean('gGsCb')){
            $permiss= new Permission();
            $permiss->activar=true;
            $permiss->profile_id=$profile->id;
            $permiss->menu_id=9;
            $permiss->save();

            $permiss= new Permission();
            $permiss->activar=$request->boolean('gMiACb');
            $permiss->profile_id=$profile->id;
            $permiss->menu_id=10;
            $permiss->save();

            $permiss= new Permission();
            $permiss->activar=$request->boolean('gMsACb');
            $permiss->profile_id=$profile->id;
            $permiss->menu_id=11;
            $permiss->save();

            $permiss= new Permission();
            $permiss->activar=$request->boolean('gGsCb');
            $permiss->profile_id=$profile->id;
            $permiss->menu_id=12;
            $permiss->save();

        }

        if(!($request->boolean('gMiACb') or $request->boolean('gMsBCb') or $request->boolean('gGsCb'))){
            $permiss= new Permission();
            $permiss->activar=false;
            $permiss->profile_id=$profile->id;
            $permiss->menu_id=9;
            $permiss->save();

            $permiss= new Permission();
            $permiss->activar=$request->boolean('gMiACb');
            $permiss->profile_id=$profile->id;
            $permiss->menu_id=10;
            $permiss->save();

            $permiss= new Permission();
            $permiss->activar=$request->boolean('gMsBCb');
            $permiss->profile_id=$profile->id;
            $permiss->menu_id=11;
            $permiss->save();

            $permiss= new Permission();
            $permiss->activar=$request->boolean('gGsCb');
            $permiss->profile_id=$profile->id;
            $permiss->menu_id=12;
            $permiss->save();
        }
        
        //Menu 4
        if($request->boolean('gMuTCb') or $request->boolean('gMsDCb') or $request->boolean('gMaACb') or $request->boolean('gMdACb') or $request->boolean('gMsAcB')){  
        
            $permiss= new Permission();
            $permiss->activar=true;
            $permiss->profile_id=$profile->id;
            $permiss->menu_id=13;
            $permiss->save();

            $permiss= new Permission();
            $permiss->activar=$request->boolean('gMuTCb');
            $permiss->profile_id=$profile->id;
            $permiss->menu_id=14;
            $permiss->save();

            $permiss= new Permission();
            $permiss->activar=$request->boolean('gMsDCb');
            $permiss->profile_id=$profile->id;
            $permiss->menu_id=15;
            $permiss->save();

            $permiss= new Permission();
            $permiss->activar=$request->boolean('gMsAcB');
            $permiss->profile_id=$profile->id;
            $permiss->menu_id=16;
            $permiss->save();

            $permiss= new Permission();
            $permiss->activar=$request->boolean('gMaACb');
            $permiss->profile_id=$profile->id;
            $permiss->menu_id=17;
            $permiss->save();
            
            $permiss= new Permission();
            $permiss->activar=$request->boolean('gMdACb');
            $permiss->profile_id=$profile->id;
            $permiss->menu_id=17;
            $permiss->save();

        }

        if(!($request->boolean('gMuTCb') or $request->boolean('gMsDCb') or $request->boolean('gMaACb') or $request->boolean('gMdACb') or $request->boolean('gMsAcB'))){
                
            $permiss= new Permission();
            $permiss->activar=false;
            $permiss->profile_id=$profile->id;
            $permiss->menu_id=13;
            $permiss->save();

            $permiss= new Permission();
            $permiss->activar=$request->boolean('gMuTCb');
            $permiss->profile_id=$profile->id;
            $permiss->menu_id=14;
            $permiss->save();

            $permiss= new Permission();
            $permiss->activar=$request->boolean('gMsDCb');
            $permiss->profile_id=$profile->id;
            $permiss->menu_id=15;
            $permiss->save();

            $permiss= new Permission();
            $permiss->activar=$request->boolean('gMsAcB');
            $permiss->profile_id=$profile->id;
            $permiss->menu_id=16;
            $permiss->save();

            $permiss= new Permission();
            $permiss->activar=$request->boolean('gMaACb');
            $permiss->profile_id=$profile->id;
            $permiss->menu_id=17;
            $permiss->save();
            
            $permiss= new Permission();
            $permiss->activar=$request->boolean('gMdACb');
            $permiss->profile_id=$profile->id;
            $permiss->menu_id=17;
            $permiss->save();


        }

        //Menu 5
        if($request->boolean('gRaCb') or $request->boolean('gRsCb') or $request->boolean('gRrACb') or $request->boolean('gRrPCb')){  
        
            $permiss= new Permission();
            $permiss->activar=true;
            $permiss->profile_id=$profile->id;
            $permiss->menu_id=19;
            $permiss->save();

            $permiss= new Permission();
            $permiss->activar=$request->boolean('gRaCb');
            $permiss->profile_id=$profile->id;
            $permiss->menu_id=20;
            $permiss->save();

            $permiss= new Permission();
            $permiss->activar=$request->boolean('gRsCb');
            $permiss->profile_id=$profile->id;
            $permiss->menu_id=21;
            $permiss->save();

            $permiss= new Permission();
            $permiss->activar=$request->boolean('gRrACb');
            $permiss->profile_id=$profile->id;
            $permiss->menu_id=22;
            $permiss->save();

            $permiss= new Permission();
            $permiss->activar=$request->boolean('gRrPCb');
            $permiss->profile_id=$profile->id;
            $permiss->menu_id=23;
            $permiss->save();

        }

        if(!($request->boolean('gRaCb') or $request->boolean('gRsCb') or $request->boolean('gRrACb') or $request->boolean('gRrPCb'))){
        
            $permiss= new Permission();
            $permiss->activar=false;
            $permiss->profile_id=$profile->id;
            $permiss->menu_id=19;
            $permiss->save();

            $permiss= new Permission();
            $permiss->activar=$request->boolean('gRaCb');
            $permiss->profile_id=$profile->id;
            $permiss->menu_id=20;
            $permiss->save();

            $permiss= new Permission();
            $permiss->activar=$request->boolean('gRsCb');
            $permiss->profile_id=$profile->id;
            $permiss->menu_id=21;
            $permiss->save();

            $permiss= new Permission();
            $permiss->activar=$request->boolean('gRrACb');
            $permiss->profile_id=$profile->id;
            $permiss->menu_id=22;
            $permiss->save();

            $permiss= new Permission();
            $permiss->activar=$request->boolean('gRrPCb');
            $permiss->profile_id=$profile->id;
            $permiss->menu_id=23;
            $permiss->save();
        }
            return redirect('operationsp');
            
    }

    //en la bd eliminar
    public function destroyP(Request $request,$id){

        $profile= Profile::find($id);
        $permiss = Permission::where("profile_id",$id)->get();            
        if($request->ajax()){
            if(count($permiss)>=1){
                foreach($permiss as $pe){
                    $pe->delete();
                }                
            }   
            $profile->delete();
        }
        
    }    

    //Cargar datos en un ajax para arrojar la info
    public function infoP(Request $request, $id){        
        if($request->ajax()){
            $perfil=Profile::where("id",$id)->get();
            $permis = Permission::where("profile_id",$id)->where("activar",1)->count();
            return response()->json([
                'name_perfil'=>$perfil->get(0)->name,
                'fecha_creacion'=>$perfil->get(0)->created_at,
                'fecha_modificacion'=>$perfil->get(0)->updated_at,
                'permiss'=>$permis
            ]);
        }
    }

    //Cargar datos en un ajax para arrojar el modal edit 
    public function editP(Request $request, $id){        
        if($request->ajax()){
            $perfil=Profile::where("id",$id)->get();
            $permis = Permission::where("profile_id",$id)->get();
            return response()->json([
                'id'=>$perfil->get(0)->id,
                'name_perfil'=>$perfil->get(0)->name,
                'gPerfilCbAj'=>$permis->get(1)->activar,
                'gUsuarioCbAj'=>$permis->get(2)->activar,
                'gArchivoCbAj'=>$permis->get(4)->activar,
                'gAudioCbAj'=>$permis->get(5)->activar,
                'gTomoCbAj'=>$permis->get(6)->activar,
                'gPlanoCbAj'=>$permis->get(7)->activar,
                'gMiACbAj'=>$permis->get(9)->activar,
                'gMsACbAj'=>$permis->get(10)->activar,
                'gGsCbAj'=>$permis->get(11)->activar,
                'gMuTCbAj'=>$permis->get(13)->activar,
                'gMsDCbAj'=>$permis->get(14)->activar,
                'gMsBcBEAj'=>$permis->get(15)->activar,
                'gMaACbAj'=>$permis->get(16)->activar,
                'gMdACbAj'=>$permis->get(17)->activar,
                'gRaCbAj'=>$permis->get(19)->activar,
                'gRsCbAj'=>$permis->get(20)->activar,
                'gRrACbAj'=>$permis->get(21)->activar,
                'gRrPCbAj'=>$permis->get(22)->activar
            ]);
        }
    }

    public function updateP(Request $request,$id){
        $perfil=Profile::where("id",$id)->get();
        $perfil->get(0)->name=$request->input('name_perfil');
        $perfil->get(0)->save();
        
        //Menu 1
        if($request->boolean('gPerfilCbE') or $request->boolean('gUsuarioCbE')){
            $permis = Permission::where("profile_id",$id)->where("menu_id",1)->get();
            $permis->get(0)->activar=true;
            $permis->get(0)->save();

            $permis = Permission::where("profile_id",$id)->where("menu_id",2)->get();
            $permis->get(0)->activar=$request->boolean('gPerfilCbE');
            $permis->get(0)->save();

            $permis = Permission::where("profile_id",$id)->where("menu_id",3)->get();
            $permis->get(0)->activar=$request->boolean('gUsuarioCbE');
            $permis->get(0)->save();
        }

        if(!($request->boolean('gPerfilCbE') or $request->boolean('gUsuarioCbE'))){
            $permis = Permission::where("profile_id",$id)->where("menu_id",1)->get();
            $permis->get(0)->activar=false;        
            $permis->get(0)->save();

            
            $permis = Permission::where("profile_id",$id)->where("menu_id",2)->get();
            $permis->get(0)->activar=$request->boolean('gPerfilCbE');
            $permis->get(0)->save();

            $permis = Permission::where("profile_id",$id)->where("menu_id",3)->get();
            $permis->get(0)->activar=$request->boolean('gUsuarioCbE');
            $permis->get(0)->save();
        }

        //Menu 2
        if($request->boolean('gArchivoCbE') or $request->boolean('gAudioCbE') or $request->boolean('gTomoCbE') or $request->boolean('gPlanoCbE')){
            $permis = Permission::where("profile_id",$id)->where("menu_id",4)->get();
            $permis->get(0)->activar=true;
            $permis->get(0)->save();

            $permis = Permission::where("profile_id",$id)->where("menu_id",5)->get();
            $permis->get(0)->activar=$request->boolean('gArchivoCbE');
            $permis->get(0)->save();

            $permis = Permission::where("profile_id",$id)->where("menu_id",6)->get();
            $permis->get(0)->activar=$request->boolean('gAudioCbE');
            $permis->get(0)->save();

            $permis = Permission::where("profile_id",$id)->where("menu_id",7)->get();
            $permis->get(0)->activar=$request->boolean('gTomoCbE');
            $permis->get(0)->save();

            $permis = Permission::where("profile_id",$id)->where("menu_id",8)->get();
            $permis->get(0)->activar=$request->boolean('gPlanoCbE');            
            $permis->get(0)->save();
        }

        if(!($request->boolean('gArchivoCbE') or $request->boolean('gAudioCbE') or $request->boolean('gTomoCbE') or $request->boolean('gPlanoCbE'))){
            $permis = Permission::where("profile_id",$id)->where("menu_id",4)->get();
            $permis->get(0)->activar=false;
            $permis->get(0)->save();

            $permis = Permission::where("profile_id",$id)->where("menu_id",5)->get();
            $permis->get(0)->activar=$request->boolean('gArchivoCbE');
            $permis->get(0)->save();

            $permis = Permission::where("profile_id",$id)->where("menu_id",6)->get();
            $permis->get(0)->activar=$request->boolean('gAudioCbE');
            $permis->get(0)->save();

            $permis = Permission::where("profile_id",$id)->where("menu_id",7)->get();
            $permis->get(0)->activar=$request->boolean('gTomoCbE');
            $permis->get(0)->save();

            $permis = Permission::where("profile_id",$id)->where("menu_id",8)->get();
            $permis->get(0)->activar=$request->boolean('gPlanoCbE');            
            $permis->get(0)->save();
        }
        //Menu 3
        if($request->boolean('gMiACbE') or $request->boolean('gMsACbE') or $request->boolean('gGsCbE')){
            
            $permis = Permission::where("profile_id",$id)->where("menu_id",9)->get();
            $permis->get(0)->activar=true;
            $permis->get(0)->save();

            $permis = Permission::where("profile_id",$id)->where("menu_id",10)->get();
            $permis->get(0)->activar=$request->boolean('gMiACbE');            
            $permis->get(0)->save();

            $permis = Permission::where("profile_id",$id)->where("menu_id",11)->get();
            $permis->get(0)->activar=$request->boolean('gMsACbE');            
            $permis->get(0)->save();

            $permis = Permission::where("profile_id",$id)->where("menu_id",12)->get();
            $permis->get(0)->activar=$request->boolean('gGsCbE');            
            $permis->get(0)->save();

        }

        if(!($request->boolean('gMiACbE') or $request->boolean('gMsACbE') or $request->boolean('gGsCbE'))){
            $permis = Permission::where("profile_id",$id)->where("menu_id",9)->get();
            $permis->get(0)->activar=false;
            $permis->get(0)->save();

            $permis = Permission::where("profile_id",$id)->where("menu_id",10)->get();
            $permis->get(0)->activar=$request->boolean('gMiACbE');            
            $permis->get(0)->save();

            $permis = Permission::where("profile_id",$id)->where("menu_id",11)->get();
            $permis->get(0)->activar=$request->boolean('gMsACbE');            
            $permis->get(0)->save();

            $permis = Permission::where("profile_id",$id)->where("menu_id",12)->get();
            $permis->get(0)->activar=$request->boolean('gGsCbE');            
            $permis->get(0)->save();
        }
        
        //Menu 4
        if($request->boolean('gMuTCbE') or $request->boolean('gMsDCbE') or $request->boolean('gMsBcBE') or $request->boolean('gMaACbE') or $request->boolean('gMdACbE')){  
        
            $permis = Permission::where("profile_id",$id)->where("menu_id",13)->get();
            $permis->get(0)->activar=true;
            $permis->get(0)->save();

            $permis = Permission::where("profile_id",$id)->where("menu_id",14)->get();
            $permis->get(0)->activar=$request->boolean('gMuTCbE');            
            $permis->get(0)->save();

            $permis = Permission::where("profile_id",$id)->where("menu_id",15)->get();
            $permis->get(0)->activar=$request->boolean('gMsDCbE');            
            $permis->get(0)->save();

            $permis = Permission::where("profile_id",$id)->where("menu_id",16)->get();
            $permis->get(0)->activar=$request->boolean('gMsBcBE');            
            $permis->get(0)->save();

            $permis = Permission::where("profile_id",$id)->where("menu_id",17)->get();
            $permis->get(0)->activar=$request->boolean('gMaACbE');            
            $permis->get(0)->save();
            
            $permis = Permission::where("profile_id",$id)->where("menu_id",18)->get();
            $permis->get(0)->activar=$request->boolean('gMdACbE');            
            $permis->get(0)->save();

        }

        if(!($request->boolean('gMuTCbE') or $request->boolean('gMsDCbE') or $request->boolean('gMaACbE') or $request->boolean('gMsBcBE') or $request->boolean('gMdACbE'))){
          
            $permis = Permission::where("profile_id",$id)->where("menu_id",13)->get();
            $permis->get(0)->activar=false;
            $permis->get(0)->save();

            $permis = Permission::where("profile_id",$id)->where("menu_id",14)->get();
            $permis->get(0)->activar=$request->boolean('gMuTCbE');            
            $permis->get(0)->save();

            $permis = Permission::where("profile_id",$id)->where("menu_id",15)->get();
            $permis->get(0)->activar=$request->boolean('gMsDCbE');            
            $permis->get(0)->save();

            $permis = Permission::where("profile_id",$id)->where("menu_id",16)->get();
            $permis->get(0)->activar=$request->boolean('gMsBcBE');            
            $permis->get(0)->save();

            $permis = Permission::where("profile_id",$id)->where("menu_id",17)->get();
            $permis->get(0)->activar=$request->boolean('gMaACbE');            
            $permis->get(0)->save();
            
            $permis = Permission::where("profile_id",$id)->where("menu_id",18)->get();
            $permis->get(0)->activar=$request->boolean('gMdACbE');            
            $permis->get(0)->save();

        }

        //Menu 5
        if($request->boolean('gRaCbE') or $request->boolean('gRsCbE') or $request->boolean('gRrACbE') or $request->boolean('gRrPCbE')){  
        
            $permis = Permission::where("profile_id",$id)->where("menu_id",19)->get();
            $permis->get(0)->activar=true;
            $permis->get(0)->save();

            $permis = Permission::where("profile_id",$id)->where("menu_id",20)->get();
            $permis->get(0)->activar=$request->boolean('gRaCbE');            
            $permis->get(0)->save();

            $permis = Permission::where("profile_id",$id)->where("menu_id",21)->get();
            $permis->get(0)->activar=$request->boolean('gRsCbE');            
            $permis->get(0)->save();

            $permis = Permission::where("profile_id",$id)->where("menu_id",22)->get();
            $permis->get(0)->activar=$request->boolean('gRrACbE');            
            $permis->get(0)->save();

            $permis = Permission::where("profile_id",$id)->where("menu_id",23)->get();
            $permis->get(0)->activar=$request->boolean('gRrPCbE');            
            $permis->get(0)->save();
            
        }

        if(!($request->boolean('gRaCbE') or $request->boolean('gRsCbE') or $request->boolean('gRrACbE') or $request->boolean('gRrPCbE'))){
        
            $permis = Permission::where("profile_id",$id)->where("menu_id",19)->get();
            $permis->get(0)->activar=false;
            $permis->get(0)->save();

            $permis = Permission::where("profile_id",$id)->where("menu_id",20)->get();
            $permis->get(0)->activar=$request->boolean('gRaCbE');            
            $permis->get(0)->save();

            $permis = Permission::where("profile_id",$id)->where("menu_id",21)->get();
            $permis->get(0)->activar=$request->boolean('gRsCbE');            
            $permis->get(0)->save();

            $permis = Permission::where("profile_id",$id)->where("menu_id",22)->get();
            $permis->get(0)->activar=$request->boolean('gRrACbE');            
            $permis->get(0)->save();

            $permis = Permission::where("profile_id",$id)->where("menu_id",23)->get();
            $permis->get(0)->activar=$request->boolean('gRrPCbE');            
            $permis->get(0)->save();
        }

    }

}
