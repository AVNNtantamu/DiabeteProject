<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;

    protected $fillable = [
        'data_consulta',
        'estado',
        'paciente',
        'doutor',
    ];

    //Relacionamento com o Centro
    public function centro(){
        return $this->hasMany(related:Centro_Consulta::class, foreignKey:'id_consulta', localKey:'id');
    }

    //Relacionamento com Doutor
    public function doutor(){
        return $this->belongsTo(Doutor::class,foreignKey:'doutor', ownerKey:'id');
    }

    //Relacionamento com Pacientes
    public function consulta(){
        return $this->belongsToMany(Paciente::class,table:'paciente_consultas',foreignPivotKey:'id_consulta',relatedPivotKey:'id_paciente');
    }
}
