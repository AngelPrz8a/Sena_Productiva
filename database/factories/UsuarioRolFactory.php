<?php

namespace Database\Factories;

use App\Models\UsuarioRol;
use Illuminate\Database\Eloquent\Factories\Factory;

class UsuarioRolFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UsuarioRol::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "id_usuario"=>$this->faker->numberBetween(1,35),	
            "id_rol"=>$this->faker->numberBetween(1,3)
        ];
    }
}
