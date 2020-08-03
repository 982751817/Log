<?php

namespace App\Providers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class ResponseMacroServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        Response::macro('creat', function ($message='请求成功',$code=200,$data=[]) {
            return new JsonResponse([
                'code' => $code,
                'data' => $data,
                'message'=>$message
            ],200);
        });
    }
}
