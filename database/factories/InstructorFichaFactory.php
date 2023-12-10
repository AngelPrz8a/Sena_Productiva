<?php

namespace Database\Factories;

use App\Models\Ficha;
use App\Models\InstructorFicha;
use Illuminate\Database\Eloquent\Factories\Factory;

class InstructorFichaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = InstructorFicha::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "id_ficha"=>$this->faker->numberBetween(1,10),
            "id_instructor"=>$this->faker->numberBetween(1,5),
        ];
    }
}
