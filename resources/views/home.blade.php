@extends('partials.layout', [
"footer_title" => "About Me",
"footer_url" => route('about')
])

@section('content')
<div title="Mursal Khan" class="page-bg-title fade-in">
    <h1 class="no-highlight" aria-hidden="true">Mursal Khan</h1>
</div>
<section class="page-section">
    <div class="main-content">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-10">
                    <article class="fade-in">
                        <div class="d-flex justify-content-center align-items-center">
                            <label class="hello">👋</label>
                            <h1 data-text="I'm Mursal  Khan" class="intro-text fade-in"
                                style="opacity: 1; transform: none;">
                                <mark>I'm Mursal Khan</mark>
                            </h1>
                        </div>

                        <p>A seasoned developer with a passion for problem-solving and
                            innovation. With over six years
                            of experience in the tech industry, I thrive on embracing new challenges and discovering
                            their solutions. My expertise spans a wide spectrum, from crafting intuitive user interfaces
                            to designing robust backend systems, developing mobile applications using React Native, and
                            creating desktop applications with Electron. I'm swift with languages like JavaScript and
                            PHP, proficient in a range of frameworks and libraries, including Laravel, React, and
                            Electron. Beyond code, I have a keen eye for design, ensuring that the projects I undertake
                            not only function flawlessly but also look exceptional. I'm excited to share my journey and
                            insights with you here on my website.</p>

                        <p>Feel free to reach out if you'd like to collaborate or discuss any
                            development projects.
                            I'm
                            always eager to dive into new endeavors and contribute my expertise to create impactful
                            solutions. Thank you for visiting my website, and I look forward to connecting with you!
                        </p>


                    </article>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection