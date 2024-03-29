<?php

namespace Database\Factories;

use App\Models\Vecino;
use Illuminate\Database\Eloquent\Factories\Factory;

class VecinoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vecino::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $nombre = $this->faker->firstName();
        $apellido1 = $this->faker -> lastName();
        $apellido2 = $this->faker -> lastName();
        return [            
            'nombre' => $nombre,
            'apellido1' => $apellido1,
            'apellido2' => $apellido2,
            'telefono' => $this->faker -> phoneNumber(),
            //'mail' => $this->faker->unique()->safeEmail(),
            'mail' => $nombre.'.'.$apellido1.'.'.$apellido2.'@example.com'
        ];
    }
}
