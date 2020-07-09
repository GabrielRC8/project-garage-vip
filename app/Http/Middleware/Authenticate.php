<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('login');
            }
        }

        if (Auth::guard($guard)->check()) {
            $user = Auth::guard($guard)->user();

            if( $user->status == 0 ) { // Inativo
                Auth::logout();
                return redirect()->guest('login')
                    ->withErrors(['email' => 'Usuário inativo.']);
            }

            if( $user->status == 2 ) { // Excluido
                Auth::logout();
                return redirect()->guest('login')
                    ->withErrors(['email' => 'Email ou Senha inválidos.']);
            }

            if( $user->status == 3 ) { // Bloqueado
                Auth::logout();
                return redirect()->guest('login')
                    ->withErrors(['email' => 'Usuário bloqueado.']);
            }

            $uri = explode('/',$request->getPathInfo())[1];

            $permission = false;
            $pages = $user->group->pages;
            foreach ($pages as $page ) {
                if( $page->route_path == "/".$uri ){
                    $permission = true;
                }
            }

            if(! $permission) {
                 return redirect()->guest($user->group->home);
            }

        }        

        return $next($request);
    }
}
