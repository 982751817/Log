<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Logs extends Model
{
    public $timestamps = false;
    protected $fillable = ['adminId', 'method','uri','ip','statusCode'];
}
