<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function auth(Request $request){ 
        
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            if(auth()->user()->estato=='Paciente'){
                return redirect()->route('Paci.home');
            }elseif(auth()->user()->estato=='Administrador'){
                return redirect()->route('Adm.home');
            }elseif(auth()->user()->estato=='Doutor'){
                $usuarios = User::where('id',auth()->user()->id)->first();
                return redirect()->route('Doutor.home');
            }
        }else{
            return redirect()->back()->with('danger','E-mail ou senha invalida');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
    
}
