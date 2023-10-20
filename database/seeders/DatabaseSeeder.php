<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Project;
use App\Models\Technology;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $technologies = [
            [
                "name" => "Angular",
                "logo" => '/technologies/Angular.png',
            ],
            [
                "name" => "django",
                "logo" => '/technologies/django.png',
            ],
            [
                "name" => "React",
                "logo" => '/technologies/React.png',
            ],
            [
                "name" => "Next.js",
                "logo" => '/technologies/Nextjs.png',
            ],
            [
                "name" => "Vue",
                "logo" => '/technologies/Vue.png',
            ],
            [
                "name" => "NodeJs",
                "logo" => '/technologies/Node.png',
            ],
            [
                "name" => "Electron",
                "logo" => '/technologies/Electron.png',
            ],
            [
                "name" => "NestJs",
                "logo" => '/technologies/Nest.png',
            ],
        ];

        $tech_relations = [];

        foreach ($technologies as $index => $technology) {
            $tech_relations[$technology['name']] = Technology::create($technology);
        }

        $projects = [
            [
                "name" => "MyNatur Dashboard",
                "image" => '/mynatur/dashboard/logo.svg',
                "url" => '/mynatur/dashboard',
                "technologies" => [$tech_relations["React"]]
            ],
            [
                "name" => "MyNatur Website",
                "image" => '/mynatur/dashboard/logo.svg',
                "url" => "https://www.mynatur.co/",
                "technologies" => [$tech_relations["React"], $tech_relations["Next.js"]]
            ],
        ];

        foreach ($projects as $project) {
            $new_project = Project::create([
                "name" => $project["name"],
                "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem eos distinctio dolores suscipit incidunt, quis deleniti, quas iusto dolor repellat blanditiis! Commodi, obcaecati officia. Architecto inventore doloremque iusto hic dolorem.",
                "image" => $project["image"],
                "url" => $project["url"],
            ]);

            $technologies = $project['technologies'];

            $technology_ids = [];
            foreach ($technologies as $technology) {
                $technology_ids[] = $technology->id;
            }

            $new_project->technologies()->attach($technology_ids);
        }
    }
}
