<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ],[
            'username.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi'
        ]);

        $infologin = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if(Auth::attempt($infologin)){
            if(Auth::user()->idlevel == 1){
                return redirect('beranda');
            }else if(Auth::user()->idlevel == 2){
                return redirect('beranda');
            }else if(Auth::user()->idlevel == 3){
                return redirect('beranda');
            }
        }else{
            return redirect('')->withErrors('Username dan Password yang dimasukan tidak sesuai')->withInput();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('');
    }
}
