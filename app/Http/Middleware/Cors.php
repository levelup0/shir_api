<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Cors
{
    public function handle(Request $request, Closure $next)
    {
    //     return $next($request)
    //     ->header('Access-Control-Allow-Origin', '*')
    //     ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, PATCH, DELETE, OPTIONS')
    //     ->header('Access-Control-Allow-Headers', 'Host, Content-Type,X-Amz-Date,Authorization,X-Api-Key,X-Amz-Security-Token,X-XSRF-TOKEN, Origin, Access-Control-Request-Origin, Access-Control-Request-Method, Access-Control-Request-Headers, Access-Control-Allow-Origin, access-control-allow-origin, Access-Control-Allow-Credentials, access-control-allow-credentials, Access-Control-Allow-Headers, access-control-allow-headers, Access-Control-Allow-Methods, access-control-allow-methods')
    //     ->header('Access-Control-Allow-Credentials', 'true');
    // }

    $headers = [
        'Access-Control-Allow-Origin'      => '*',
        'Access-Control-Allow-Methods'     => '*',
        'Access-Control-Allow-Credentials' => 'true',
        'Access-Control-Max-Age'           => '86400',
        'Access-Control-Allow-Headers'     => 'X-Requested-With,Content-Type,X-Token-Auth,Authorization',
        'Accept'     => 'application/json'
    ];

    if ($request->isMethod('OPTIONS')) {
        return response()->json('{"method":"OPTIONS"}', 200, $headers);
    }

    $response = $next($request);
    foreach($headers as $key => $value) {
        // $response->header($key, $value);
        $response->headers->set($key, $value);
    }

    return $response;
    }
    // return $next($request)
    //     ->header('Access-Control-Allow-Origin', '*')
    //     ->header('Access-Control-Allow-Methods', '*')
    //     ->header('Access-Control-Allow-Credentials', true)
    //     ->header('Access-Control-Allow-Headers', 'X-Requested-With,Content-Type,X-Token-Auth,Authorization')
    //     ->header('Accept', 'application/json');
    // }
}