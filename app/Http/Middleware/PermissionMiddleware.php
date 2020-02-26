<?php

namespace App\Http\Middleware;

use Closure;
use App\Permission;
class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$menu)
    {
        $p=Permission::where('profile_id',auth()->user()->profile_id)->where('menu_id',$menu)->get();

        if(!($p->get(0)->activar)){
            return redirect('/home');
            
        }

        
/*        if($u->get('activar')){
            return redirect('/home');
            
        }*/
        
        return $next($request);
        
    }
}
