<?php

namespace App\Http\Controllers\admin\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class login extends Controller
{
    public function index(){
       return view('admin.users.login',['title' => 'Login']);
    }
    public function loging(Request $request){

        // dd($request->input("email"));

        $this -> validate($request,['email'=>'required|email:filter','password'=>'required']);

       if(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')],$request->input('remember'))){
        $request->session()->flash('success','Đăng nhập thành công');
        return redirect()->route('admin');
       }
       $request->session()->flash('error','Email hoặc pass sai rồi');
          return redirect()->back();
    }

}
