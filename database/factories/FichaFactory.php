<?php

namespace Database\Factories;

use App\Models\Ficha;
use App\Models\Programa;
use Illuminate\Database\Eloquent\Factories\Factory;

class FichaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ficha::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "numero"=>$this->faker->unique()->numberBetween(2200000,2290000),	
            "inicioLectiva"=>$this->faker->date(),	
            "finLectiva"=>$this->faker->date(),	
            "inicioProductiva"=>$this->faker->date(),	
            "finProductiva"=>$this->faker->date(),	
            "jornada"=>$this->faker->randomElement(["Diurna", "Noche", "Virtual"]),
            "estado"=>"Activo",	
            "id_programa"=>Programa::factory()->create()
        ];
    }
}
