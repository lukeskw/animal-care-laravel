<?php

namespace Database\Factories;

use App\Models\Animal;
use Illuminate\Database\Eloquent\Factories\Factory;

class AnimalFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Animal::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'animal_nome' => $this->faker->word,
            'chip' => $this->faker->numerify('####'),
            'tipo' => $this->faker->randomElement(['Felino', 'Canino', 'Equino']),
            'porte' => $this->faker->randomElement(['Pequeno', 'Medio', 'Grande']),
            'raca' => $this->faker->word,
            'idade' => $this->faker->numberBetween(1, 5),
            'obito_data' => $this->faker->dateTimeBetween('-1 year', '-1 hour')->format('Y-m-d'),
            'obito_causa' => $this->faker->sentence,
        ];
    }
}
