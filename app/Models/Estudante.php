<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Estudante extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'Estudante';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'telefone_celular',
        'telefone_fixo',
        'data_nascimento',
        'cpf',
        'rua',
        'numero',
        'cidade',
        'estado',
        'bairro',
        'complemento',
        'telefone_responsavel',
        'nome_responsavel',
        'nome',
        'email',
        'password',
        'id_instituicao',
    ];


}
