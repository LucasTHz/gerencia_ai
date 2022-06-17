<?php

namespace App\Models;

use Database\Factories\EditalFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Edital extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'Edital';
    public $timestamps = false;

    protected $fillable = [
        'vagas_disponiveis_bolsa',
        'vagas_disponiveis_voluntario',
        'numero_edital',
        'resumo',
        'orgao_fumento_responsavel',
        'inicio_inscricao',
        'termino_inscricao',
        'titulo_proposta',
        'modelo_proposta',
        'path_edital',
        'id_instituicao'
    ];
}
