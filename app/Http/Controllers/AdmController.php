<?php

namespace App\Http\Controllers;

use App\Models\Telefone;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdmController extends Controller
{
    public function home(){
        /* if(Auth::guest()){
            return redirect()->route('home');
        } */
        return view('layouts.Adm.home');
    }
    public function perfil(){
        return view('layouts.Adm.perfil');
    }
    public function cadPaciente(){
        $usuarios = User::all();
        return view('layouts.Adm.cadPaciente',compact('usuarios'));
    }
    public function storePaciente(Request $request){
        
        $dados=[
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'estato' => $request->estato,
            'remember_token' => $request->_token,
            'email_verified_at' => now(),

        ];

        if($request->estato == 'Paciente'){
            $usuario = User::create($dados);
            $usuario->paciente()->create();
            
        }else if($request->estato == 'Doutor'){
            $usuario = User::create($dados);
            $usuario->doutor()->create();
        }
        
        return redirect()->back();
    }
    public function UserUpdate(Request $request, $id){
        
        $usuarios = User::all();
        $dados=[
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'estato' => $request->estato,
            'remember_token' => $request->_token,
            'email_verified_at' => now(),
        ];

        foreach($usuarios as $usuario){
            if(($usuario->email == $request->email) && ($usuario->id <> $request->id)){
                $existe = 1;
                break;
            }else{
                $existe = 0;
            }
        }

        if($existe == 1){
            dd('O email ja existe');
        }else{
            User::where('id',$id)->update($dados);
            return redirect()->back();
        }
    }

    public function UserDelete($id){
        User::where('id',$id)->delete();
        return redirect()->back();
    }
}


