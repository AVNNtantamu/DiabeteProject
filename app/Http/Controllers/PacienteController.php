<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PacienteController extends Controller
{
    public function home(){
        /* if(Auth::guest()){
            return redirect()->route('home');
        } */
        return view('layouts.Paciente.home');
    }
    public function perfil(){
        return view('layouts.Paciente.perfil');
    }
}
