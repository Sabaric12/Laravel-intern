<?php

namespace App\Http\Controllers\Auth;

use App\Email\EmailUserEmail2;
use App\Http\Controllers\Controller;
use App\Models\User1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;


class ForgotPasswordController extends Controller
{
    public function showForgotPasswordForm()
    {
        return view('auth.forgot-Password');
    }

    public function submitForgotPasswordForm(Request $request)
    {

        $validate = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'email' => 'required|email',
        ]);
        if ($validate->fails()) {
            return 'Validation error';
        } else {
            $remember_token = \Illuminate\Support\Str::uuid();
            $get = DB::table('user1s')->where('email', $request->email)->first();
            $forgot = [
                'body' => route('reset', ['email' => $request->email, 'remember_token' => $remember_token])
            ];
            if ($get) {
                User1::where('email', $request->email)->update([
                    'remember_token' => $remember_token
                ]);

                Mail::to($request->email)->send(new \App\Mail\EmailUserEmail2($forgot));
                return back();
            }
        }


    }


    public function showResetPasswordForm(Request $request)
    {
        $email = $request->email;
        $remember_token = $request->remember_token;
        return view('auth.reset', ['email' => $email, 'remember_token' => $remember_token]);
    }

    public function submitPasswordResetForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:user1s',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);
        $password_reset_request = $input = $request->all();
        User1::create($input);
        if (!$password_reset_request) {
            return back()->with('error', 'Invalid Token!');
        }
        User1::where('email', $request->input('email'))
            ->update(['password' => Hash::make($request->input('password'))]);
        User1::where('email', $request->input('email'))
            ->delete();
        return redirect('/login')->with('message', 'Your password has been changed!');
    }
}

