<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;

class RegisterController extends Controller
{
    //
    public function index(Request $request){
        $err=null;
        if($request->session()->has('err')){
            $err=$request->session()->get('err');
            $request->session()->remove('err');
        }
        return view("auth.register",compact('request','err'));

    }
    public function store(Request $request){
        $user=new User();
        $user->password=bcrypt($request->get('password'));
        $user->username=$request->get('username');
        $user->name=$request->get('name');
        try{
            $user->save();
        }catch(QueryException $ex){
            $request->session()->put('err','Username has already been used');
            return redirect()->route('register.index');
        }
        /*if (Auth::attempt(['username' => $request->get('username'), 'password' => $request->get('password')])) {
            // Authentication passed...
            return redirect("/");
        }*/
        return redirect('/');
    }
}
