<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doutor extends Model
{
    use HasFactory;

    protected $fillable = [
        'pri_nome',
        'ulti_nome',
        'n_ordem',
        'especialidade',
        'id_usuario',
    ];

    public function user(){ 
        return $this->belongsTo(User::class, foreignKey:'id_usuario', ownerKey:'id');
    }

    //Relacao com a tabela Telefone
    public function telefone(){
        return $this->hasOne(related:Telefone::class, foreignKey:'usuario', localKey:'id');
    }

    public function consulta(){
        return $this->hasMany(Consulta::class, foreignKey:'doutor', localKey:'id');
    }
}
