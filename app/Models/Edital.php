<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Edital extends Model
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

    protected $table = 'Edital';
    public $timestamps = false;
    protected $primaryKey = 'numero_edital';

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
