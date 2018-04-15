<?php

namespace App\Http\Controllers;

use App\Counter;
use Illuminate\Http\Request;
use App\Queue;
use Illuminate\Contracts\Database;
use App\Http\Requests;
use Mockery\CountValidator\Exception;

class CounterController extends Controller
{
    //
    public function index(Request $request){
        $err=null;

        if( $request->session()->has('number')) {
            $cf=Counter::find($request->session()->get('number'));
            $prio='';
            $qnum='';
            if($cf->queue!=null){

                $prio=$cf->queue->prio==1?'Priority':'Non Prio';
                $qnum=$cf->queue->number;
            }


           $num=$cf->counter_number;
            return view('home',compact('err','num','qnum','prio'));
        } else {
            $err="No seesion availabe Login again";
            $num= $request->session()->get('number');
            return redirect()->route('counter.index',compact('err','num'));
        }
    }
    public function store(Request $request){
       if( $request->session()->has('number')) {
           $cf=Counter::find($request->session()->get('number'));
           try {
           if($cf->queue!=null){

                 $nq=$cf->queue;//Queue::where('number',$qnum)->get()->first();
               if($nq!=null){
                  $nq->status=1;


                $nq->update();
               }
           }

                $queue = Queue::where('status', 0)->where('flag', '0')
                    ->where('prio',$request->prio)->get()->first();

                if ($queue != null) {
                    $queue->flag = 1;
                    $cf->cust_number = $queue->id;
                    $queue->update();
                } else
                    $cf->cust_number = 0;

                $cf->update();
            }catch (Exception $ex){}

          return redirect()->route('counter.index');

       }else
            return redirect()->route('counter.index');
    }
    public function reset(Request $request){
        //DB::table('Queue')->truncate();
        Queue::truncate();
        return redirect()->route('queue.index');
    }
}
