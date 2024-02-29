<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Project;
use App\Models\ProjectImage;
use App\Models\Technology;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::create([
            "name" => "Admin",
            "email" => "admin@mursalkhan.dev",
            "password" => bcrypt("123456"),
        ]);

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
                "type" => "Web",
                "description" => "Track, reduce, and offset the emissions of everything you consume.",
                "logo" => '/uploads/MyNatur Dashboard/logo.webp',
                "banner" => '/uploads/MyNatur Website/1.webp',
                "url" => "https://www.mynatur.co/",
                "images" => [
                    '/uploads/MyNatur Website/1.webp',
                    '/uploads/MyNatur Website/2.webp',
                    '/uploads/MyNatur Website/3.webp',
                    '/uploads/MyNatur Website/4.webp',
                    '/uploads/MyNatur Website/5.webp',
                    '/uploads/MyNatur Website/6.webp',
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
            [
                "name" => "MyNatur Dashboard",
                "type" => "Web",
                "description" => "Empowering users to calculate their carbon footprint and make environmentally conscious donations to environmental foundations.",
                "logo" => '/uploads/MyNatur Dashboard/logo.webp',
                "banner" => '/uploads/MyNatur Dashboard/1.webp',
                "url" => "https://mursalkhan.dev/mynatur/dashboard/",
                "images" => [
                    '/uploads/MyNatur Dashboard/1.webp',
                    '/uploads/MyNatur Dashboard/2.webp',
                    '/uploads/MyNatur Dashboard/3.webp',
                    '/uploads/MyNatur Dashboard/4.webp',
                    '/uploads/MyNatur Dashboard/5.webp',
                    '/uploads/MyNatur Dashboard/6.webp',
                    '/uploads/MyNatur Dashboard/7.webp',
                    '/uploads/MyNatur Dashboard/8.webp',
                ],
                "technologies" => [
                    $technologies["React"]->id,
                    $technologies["Bootstrap"]->id,
                    $technologies["Sass"]->id,
                    $technologies["AWS"]->id,
                ],
                "about" => "
                <p>This project was conceived to facilitate user donations to environmental foundations. Users sign up and undergo an onboarding process, answering questions related to their house size, travel habits, fuel consumption, dietary choices, pet ownership, and shopping behavior. These responses are utilized to compute the user's carbon footprint, enabling them to gauge the recommended donation amount.</p>
                <p>The dashboard was constructed using React and employed Ant Design UI components to align with the Figma design specifications. Some components required custom adjustments to achieve design fidelity. State management was accomplished using React Context API.</p>
                <p>For authentication, AWS Cognito was integrated, and the backend infrastructure was hosted on AWS, utilizing GraphQL for API integration. Payment processing and bank account transaction data retrieval were facilitated through Plaid and Stripe, enhancing the carbon footprint calculation process.</p>
                ",
            ],
            [
                "name" => "Consolidata",
                "type" => "Web",
                "description" => "The Last Reporting Tool You Will Ever Need!",
                "logo" => '/uploads/Consolidata/logo.webp',
                "banner" => '/uploads/Consolidata/1.webp',
                "url" => "https://app.consolidata.ai/",
                "images" => [
                    '/uploads/Consolidata/1.webp',
                    '/uploads/Consolidata/2.webp',
                    '/uploads/Consolidata/3.webp',
                    '/uploads/Consolidata/4.webp',
                ],
                "technologies" => [
                    $technologies["Laravel"]->id,
                    $technologies["Bootstrap"]->id,
                    $technologies["Sass"]->id,
                    $technologies["React"]->id,
                    $technologies["GCP"]->id,
                ],
                "about" => "
                <p>Consolidata: Your Data-Driven Dashboard Solution</p>
                <p>Consolidata is a versatile online tool designed for the creation of dynamic, interactive dashboard reports. This innovative platform allows users to effortlessly source data from various platforms such as Facebook Marketplace, Google Ads, and GoHighLevel. With its array of automation tools and drag-and-drop widgets, Consolidata streamlines the reporting process, offering a comprehensive integration experience with platforms like Facebook, Google, and GoHighLevel CRM.</p>
                <p>Originally built on Laravel with Google Sheets integration, the overwhelming demand for custom dashboards prompted a swift response. To meet this need, we seamlessly integrated React into the platform, creating a fully-fledged dashboard feature. The entire dashboard is constructed using React.js, complete with vanilla CSS and drag-and-drop functionality, drawing inspiration from the popular <a href='https://elementor.com/' target='_blank'>Elementor WordPress Plugin</a>.</p>
                <p>Behind the scenes, Consolidata boasts a sophisticated backend infrastructure, anchored by MySQL as the primary database. A background routine continuously fetches the latest statistics from the user's chosen data sources, ensuring that your dashboards are always up to date with real-time insights.</p>
                ",
            ],
            [
                "name" => "KhataApp",
                "type" => "Mobile",
                "description" => "Your trusted, free, and secure digital solution for simplifying credit book management in Pakistan.",
                "logo" => "/uploads/KhataApp/logo.webp",
                "banner" => '/uploads/KhataApp/banner.webp',
                "url" => "https://khatapp.com/",
                "images" => [
                    '/uploads/KhataApp/1.webp',
                    '/uploads/KhataApp/2.webp',
                    '/uploads/KhataApp/3.webp',
                    '/uploads/KhataApp/4.webp',
                    '/uploads/KhataApp/5.webp',
                    '/uploads/KhataApp/6.webp',
                ],
                "technologies" => [
                    $technologies["React Native"]->id,
                    $technologies["SQLite"]->id,
                    $technologies["AWS"]->id
                ],
                "about" => "
                    <p>Introducing KhataApp: The Ultimate Ledger Management Solution on Your Mobile</p>
                    <p>KhataApp is an offline first go-to mobile application for efficiently managing both personal and business ledgers, all within the convenience of your smartphone. This powerful tool offers a range of features designed to streamline your ledger management process:</p>
                    <ul>
                        <li><b>Collection Reminders:</b> Accelerate credit return with timely WhatsApp reminders.</li>
                        <li><b>Offline Support:</b> KhataApp is engineered for seamless functionality, even without network connectivity, ensuring uninterrupted usage.</li>
                        <li><b>Multi-Language Support:</b> Communicate with your customers in their preferred language with Khata available in English, Urdu, Sindhi, Gujrati, Roman, and Pashto.</li>
                        <li><b>Ledger Maintenance:</b> Easily record and monitor credit transactions extended to your customers.</li>
                        <li><b>Collaborative Ledger:</b> Share your ledger with colleagues for continuous credit transaction management.</li>
                    </ul>
                    <p>KhataApp is built using ReactNative with SQLite as its primary data source. It boasts a two-way synchronization that operates in the background, ensuring data accuracy. The authentication module is powered by AWS Cognito with OTP login, while AWS Cloud functions with DynamoDB provide robust backend support.</p>
                ",
            ],
            [
                "name" => "Houser",
                "type" => "Mobile",
                "description" => "Your app for confident, data-driven property buying decisions.",
                "logo" => '/uploads/Houser/logo.webp',
                "banner" => '/uploads/Houser/1.webp',
                "url" => NULL,
                "images" => [
                    '/uploads/Houser/1.webp',
                    '/uploads/Houser/2.webp',
                    '/uploads/Houser/3.webp',
                    '/uploads/Houser/4.webp',
                ],
                "technologies" => [
                    $technologies["React Native"]->id,
                    $technologies["Firebase"]->id,
                ],
                "about" => "
                    <p>
                    The Houser is a versatile mobile application that empowers users to evaluate and rank properties based on their unique preferences. By answering a customized set of property-related questions, you can determine your property's score. You have the flexibility to create your own set of questions and assign scores to each option, allowing for a tailored and informative property assessment.
                    </p>
                    <p>
                    This serverless React Native app leverages Firebase as its data source and authentication platform. Notably, the project began without predefined UI/UX designs, resulting in an on-the-fly design process as new screens were developed to complete the application's flow. The Houser app is your key to making well-informed property decisions based on your individual needs and priorities.
                    </p>

                ",
            ],
            [
                "name" => "Attorney Needs",
                "type" => "Web",
                "description" => "We help you in finding the right attorney for you. Our service is completely free.",
                "logo" => '/uploads/Attorney Needs/logo.webp',
                "banner" => '/uploads/Attorney Needs/1.webp',
                "url" => "https://attorneyneeds.com/",
                "images" => [
                    '/uploads/Attorney Needs/1.webp',
                    '/uploads/Attorney Needs/2.webp',
                    '/uploads/Attorney Needs/3.webp',
                    '/uploads/Attorney Needs/4.webp',
                    '/uploads/Attorney Needs/5.webp',
                    '/uploads/Attorney Needs/6.webp',
                    '/uploads/Attorney Needs/7.webp',
                ],
                "technologies" => [
                    $technologies["Wordpress"]->id,
                    $technologies["Bootstrap"]->id,
                ],
                "about" => "
                    <p>
                    The Houser is a versatile mobile application that empowers users to evaluate and rank properties based on their unique preferences. By answering a customized set of property-related questions, you can determine your property's score. You have the flexibility to create your own set of questions and assign scores to each option, allowing for a tailored and informative property assessment.
                    </p>
                    <p>
                    This serverless React Native app leverages Firebase as its data source and authentication platform. Notably, the project began without predefined UI/UX designs, resulting in an on-the-fly design process as new screens were developed to complete the application's flow. The Houser app is your key to making well-informed property decisions based on your individual needs and priorities.
                    </p>

                ",
            ],
        ];

        foreach ($projects as $project) {
            $new_project = Project::create([
                "name" => $project["name"],
                "type" => $project["type"],
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
        }
    }
}
