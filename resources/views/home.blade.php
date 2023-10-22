@extends('partials.layout')

@section('content')
<section class="page-section">
    <div class="main-content">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-12">
                    <article>
                        <div class="d-flex justify-content-center align-items-center">
                            <label class="hello">👋</label>
                            <h1 data-text="I'm Mursal  Khan" class="intro-text" style="opacity: 1; transform: none;">
                                <mark>I'm Mursal Khan</mark>
                            </h1>
                        </div>

                        @for ($i=0; $i<5; $i++) <p>a seasoned developer with a passion for problem-solving and
                            innovation. With over six years
                            of experience in the tech industry, I thrive on embracing new challenges and discovering
                            their solutions. My expertise spans a wide spectrum, from crafting intuitive user interfaces
                            to designing robust backend systems, developing mobile applications using React Native, and
                            creating desktop applications with Electron. I'm swift with languages like JavaScript and
                            PHP, proficient in a range of frameworks and libraries, including Laravel, React, and
                            Electron. Beyond code, I have a keen eye for design, ensuring that the projects I undertake
                            not only function flawlessly but also look exceptional. I'm excited to share my journey and
                            insights with you here on my website.</p>

                            <p>Feel free to reach out if you'd like to collaborate or discuss any development projects.
                                I'm
                                always eager to dive into new endeavors and contribute my expertise to create impactful
                                solutions. Thank you for visiting my website, and I look forward to connecting with you!
                            </p>
                            @endfor

                    </article>

                    <footer>
                        <a href="{{ route('about') }}">
                            About Me
                            <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd"
                                clip-rule="evenodd">
                                <path
                                    d="M21.883 12l-7.527 6.235.644.765 9-7.521-9-7.479-.645.764 7.529 6.236h-21.884v1h21.883z">
                                </path>
                            </svg>
                        </a>

                    </footer>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection