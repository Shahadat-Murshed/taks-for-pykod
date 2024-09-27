<?php

namespace Database\Seeders;

use App\Models\Project\Project;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();
        foreach (range(1, 10) as $index) {
            Project::create([
                'name' => $faker->company,
                'description' => $faker->text(20),
                'status' => $faker->randomElement(['active', 'inactive', 'hold']),
                'created_by' => 1
            ]);
        }
    }
}
