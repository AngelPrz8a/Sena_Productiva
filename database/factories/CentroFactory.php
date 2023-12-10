<?php

namespace Database\Factories;

use App\Models\Centro;
use Illuminate\Database\Eloquent\Factories\Factory;

class CentroFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Centro::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "nombre"=>$this->faker->word(),	
            "sede"=>$this->faker->word(),	
            "ciudad"=>$this->faker->city(),	
            "direccion"=>$this->faker->address(),	
            "region"=>$this->faker->name(),
            "estado"=>"Activo"	
        ];
    }
}
