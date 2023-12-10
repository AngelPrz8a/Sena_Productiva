<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->name(),
            'apellido' => $this->faker->lastName(),
            'fechaNacimiento' => $this->faker->date(),
            'genero' => $this->faker->randomElement(["f","m"]),
            'tipoDocumento' => $this->faker->randomElement(["CC","TI"]),
            'numeroIdentificacion' => $this->faker->unique()->numberBetween(1000000000,1900000000),
            'numeroCelular' => $this->faker->numberBetween(3100000000,3140000000),
            'emailPersonal' => $this->faker->email(),
            'emailSena' => $this->faker->email(),
            'estado'=>"Activo",
            'contraseña' => "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi", // password
        ];
    }

}
