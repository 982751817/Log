<?php


namespace App\Http\Middleware;

use App\Events\LogShipped;
use Closure;
use Illuminate\Support\Facades\Log;
use App\Models\Logs;
use Illuminate\Support\Facades\Auth;


class AdminLogMiddleware
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        $adminUser = Auth::user();
        $adminId   = $adminUser['id'];
        $adminName = $adminUser['userName'];
        $data = [
            'ip'         => $request->getClientIp(),
            'uri'        => $request->getPathInfo(),
            'method'     => $request->getMethod(),
            'adminId'    => $adminId,
            'adminName'  => $adminName,
            'statusCode' => $response->getStatusCode()
        ];
        event(new LogShipped(new Logs(),$data));

        return $response;
    }

}
