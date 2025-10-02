<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Company;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    protected $model = Company::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->company(),
            'email' => $this->faker->unique()->companyEmail(),
            'website' => $this->faker->url(),
            'logo' => null, // Optional: you can add image generation later
        ];
    }

    public function withLogo()
    {
        return $this->state(function (array $attributes) {
            return [
                'logo' => 'logos/' . $this->faker->slug . '.png',
            ];
        });
    }
}