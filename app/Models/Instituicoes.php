<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Instituicoes extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'Instituicao';
    protected $primaryKey = 'id_instituicao';
    public $timestamps = false;
    protected $attributes = [
        'nome',
        'sigla',
    ];
    
    protected $fillable = [
        'nome',
        'sigla',
    ];
}
