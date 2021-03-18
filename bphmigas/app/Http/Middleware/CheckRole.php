<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $hak_akses)
    {

        if (! $request->user()->hasRole($hak_akses)) {
            
            return abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
