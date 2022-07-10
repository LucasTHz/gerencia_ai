<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submete extends Model
{
    use HasFactory;

    protected $table = 'Submete';
    protected $attributes = [
        'id_Estudante',
        'numero_edital',
        'aprovamento',
    ];

    public function estudantes()
    {
        return $this->belongsTo(Estudante::class, 'id_Estudante');
    }
}
