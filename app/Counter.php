<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Counter extends Model
{
    //
    protected $table='counter';
    public function queue(){
        return $this->hasOne('App\queue','id','cust_number');
    }
    public function prio(){
        return $this->hasOne('App\queue','id','cust_number')->where('prio',1);
    }
    public function non(){
        return $this->hasOne('App\queue','id','cust_number')->where('prio',0);
    }
}
