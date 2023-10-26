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
            [
                "name" => "Angular",
                "description" => "The web development framework for building the future."
            ],
            [
                "name" => "AWS",
                "description" => "AWS provides servers, storage, networking, remote computing, email, mobile development, and security."
            ],
            [
                "name" => "GCP",
                "description" => "Google Cloud Platform, offered by Google, is a suite of cloud computing services that provides a series of modular cloud services."
            ],
            [
                "name" => "Firebase",
                "description" => "Firebase is an app development platform that helps you build and grow apps and games users love."
            ],
            [
                "name" => "django",
                "description" => "Django is a high-level Python web framework that encourages rapid development and clean, pragmatic design."
            ],
            [
                "name" => "React",
                "description" => "The library for web and native user interfaces."
            ],
            [
                "name" => "React Native",
                "description" => "React Native combines the best parts of native development with React, a best-in-class JavaScript library for building user interfaces."
            ],
            [
                "name" => "Next.js",
                "description" => "Next.js enables you to create full-stack Web applications by extending the latest React features, and integrating powerful Rust-based JavaScript tooling for the fastest builds."
            ],
            [
                "name" => "Vue.js",
                "description" => "Vue.js - The Progressive JavaScript Framework."
            ],
            [
                "name" => "NodeJs",
                "description" => "Node.js® is an open-source, cross-platform JavaScript runtime environment."
            ],
            [
                "name" => "Electron.js",
                "description" => "Build cross-platform desktop apps with JavaScript, HTML, and CSS."
            ],
            [
                "name" => "NestJs",
                "description" => "CSS with superpowers. Sass is the most mature, stable, and powerful professional grade CSS extension language in the world."
            ],
            [
                "name" => "HTML&CSS",
                "description" => ""
            ],
            [
                "name" => "Bootstrap",
                "description" => "Bootstrap is a free, open source front-end development framework for the creation of websites and web apps. Designed to enable responsive development of mobile-first websites, Bootstrap provides a collection of syntax for template designs."
            ],
            [
                "name" => "Sass",
                "description" => "CSS with superpowers. Sass is the most mature, stable, and powerful professional grade CSS extension language in the world."
            ],
            [
                "name" => "Strapi",
                "description" => "Strapi is the next-gen headless CMS, open-source, javascript, enabling content-rich experiences to be created, managed and exposed to any digital device."
            ],
            [
                "name" => "MySql",
                "description" => ""
            ],
            [
                "name" => "SQLite",
                "description" => ""
            ],
            [
                "name" => "MongoDb",
                "description" => "MongoDB is a document database with the scalability and flexibility that you want with the querying and indexing that you need."
            ],
            [
                "name" => "Socket.IO",
                "description" => "Bidirectional and low-latency communication for every platform."
            ],
            [
                "name" => "Wordpress",
                "description" => "WordPress is a content management system (CMS) based on PHP that allows you to host and build websites."
            ],
            [
                "name" => "Laravel",
                "description" => "Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, and caching."
            ],
        ];

        $technologies = [];

        foreach ($tech as $technology) {
            $technologies[$technology["name"]] = Technology::create($technology);
        }

        $projects = [
            [
                "name" => "MyNatur Website",
                "description" => "Track, reduce, and offset the emissions of everything you consume.",
                "logo" => '/mynatur/dashboard/logo.svg',
                "banner" => '/uploads/projects/MyNatur-1.png',
                "url" => "https://www.mynatur.co/",
                "images" => [
                    '/uploads/projects/MyNatur-2.png',
                    '/uploads/projects/MyNatur-3.png',
                    '/uploads/projects/MyNatur-4.png',
                    '/uploads/projects/MyNatur-5.png',
                    '/uploads/projects/MyNatur-6.png',
                ],
                "technologies" => [
                    $technologies["Next.js"]->id,
                    $technologies["React"]->id,
                    $technologies["Bootstrap"]->id,
                    $technologies["Sass"]->id,
                    $technologies["Strapi"]->id,
                ],
                "about" => "
                    <p>The project commenced with the client's initial request for a React-based website, along with provided Figma design files. Recognizing potential SEO-related challenges, I recommended using Next.js, a server-side rendering framework. The client agreed, and within one week, I successfully translated the Figma designs into functional pages.</p>
                    <p>The subsequent week was dedicated to creating a backend to ensure content flexibility, with the client's specific request for a contentful website. Opting for simplicity, I chose Strapi, a user-friendly platform for drag-and-drop functionality, enabling versatile deployment options.</p>
                ",
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
                "description" => $project["description"],
                "about" => $project["about"],
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


            $new_project->technologies()->attach($project["technologies"]);

            // $project_technologies = [];

            // for ($i = 0; $i < rand(2, 4); $i++) {
            //     $project_technologies[] = $technologies[rand(0, count($technologies) - 1)];
            // }

            // $technology_ids = [];
            // foreach ($project_technologies as $technology) {
            //     $technology_ids[] = $technology->id;
            // }

            // $new_project->technologies()->attach($technology_ids);
        }
    }
}
