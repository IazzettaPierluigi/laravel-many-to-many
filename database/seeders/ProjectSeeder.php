<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;
use App\Models\Project;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            $project = new Project();

            $faker = \Faker\Factory::create();

            $project->title = $faker->sentence(4);
            $project->img = 'https://picsum.photos/200';
            $project->description = $faker->text(500);
            $project->software = $faker->randomElement(['HTML', 'CSS', 'JavaScript', 'PHP', 'Laravel', 'Vue'], 2);
            $project->slug = Str::slug($project->title, '-');

            $project->save();
        }
    }
}
