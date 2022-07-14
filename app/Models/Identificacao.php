<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Identificacao extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero',
        'id_tipo_identi',
    ];
}
