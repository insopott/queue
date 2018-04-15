<?php

namespace App\Http\Controllers;

use App\Counter;
use Illuminate\Http\Request;
use App\Queue;
use App\Http\Requests;

class DisplayController extends Controller
{
    //
    public function index(){
         $d=Counter::where('cust_number','!=',0)->wherehas(
             'queue',function ($query){
                $query->where('prio',0);
                $query->where('status',0);
            }
         )->orderby('updated_at','DESC')->first();
        $d2=Counter::where('cust_number','!=',0)->wherehas(
            'queue',function ($query){
            $query->where('prio',1);
            $query->where('status',0);
        }
        )->orderby('updated_at','DESC')->first();;
        $queue= Queue::where('status',0)->where('flag',0)->
            orderby('prio','ASC')
            ->orderby('number','ASC')->get()->take(10);
        return view('display',compact('d','queue','d2'));

    }
    public function dis(){
        $d=Counter::where('cust_number','!=',0)->wherehas(
            'queue',function ($query){
            $query->where('prio',0);
            $query->where('status',0);
        }
        )->orderby('updated_at','DESC')->first();;
        $d2=Counter::where('cust_number','!=',0)->wherehas(
            'queue',function ($query){
            $query->where('prio',1);
            $query->where('status',0);
        }
        )->orderby('updated_at','DESC')->first();;
        $queue= Queue::where('status',0)->where('flag',0)->
        orderby('prio','ASC')
            ->orderby('number','ASC')->get()->take(10);
        return view('display2',compact('d','queue','d2'));
    }
}
