<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Centro_Consulta extends Model
{
    use HasFactory;

    protected $fillable = [
        'descricao',
        'endereco',
        'id_consulta',
    ];

    //Relacionamento com Consulta
    public function consulta(){
        return $this->belongsTo(Consulta::class,foreignKey:'id_consulta',ownerKey:'id');
    }
}
