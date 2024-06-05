<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\RedirectResponse;
class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $userType): Response
    {
        if (auth()->user()->type == $userType) {
            return $next($request);
        }
        // response()->json(['You do not have permission to access for this page.', 
        // '$usertype= ', $userType,
        // 'auth()->user()->type= '.auth()->user()->type]);
        // return response()->route('welcome', ['usertype' => $userType], '403');
      // return redirect()->route('welcome', ['usertype' => $userType]);

      return redirect()->route('welcome');
    }

}
