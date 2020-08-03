<?php


namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

class AdminLogMiddleware
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);


        $data = [
            'admin_id' => 'ceshi',
            'uri' => $request->getPathInfo(),
            'method' => $request->getMethod(),
            'ip' => $request->getClientIp(),
            'status_code' => $response->getStatusCode()
        ];
        Log::info($data);

        return $response;
    }

}
