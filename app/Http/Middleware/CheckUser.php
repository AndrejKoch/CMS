<?php

namespace App\Http\Middleware;

use Closure;

class CheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        $userRole =  $request->user()->getRole;
        if ($userRole->name === $role ) {
            return $next($request);
        }
        return redirect()->route('home');
    }
}
