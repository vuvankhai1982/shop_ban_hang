<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getLogin(){
        return view('admin.login');
    }
    public function postLogin(Request $request){
        $email=$request->email;
        $password=$request->password;
   if(Auth::attempt(['email'=>$email, 'password'=>$password]))
   {
      return view('admin.index')->with('thongbao', 'dang nhap thanh cong');
   } else{
      return redirect()->back()->with('thongbao', 'tk,mk khong chinh xac');
   }
    }
}
