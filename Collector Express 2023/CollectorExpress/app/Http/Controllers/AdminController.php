<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function index(){
        return view('admin.admin_Login');
    }
    public function adminLogin(Request $request){
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        $check=$request->all();
        if(Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password])){
            return redirect()->route('admin.dashboard');

        }
        else{
            return back()->with('status','Login Failed');
        }
    }
    // public function dashboard(){
    //     return view('admin.adminDashboard');

    // }
    public function adminLogout(Request $request){
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('admin/login');
    }
  
}
