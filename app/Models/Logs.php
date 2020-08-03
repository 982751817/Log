<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Logs extends Model
{
    public $timestamps = false;
    protected $fillable = ['admin_id', 'method','uri','ip','status_code'];
}
