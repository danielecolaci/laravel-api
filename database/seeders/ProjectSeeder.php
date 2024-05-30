<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 10; $i++) {
            $project = new Project();
            $project->title = $faker->words(4, true);
            $project->subtitle = $faker->sentence();
            $project->description = $faker->text(400);
            $project->image = $faker->imageUrl(600, 300, 'Projects', true, $project->title, true, 'jpg');
            $project->url_code = $faker->url();
            $project->url_web = $faker->url();
            $project->save();
        }
    }
}
