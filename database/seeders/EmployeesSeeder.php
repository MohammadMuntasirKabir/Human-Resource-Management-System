<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Designation;
use Illuminate\Support\Facades\DB;

class EmployeesSeeder extends Seeder
{
    public function run(): void
    {
        $faker = fake();

        DB::transaction(function () use ($faker) {
            Designation::chunk(100, function ($designations) use ($faker) {
                foreach ($designations as $designation) {
                    for ($i = 0; $i < 3; $i++) {
                        $designation->employees()->create([
                            'name' => $faker->name(),
                            'email' => $faker->unique()->safeEmail(),
                            'phone' => $faker->phoneNumber(),
                            'address' => $faker->address(),
                        ]);
                    }
                }
            });
        });
    }
}