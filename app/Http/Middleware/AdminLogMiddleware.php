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

        $adminId = Auth::id();
        $adminName = Auth::user()->toArray()->userName;
        $data = [
            'adminId' => $adminId,
            'adminName'=>$adminName,
            'uri' => $request->getPathInfo(),
            'method' => $request->getMethod(),
            'ip' => $request->getClientIp(),
            'statusCode' => $response->getStatusCode()
        ];
        event(new LogShipped(new Logs(),$data));

        return $response;
    }

}
