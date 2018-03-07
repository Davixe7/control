<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      if( $request->user() ){
        $actions = $request->route()->getAction();
        $roles = ( isset($actions['roles']) ) ? $actions['roles'] : null;
        
        if($request->user()->hasAnyRole($roles) ){
          return $next($request);
        }
        return response("Permisos insuficientes para llevar a cabo esta acción", 401);
      }
      return redirect('/');
    }
}
