<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Bio;

class MultiDomain
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // dd($request->server->all());
        $server = $request->server->all();
        $uri = $server['REQUEST_URI'];
        $domain = $server['HTTP_HOST'];
        $bio = Bio::where('domain', $domain)->get()->last();
        if ($uri == '/') {
            if ($bio) {
                // handle first page based on domain name
                // [App\Http\Controllers\PagesController::class, 'index']
                return response(view('pages.index', ['bio' => $bio]));
            }
        }

        if (
            !$bio &&
            in_array($domain, [env('APP_DOMAIN'), '127.0.0.1', 'localhost'])
        ) {
            abort(404);
        }

        return $next($request);
    }
}
