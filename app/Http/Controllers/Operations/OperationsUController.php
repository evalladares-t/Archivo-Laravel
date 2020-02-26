<?php

namespace App\Http\Controllers\Operations;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Permission;
use App\Profile;
use App\User;

class OperationsUController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function indexU()
    {
        $permis = Permission::where("profile_id",auth()->user()->profile_id)->get();
        $profiles=Profile::all();
        $access=Permission::all();
        $user=User::paginate(8);
        return view('operations/g_user')->with(compact('permis','profiles','access','user'));
    }

        //registrar en la bd new
        public function storeU(Request $request){     
        
            $file=$request->file('photo');
            $path=public_path().'/img/usuarios';
            $file_name=uniqid().$file->getClientOriginalName();
            $file->move($path,$file_name);
            /*Creo el perfil*/
            $UserNew= new User();
            $UserNew->name=$request->input('name_user');
            $UserNew->dni=$request->input('dni_user');
            $UserNew->name_user=$request->input('user');
            $UserNew->imgURL=$file_name;
            $UserNew->password=bcrypt($request->input('password'));
            $UserNew->estado=$request->boolean('activar_user');
            $UserNew->profile_id=$request->input('profile_user');
            $UserNew->save();//insert

            return redirect('operationsu');                
        }

    //eliminar en la bd eliminar
    public function destroyU(Request $request,$id){

        $usuario = User::where("id",$id)->get();         
        if($request->ajax()){
            $usuario->get(0)->delete();
        }        
    }   
    
    //Cargar datos en un ajax para arrojar la info
    public function infoU(Request $request, $id){        
        if($request->ajax()){
            $user = User::where("id",$id)->get();
            $perfil=Profile::where("id",$user->get(0)->profile_id)->get();

            return response()->json([

                'name'=>$user->get(0)->name,
                'dni'=>$user->get(0)->dni,
                'name_user'=>$user->get(0)->name_user,
                'estado'=>$user->get(0)->estado,
                'imgURL'=>$user->get(0)->imgURL,
                'fecha_creacion'=>$user->get(0)->created_at,
                'fecha_modificacion'=>$user->get(0)->updated_at,
                'profile'=>$perfil->get(0)->name,
            ]);
        }
    }

    //Cargar datos en un ajax para arrojar el modal edit 
    public function editU(Request $request, $id){        
        if($request->ajax()){
            $user = User::where("id",$id)->get();
            //$perfil=Profile::where("id",$user->get(0)->profile_id)->get();
            return response()->json([
                'id'=>$user->get(0)->id,
                'name'=>$user->get(0)->name,
                'dni'=>$user->get(0)->dni,
                'name_user'=>$user->get(0)->name_user,
                //'estado'=>$user->get(0)->estado,
            ]);
        }
    }

    //Cargar datos en un ajax para arrojar el modal edit 
    public function updateU(Request $request, $id){        
        if($request->ajax()){
/*
            $this->validate($request, [
                'imageU' => 'required|image'
            ]);
*/
            $user = User::where("id",$id)->get();
            $user->get(0)->name=$request->input('name_userE');
            $user->get(0)->dni=$request->input('dni_userE');
            $user->get(0)->name_user=$request->input('userE');
            $user->get(0)->password=bcrypt($request->input('passwordE'));
            $user->get(0)->profile_id=$request->input('profile_userE');
            $user->get(0)->estado=$request->input('activar_userE');
           /* if(($request->file('imageU'))!=null){
                $fileArc=$request->file('imageU');
                $path=public_path().'/img/usuarios';
                $file_name=uniqid().$fileArc->getClientOriginalName();
                $file->move($path,$file_name);
                $user->get(0)->imgURL=$file_name;
            }*/
            $user->get(0)->save();
        }
    }
}


