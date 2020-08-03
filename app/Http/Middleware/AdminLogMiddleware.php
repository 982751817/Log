<?php


namespace App\Http\Middleware;

use App\Events\LogShipped;
use Closure;
use Illuminate\Support\Facades\Log;
use App\Models\Logs;


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
        event(new LogShipped(new Logs(),$data));

        return $response;
    }

}
