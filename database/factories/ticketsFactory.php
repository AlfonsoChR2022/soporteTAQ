<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\categorias;
use App\Models\User;

class ticketsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'terminal' => '016',
            'evento' => $this->faker->text(50),
            'id_categoria' => categorias::all()->random()->id,
            'descrip' => $this->faker->text(250),
            'prioridad' => rand(1,3),
            'fecha_crea' => now(),
            'status' => rand(1,4),
            'user' => User::all()->random()->id
        ];
    }
}
