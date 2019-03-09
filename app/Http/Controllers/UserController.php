<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function register()
    {

        return view('register');
    }
    public function postRegister(Request $request)
    {
        // dd($request->all());
        $data = $request->all();
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'tel' => 'required',
            'password' => 'required|min:6',
            'name' => 'required',
        ],
            [
                // 'email.required'=>'email sai'
            ]);
        if ($validator->fails()) {
            // dd($validator->errors());
            return redirect()->route('register')->withErrors($validator);
        } else {

            User::register($data);
            return redirect()->route('register')->with('success', trans('message.register_success'));
        }

    }
    public function getLogin()
    {

        if (Auth::check()) {
            return redirect()->route('index');
        }

        return view('login');
    }
    public function login_post(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ], []);
        if ($validator->fails()) {
            return redirect()->route('login-get')->withErrors($validator);
        }
        $credentials = $request->only('email', 'password');
        // dd(User::check_user_is_active($credentials)['flag']);
        if (!isset(User::check_user_is_active($credentials)['flag'])) {
            return redirect()->route('login-get')->withErrors(['locked_msg' => trans('message.wrong_account_msg')]);
            # code...
        }
        if (!$value = User::check_user_is_active($credentials)['flag']) {
            //    dd($value);
            $minutes = User::check_user_is_active($credentials)['minutes'];
            return redirect()->route('login-get')->withErrors(['locked_msg' => trans('message.lock_user_msg',['minutes'=> $minutes])]);
        } else {
            //    dd('da active');
        }

        ;
        if (User::try_login($credentials)) {
            return redirect()->route('index');
        } else {
            return redirect()->route('login-get')->with('fail_msg', 'Sai tài khoản hoặc mật khẩu');
        }
        // if (Auth::attempt($credentials)) {

        //     User::where('email',$request->email)
        //         ->update([
        //             'attempt' => 0
        //         ]);
        //     return redirect()->route('index');
        // } else {

        //     if($user_attempt){
        //         User::where('email',$request->email)
        //         ->update([
        //             'last_access'=>date('Y-m-d H:i:s'),
        //             'attempt' => $user_attempt->attempt+1
        //         ]);
        //         if($user_attempt->attempt+1 >= 3){
        //             User::where('email',$request->email)
        //             ->update([
        //                 'active'=>0,
        //             ]);
        //         }
        //     }

        //     return redirect()->route('login-get')->with('fail_msg','Sai tài khoản hoặc mật khẩu');

        // }

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login-get');
    }

    public function edit_profile()
    {
        if (Auth::check()) {
            $user = Auth::user();
        }
        $this->data_view = [
            'user'=>$user
        ];
        return view('edit_profile', $this->data_view);
    }
    public function edit_profile_post(Request $request)
    {
        $data = $request->all();
        User::updateUser($data);
    
        return redirect()->route('edit-profile')->with('success', ' Cập nhật thành công');
    }

}
