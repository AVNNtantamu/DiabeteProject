<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $fillable = [
        'endereco',
        'pri_nome',
        'ulti_nome',
        'data_nasc',
        'tipo_diabete',
        'id_identi',
        'id_usuario',
    ];

    //Relacionamento com o usuario
    public function user(){
        return $this->belongsTo(User::class, foreignKey:'id_usuario', ownerKey:'id');
    }

    //Relacao com a tabela Telefone
    public function telefone(){
        return $this->hasOne(related:Telefone::class, foreignKey:'usuario', localKey:'id');
    }

    //Relacionamento com Consultas
    public function consulta(){
        return $this->belongsToMany(Consulta::class,table:'paciente_consultas',foreignPivotKey:'id_paciente',relatedPivotKey:'id_consulta');
    }

}
