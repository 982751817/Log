<?php

namespace App\Listeners;

use App\Events\LogShipped;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
use App\Models\Logs;

class SendLogNotification implements ShouldQueue
{

    public $queue = 'logs';
    public $delay = 5;
    /**
     * 创建事件监听器.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * 处理事件.
     *
     * @param  LogShipped  $logShipped
     * @return void
     */
    public function handle(LogShipped $event)
    {
//        Log::info("监听者处理");
        Logs::create($event->data);
    }


}
