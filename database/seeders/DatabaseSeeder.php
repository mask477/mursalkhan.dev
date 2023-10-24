<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Project;
use App\Models\ProjectImage;
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
                "name" => "Angular"
            ],
            [
                "name" => "django"
            ],
            [
                "name" => "React"
            ],
            [
                "name" => "Next.js"
            ],
            [
                "name" => "Vue"
            ],
            [
                "name" => "NodeJs"
            ],
            [
                "name" => "Electron"
            ],
            [
                "name" => "NestJs"
            ],
            [
                "name" => "HTML&CSS"
            ],
            [
                "name" => "Sass"
            ],
        ];

        $tech_relations = [];

        foreach ($technologies as $index => $technology) {
            $tech_relations[$technology['name']] = Technology::create($technology);
        }

        $projects = [
            [
                "name" => "MyNatur Website",
                "logo" => '/mynatur/dashboard/logo.svg',
                "banner" => '/uploads/projects/MyNatur-1.png',
                "url" => "https://www.mynatur.co/",
                "technologies" => [$tech_relations["React"], $tech_relations["Next.js"]],
                "images" => [
                    '/uploads/projects/MyNatur-2.png',
                    '/uploads/projects/MyNatur-3.png',
                    '/uploads/projects/MyNatur-4.png',
                    '/uploads/projects/MyNatur-5.png',
                    '/uploads/projects/MyNatur-6.png',
                ]
            ],
            [
                "name" => "MyNatur Dashboard",
                "logo" => '/mynatur/dashboard/logo.svg',
                "banner" => '/uploads/projects/MyNatur-Dashboard-1.png',
                "url" => '/mynatur/dashboard',
                "technologies" => [$tech_relations["React"]],
                "images" => []
            ],
            [
                "name" => "MyNatur Dashboard",
                "logo" => '/mynatur/dashboard/logo.svg',
                "banner" => '/uploads/projects/MyNatur-Dashboard-1.png',
                "url" => '/mynatur/dashboard',
                "technologies" => [$tech_relations["React"], $tech_relations["NodeJs"], $tech_relations["Electron"]],
                "images" => []
            ],
        ];

        for ($i = 0; $i < 2; $i++) {
            foreach ($projects as $project) {
                $about = "";

                $paragraphs_count = rand(1, 3);
                for ($i = 0; $i < $paragraphs_count; $i++) {
                    $about .= "Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem eos distinctio dolores suscipit incidunt, quis deleniti, quas iusto dolor repellat blanditiis! Commodi, obcaecati officia. Architecto inventore doloremque iusto hic dolorem.";
                    if ($i < $paragraphs_count - 1) {
                        $about .= "\n";
                    }
                }
                $new_project = Project::create([
                    "name" => $project["name"],
                    "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit.",
                    "about" => $about,
                    "banner" => $project["banner"],
                    "logo" => $project["logo"],
                    "url" => $project["url"],
                ]);

                if (count($project['images'])) {
                    foreach ($project['images'] as $image) {
                        ProjectImage::create([
                            "url" => $image,
                            "project_id" => $new_project->id
                        ]);
                    }
                }

                $technologies = $project['technologies'];

                $technology_ids = [];
                foreach ($technologies as $technology) {
                    $technology_ids[] = $technology->id;
                }

                $new_project->technologies()->attach($technology_ids);
            }
        }
    }
}
