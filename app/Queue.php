<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Queue extends Model
{
    //
    protected $table='queue';
    protected $fillable = [
        'number', 'status','prio','flag'
    ];


}
