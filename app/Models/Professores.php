<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Professores extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'Professor';
    protected $primaryKey = 'id_professor';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'nome',
        'cpf',
        'email',
        'password',
        'endereco_curriculo',
        'matricula',
        'celular',
    ];
}
