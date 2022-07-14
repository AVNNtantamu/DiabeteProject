<?php

use App\Http\Controllers\AdmController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\web\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Route::get('/', function () { {{route('Adm.cadPaciente')}}
    return view('welcome');
}); */

Route::get('/login', [HomeController::class,'login'])->name('login');
Route::prefix('lnpd')->group(function(){

    Route::get('/', [HomeController::class,'home'])->name('home');
    Route::post('/auth',[UserController::class,'auth'])->name('user.auth');
    Route::get('/logout', [UserController::class,'logout'])->name('logout');

    //Routas do Adm
    Route::middleware(['admin'])->group(function(){
        Route::get('/Adm',[AdmController::class,'home'])->name('Adm.home');
        Route::get('/Adm/Perfil',[AdmController::class,'perfil'])->name('Adm.perfil');
        Route::get('/Adm/cadPaciente',[AdmController::class,'cadPaciente'])->name('Adm.cadPaciente');
        Route::post('/Adm/storePaciente',[AdmController::class,'storePaciente'])->name('store.Paciente');
        Route::put('user/update/{id}',[AdmController::class,'UserUpdate'])->where('id','[0-9]+')->name('user.update');
        Route::delete('user/delete/{id}',[AdmController::class,'UserDelete'])->where('id','[0-9]+')->name('user.delete');
    });

    //Routas do Paciente
    Route::middleware(['paciente'])->group(function(){
        Route::get('/Paciente',[PacienteController::class,'home'])->name('Paci.home');
        Route::get('/Paciente/Perfil',[PacienteController::class,'perfil'])->name('Paci.perfil');
    });

    //Routas do Paciente
    Route::middleware(['doutor'])->group(function(){
        
    });
});