<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Professores extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

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

    /**
     * Get the instituição that owns the professor.
     */
    public function instituicoes()
    {
        return $this->belongsToMany(Instituicoes::class, 'Trabalha', 'id_professor', 'id_instituicao');
    }
}
