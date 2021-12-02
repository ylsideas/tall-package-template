<?php

namespace VendorName\Skeleton\Http\Middleware;

use Illuminate\Http\Request;
use VendorName\Skeleton\Skeleton;

class Authorize
{
    public function handle(Request $request, callable $next)
    {
        return Skeleton::check($request) ? $next($request) : abort(403);
    }
}
