@extends('partials.layout', [
"footer_title" => "Lets Continue To My Projects",
"footer_url" => route('projects')
])

@section('content')
<div title="About Me" class="page-bg-title">
    <h1 class="no-highlight" aria-hidden="true">About Me</h1>
</div>
<div class="page-section">
    <div class="main-content">

        <section aria-label="You are now in my professional background section">
            <div class="container mb-5">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-10">
                        <h1 class="title">About Me.</h1>
                        <br>
                        <p>
                            👋 Hello, I'm Mursal Khan, a highly skilled Full Stack Developer specializing in JavaScript,
                            React,
                            React Native, NestJS, Next.js, and Socket.io, with expertise in UI/UX, PHP, Laravel, and
                            databases (MySQL, MongoDB, PostgreSQL). My focus is on high-quality, scalable web and mobile
                            apps. I create user-friendly interfaces, implement complex features, and excel in real-time
                            communication. Let's work together to bring your ideas to life!
                        </p>
                        <article>
                            <ul class="timeline">
                                <li>
                                    <a target="_blank" rel="noopener noreferrer" aria-label="Open Markytech Link"
                                        href="https://markytech.com/">
                                        <h4>Cheif Technology Officer | MarkyTech</h4>
                                    </a>
                                    <h5>April 2022 - Present</h5>
                                    <p>
                                        Markytech is an all-in-one solution that provides you with all the things you
                                        need:
                                        social media marketing, web and mobile app development, and business
                                        development.
                                    </p>
                                </li>
                                <li>
                                    <a target="_blank" rel="noopener noreferrer" aria-label="Open Consolidata Link"
                                        href="https://consolidata.ai/">
                                        <h4>Chief Technology Officer | Consolidata</h4>
                                    </a>
                                    <h5>April 2022 - Present</h5>
                                    <p>
                                        Agencies today use multiple tools to get their customers results. Unfortunately,
                                        many agencies are still reliant on Google sheets and Excel for reporting due to
                                        their flexibility with custom formulas.
                                    </p>
                                    <p>
                                        Consolidata allows you to pull data from multiple ad platforms, Stripe, &
                                        GoHighLevel to create beautiful flexible reports. Think of it like merging
                                        spreadsheets and a funnel builder together.
                                    </p>
                                    <p>
                                        Merge data such as Facebook Ad Spend with GoHighLevel Leads to get a true Cost
                                        Per
                                        Lead!
                                    </p>
                                </li>
                                <li>
                                    <a target="_blank" rel="noopener noreferrer" aria-label="Open Akvateq Link"
                                        href="https://akvateq.com/">
                                        <h4>Co-Founder & Chief Technology Officer | Akvateq</h4>
                                    </a>
                                    <h5>November 2021 - July 2022</h5>
                                </li>
                                <li>
                                    <a target="_blank" rel="noopener noreferrer" aria-label="Open Sudoware Link"
                                        href="https://sudoware.co/">
                                        <h4>Co-Founder & Chief Operating Officer | Sudoware</h4>
                                    </a>
                                    <h5>April 2017 - August 2021</h5>
                                </li>
                                <li>
                                    <h4>Graphic Designer | Edvolution</h4>
                                    <h5>January 2016 - December 2016</h5>
                                    <p>
                                        As a part of my Social Internship, I was working at Edvolution as a Graphics
                                        Designer.
                                    </p>
                                </li>
                            </ul>


                        </article>
                    </div>
                </div>
            </div>
        </section>
        <section aria-label="You are now in my educational background section">
            <div class="container mb-5">

                <div class="row align-items-center justify-content-center">
                    <div class="col-md-10">

                        <h2 class="title">Education</h2>
                        <br>

                        <ul class="timeline">
                            <li>
                                <h3>School | St. Patrick's High School</h3>
                                <h5>Year 2002 - 2012</h5>
                            </li>
                            <li>
                                <h3>College | Defence Authority SKBZ College</h3>
                                <h5>Year 2012 - 2014</h5>
                            </li>
                            <li>
                                <h3>Graduation | Institute of Business Administration</h3>
                                <h5>Year 2015 - 2018</h5>
                            </li>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection