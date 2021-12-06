<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\Rayon;
use App\Models\Rombel;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function halamanlogin(){
        return view('Login.Login-aplikasi');
    }


    public function postlogin(Request $request){
        if(Auth::attempt($request->only('username','password'))){
            return redirect('/home');
        }    
        return redirect('/');
    }

    public function logout(){
        Auth::logout();
        return redirect ('/');
    }

    public function registrasi(){
        $rombels = Rombel::all();
        $rayons = Rayon::all();
        return view('Login.registrasi',compact('rombels','rayons'));
    }

    public function simpanregistrasi(Request $request ){
        // dd($request->all());

        User::create([
            'name' => $request->name,
            'level' => 'siswa',
            'nis' => $request->nis,
            'rayon' => $request->rayon,
            'rombel' => $request->rombel,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60),
        ]);
        return view('welcome');

    }
}
