<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function register(){
        return view('register');
    }
    public function postRegister(Request $request){
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'tel' => 'required',
            'password' => 'required|min:6',
            'name' => 'required',
        ],
        [
            // 'email.required'=>'email sai'
        ]);
        if($validator->fails()){
            // dd($validator->errors());
            return redirect()->route('register')->withErrors($validator);
        }
        else{
            DB::table('users')->insert([
                'email'=>$request->email,
                'phone'=>$request->tel,
                'password'=>bcrypt($request->password),
                'name'=>$request->name,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ]);
            return redirect()->route('register')->with('success','Đăng ký thành công');
        }

    }
    public function getLogin(){
        return view('login');
    }
    public function login_post(Request $request){
        // dd($request->all());
        $validator = Validator::make($request->all(),[
            'email'=>'required|email',
            'password'=>'required',
        ],[]);
        if($validator->fails()){
            return redirect()->route('login')->withErrors($validator);
        }
        $credentials = $request->only('email','password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('index');
        } else {
            return redirect()->route('login-get')->with('fail_msg','Sai tài khoản hoặc mật khẩu');
        }
      
        
    }
}
