<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{
    use HasFactory;

    protected $fillable = [
        'telefone',
    ];

    //Relacionamento com o Paciente
    public function paciente(){
        return $this->belongsTo(Paciente::class, foreignKey:'usuario', ownerKey:'id');
    }

    //Relacionamento com o Doutor
    public function doutor(){
        return $this->belongsTo(Doutor::class, foreignKey:'usuario', ownerKey:'id');
    }

}
