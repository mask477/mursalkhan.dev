@extends('partials.layout', [
"footer_title" => "Are you convinced to contact me now ?",
"footer_url" => route('contact')
])

@push('stylesheets')
<link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet">
@endpush

@section('content')
<div title="Projects" class="page-bg-title verticle">
    <h1 class="no-highlight" aria-hidden="true">Projects</h1>
</div>
<section class="page-section">
    <div class="main-content">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-10">
                    <h1 class="title">Projects.</h1>

                    <br>

                    <nav class="tabs">
                        <button class="tab-list-item link active" data-tag="0">
                            <div>
                                All <span class="badge">{{ count($projects) }}</span>
                            </div>
                        </button>
                        @foreach ($technologies as $technology)
                        <button class="tab-list-item link" data-tag="{{ $technology->id }}"
                            title="{{ $technology->description }}">
                            <div>
                                {{ $technology->name }} <span class="badge">{{ $technology->projects_count
                                    }}</span>
                            </div>
                        </button>
                        @endforeach
                    </nav>

                    <div class="tab-content">
                        <div class="mansory-layout">

                            @foreach ($projects as $index => $project)
                            @php
                            $heights = ['425','400'];
                            $random_height = $heights[rand(0,count($heights)-1)];
                            if($project->type == "Mobile") {
                            $random_height = "500";
                            }
                            @endphp
                            <div class="gridcell scale-up" aria-label="{{ $project->description }}"
                                style="height:{{ $random_height }}px" data-data="{{ json_encode($project) }}"
                                data-tags="{{ json_encode($project->technologies->pluck('id')) }}">

                                <img alt="{{ $project->banner }}" class="banner" {{ $index < 2 ? 'loading="lazy"' : ""
                                    }} width="500" height="500" srcset="{{ $project->banner }}"
                                    src="{{ $project->banner }}">

                                <div class="content">
                                    @if($project->logo)
                                    <img src="{{ $project->logo }}" width="100" heigth="100"
                                        alt="{{ $project->name }} logo">
                                    @endif
                                    <h3>{{ $project->name }}</h3>
                                    <p>{{ $project->description }}</p>

                                    <p class="d-flex flex-wrap">
                                        <span class="d-block mb-1">
                                            {{ $project->type }} Application
                                        </span>
                                        @foreach ($project->technologies as $technology)
                                        <span class="d-block mb-1">
                                            {{ $technology->name }}
                                        </span>
                                        @endforeach
                                    </p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
<script>
    $(".gridcell").on('click', function() {
        const project = $(this).data('data');
        console.log("PROJECTS:", project);

        const {name, description, images, url, type} = project;

        let slider = `
            <section class="splide ${type}" aria-label="Splide Basic HTML Example">
                <div class="splide__track">
                    <ul class="splide__list">
        `;
        images.map(image => {
            slider += `
                <li class="splide__slide">
                    <div>
                        <img src="${image.url}" class="img-bg"/>
                    </div>
                </li>
            `;
        })
        slider += `</ul></div></section>`;

        const paragraphs = project.about.split("\n");
        const about = project.about;

        let technologies = ``;
        project.technologies.map(tech => technologies += `<span class="d-block mb-1" title="${tech.description}">${tech.name}</span>`);

        const link = project.url;
        const sidebarHtml = `@include('partials.sidebar_modal')`;

        if(document.getElementsByClassName('sidebar-modal').length == 0) {
            $('section.page-section .main-content').append(sidebarHtml);
            $('body').css('height', '100vh');
            $('body').css('overflow-y', 'hidden');

            new Splide('.splide', {
                type: 'loop'
            }).mount();
        }
    });

    $(".tab-list-item").on('click', function() {
        const tag = $(this).data('tag');
        filterProjects(tag);
    });

    $('body').on('click', '.close-project-btn', closeSidebar);
    $('body').on('click', '.sidebar-modal .overlay', closeSidebar);

    function closeSidebar() {
        const aside = $("aside.fade-in-left");

        if (aside) {
            $(aside).removeClass("fade-in-left");
            $(aside).addClass("fade-out-left");
            $(".sidebar-modal div.overlay").addClass("fade-out");
            setTimeout(() => {
                $(".sidebar-modal").remove();
                $('body').attr('style', '');
            }, 500);
        }
    }

    $(document).ready(function() {
        setTimeout(() => {
            $('.gridcell').removeClass('scale-up');
        }, 500);
    });

    function filterProjects(tag) {
        $('.gridcell').addClass('scale-down');

        $('.gridcell').each(function() {
            const tags = $(this).data('tags');
            $(this).hide();

            if(tags.includes(tag) || tag == 0) {
                $(this).removeClass('scale-down');
                $(this).addClass('scale-up');
                $(this).show();
            }
        });

        setTimeout(() => {
            $('.gridcell').removeClass('scale-up');
            $('.gridcell').removeClass('scale-down');
        }, 500);
    }
</script>

@endpush