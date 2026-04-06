<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alimento extends Model
{
    protected $fillable = [
        'Nome',
        'Caloria',
        'Proteina',
        'Carboidrato',
        'Gordura',
    ];
}
