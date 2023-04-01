<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inmueble>
 */
class InmuebleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo' => $this->faker->sentence(),
            'etiquetas' => '2 rec, 2 baños, 1 estac',
            'descripcion' => $this->faker->paragraph(3),
            'precio' => 10000.00,
            'ubicacion' => $this->faker->city(),
            'contacto' => $this->faker->companyEmail()
        ];
    }
}
