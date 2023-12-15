<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
  public function index(){
    return view('public.login');
  }

  public function login(Request $request){

    // $request->session()->flash('email', $request->email);
    $request->validate([
        'email' => 'required',
        'password' => 'required'
    ],[
        'email.required' => 'Email wajib diisi',
        'password.required' => 'password wajib diisi',
    ]);

    $infologin=[
        'email'=>$request->email,
        'password'=>$request->password
    ];

    $datauser = Auth::user();


    if(Auth::attempt($infologin)){
        if(Auth::user()->role == "Admin"){
        return redirect()->route('admin.dashboard.member')->with('datauser', $datauser);
        }else{
            return redirect()->route('admin.dashboard.porto')->with('datauser', $datauser);
        }
    }else{
        return redirect()->route('login')->withErrors('username atau email tidak valid.');
    }
  }

  public function logout(){
    Auth::logout();
    return redirect()->route('login')->with('succes', 'Berhasil Logout');
  }
}
