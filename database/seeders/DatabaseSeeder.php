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
        $tech = [
            "Angular",
            "django",
            "React",
            "Next.js",
            "Vue",
            "NodeJs",
            "Electron",
            "NestJs",
            "HTML&CSS",
            "Sass"
        ];

        $technologies = [];

        foreach ($tech as $technology) {
            $technologies[] = Technology::create(["name" => $technology]);
        }

        $projects = [
            [
                "name" => "MyNatur Website",
                "logo" => '/mynatur/dashboard/logo.svg',
                "banner" => '/uploads/projects/MyNatur-1.png',
                "url" => "https://www.mynatur.co/",
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
                "banner" => '/uploads/projects/MyNatur-2.png',
                "url" => '/mynatur/dashboard',
                "images" => [
                    '/uploads/projects/MyNatur-2.png',
                    '/uploads/projects/MyNatur-3.png',
                    '/uploads/projects/MyNatur-4.png',
                    '/uploads/projects/MyNatur-5.png',
                    '/uploads/projects/MyNatur-6.png',
                ]
            ],
        ];

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

            $project_technologies = [];

            for ($i = 0; $i < rand(2, 4); $i++) {
                $project_technologies[] = $technologies[rand(0, count($technologies) - 1)];
            }

            $technology_ids = [];
            foreach ($project_technologies as $technology) {
                $technology_ids[] = $technology->id;
            }

            $new_project->technologies()->attach($technology_ids);
        }
    }
}
