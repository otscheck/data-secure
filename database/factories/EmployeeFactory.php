<?php

namespace Database\Factories;

use App\Models\Poste;
use App\Models\Region;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'matricule' => $this->faker->numerify('mat-####'),
            'nom_complet' => $this->faker->name(),
            'adresse' => $this->faker->address(),
            'telephone' => $this->faker->phoneNumber(),
            'region_id' => Region::inRandomOrder()->first()->id,
            'poste_id' => Poste::inRandomOrder()->first()->id,
            'prime' => $this->faker->randomFloat(2, 0, 50),
            'engage_le' => $this->faker->dateTimeThisDecade(),
        ];
    }
}
