<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use League\Uri\Http;
use Symfony\Component\HttpFoundation\Response;

class CheckByRole
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = auth()->user();

        if(!$user)
            {
                print_r('User Blm Login');
            }
        if(!in_array($user->role, $roles ))
        {
            abort(403, 'Anda Tidak Punya Akses Ke Halaman Ini');
        }

        return $next($request);
    }
}
