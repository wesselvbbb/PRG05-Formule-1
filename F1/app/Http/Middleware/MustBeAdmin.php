<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MustBeAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(Request): (Response|RedirectResponse) $next
     * @return Response|RedirectResponse
     */

    public function handle(Request $request, Closure $next)
    {
        if (auth()->guest()){
            abort(Response::HTTP_FORBIDDEN);
        }
//        if (auth()->user()?->user === 'Admin'){
//            abort(Response::HTTP_FORBIDDEN);
//        }
        return $next($request);
    }
}
