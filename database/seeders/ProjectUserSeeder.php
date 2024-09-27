<?php

namespace Database\Seeders;

use App\Models\Project\Project;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $projects = Project::all();

        foreach ($projects as $project) {
            $randomUserId = $users->random()->id;
            $project->users()->attach($randomUserId, ['assigned_by' => 1]);
        }
    }
}
