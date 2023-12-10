<?php

namespace Database\Factories;

use App\Models\Aprendiz;
use App\Models\User;
use App\Models\UsuarioRol;
use Illuminate\Database\Eloquent\Factories\Factory;

class AprendizFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Aprendiz::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "id_usuario"=>User::factory()->create(),
            "id_ficha"=>$this->faker->numberBetween(1,10),	
        ];
    }
}
