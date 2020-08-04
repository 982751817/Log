<?php

namespace App\Events;


use Illuminate\Queue\SerializesModels;

class LogShipped
{
    use SerializesModels;

    public $logs;
    public $data;

    /**
     * 创建一个新的事件实例.
     *
     * @param  Logs  $logs
     * @return void
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }
}
