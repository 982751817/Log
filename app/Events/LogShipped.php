<?php

namespace App\Events;

use App\Models\Logs;
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
    public function __construct(Logs $logs,array $data)
    {
        $this->logs = $logs;
        $this->data = $data;
    }
}
