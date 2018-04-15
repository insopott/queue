<?php

namespace App\Http\Controllers;

use App\Queue;
use Illuminate\Http\Request;

use App\Http\Requests;

class QueueController extends Controller
{
    //
    public function index(){
        return view('welcome');
    }
    public function store(Request $request){
        $q=new Queue();

        $cq=Queue::where('prio',$request->prio)->orderby('id','DESC')->get()->first();
        if($cq!=null)
             $q->number=$cq->number+1;
        else
            $q->number=1;
        $q->status=0;
        $q->flag=0;
        $q->prio=$request->get('prio');
        $q->save();
        return redirect()->route('queue.index');
    }
}
