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
        // Checks if user is admin, else show Forbidden
        if (!auth()->user()?->is_admin){
            abort(Response::HTTP_FORBIDDEN);
        }
        return $next($request);
    }
}
