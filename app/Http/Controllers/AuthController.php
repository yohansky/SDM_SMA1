<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class AuthController extends Controller
{
    public function index(){
        return view("dashboard.pages.auth.index");
    }
    
    public function adminLogin(){
        return view("dashboard.pages.auth.admin");
    }
    

    public function postLogin(Request $req){
        if(Auth::attempt($req->only('nik','password'))) {
            $user = Auth::user();
            if ($user->role == "Staff"){
                return redirect()->route("absensi.staff.index");
            } else if($user->role == "Guru"){
                return redirect()->route("absensi.guru");
            } else if($user->role == "Kepsek"){
                return redirect()->route("kepsek.index");
            }
    	}
    	return redirect('/login');
    }

    public function adminPostLogin(Request $req){
        if(Auth::attempt($req->only('email','password'))) {
            return redirect("/");
    	}
    	return redirect('/admin/login');
    }

    public function logout(){
        $user = Auth::user();
        $role = $user->role;
        Auth::logout();
        if ($user->role != "Admin"){
    	    return redirect('/login');
        }
    	return redirect('/admin/login');
    }
    
}
