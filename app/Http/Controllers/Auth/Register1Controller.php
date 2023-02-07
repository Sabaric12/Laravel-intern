<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User1;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Register1Controller extends Controller
{
    public function store(Request $request){
$request->validate(
    ['name'=>'required',
        'email'=>'required',
        'password'=>'required|confirmed'
    ]
);
$user=new User1;
$user->name=$request->input('name');
$user->email=$request->input('email');
$user->password=Hash::make($request->input('password'));
$user->save();
Auth::login($user);
return redirect('/home');
    }
}
