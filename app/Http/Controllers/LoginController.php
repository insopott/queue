<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Counter;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function index(Request $request){
        $count= Counter::where('status',0)->get();
      //  $counter=array();
        $err=null;
        if($request->session()->has('err')){
            $err=$request->session()->get('err');
            $request->session()->remove('err');
           // return "error";
        }


        foreach($count as $co){
            $counter[$co->id]="Counter ".$co->counter_number;
        }
        return view("auth.login",compact('counter','err'));
    }
    public function store(Request $request){
        if (Auth::attempt(['username' => $request->get('username'), 'password' => $request->get('password')])) {
            // Authentication passed...
            $c=Counter::find($request->get('counter'));
            $c->status=1;
            $c->update();
            $request->session()->put('number',$request->get('counter'));
            return redirect()->route('counter.index');
        }else{
            $request->session()->put('err','Error ocured no account found');
            return redirect()->route('login.index');

        }
    }
    public function logout(Request $request){
        Auth::logout();

        $c=Counter::find(  $request->session()->get('number'));
        $c->status=0;
        $c->update();
        $request->session()->forget('number');
        return redirect('/login');
    }
}
