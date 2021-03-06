<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Instituicoes extends Model
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

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

    /**
     * The professores that belong to the instituicao.
     */
    public function professores()
    {
        return $this->belongsToMany(Professores::class);
    }
}
