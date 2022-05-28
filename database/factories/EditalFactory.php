<?php

namespace Database\Factories;

use App\Models\Edital;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Editais>
 */
class EditalFactory extends Factory
{
    protected $model = Edital::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'vagas_disponiveis_bolsa' => $this->faker->numberBetween(0, 6),
            'vagas_disponiveis_voluntario' => $this->faker->numberBetween(0, 10),
            'numero_edital' => $this->faker->numberBetween(0, 555),
            'resumo' => $this->faker->sentence(20),
            'orgao_fumento_responsavel' => $this->faker->sentence(4),
            'inicio_inscricao' => $this->faker->date('Y-m-d'),
            'termino_inscricao' => $this->faker->date('Y-m-d'),
            'titulo_proposta' => $this->faker->sentence(3),
            'modelo_proposta' => $this->faker->sentence(30),
            'id_instituicao' => 1,
        ];
    }
}
