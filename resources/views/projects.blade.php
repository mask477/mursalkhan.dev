@extends('partials.layout', [
"footer_title" => "Are you convinced to contact me now ?",
"footer_url" => route('contact')
])

@section('content')
<section class="page-section">
    <div class="main-content">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-10">
                    <h1 class="title">Projects.</h1>
                    <br>
                    <nav class="tabs">
                        <span class="tab-list-item link active" data-tag="0">
                            All
                        </span>
                        @foreach ($technologies as $technology)
                        <span class="tab-list-item link" data-tag="{{ $technology->id }}">
                            <img src="{{ $technology->logo }}" width="15">
                            {{ $technology->name }}
                        </span>
                        @endforeach
                    </nav>

                    <div class="tab-content">
                        <div class="mansory-layout">

                            @foreach ($projects as $index => $project)
                            @php
                            $heights = ['454','310','400'];
                            $random_height = $heights[rand(0,count($heights)-1)];
                            @endphp
                            <div class="gridcell scale-up" aria-label="{{ $project->description }}"
                                style="height:{{ $random_height }}px" data-data="{{ json_encode($project) }}"
                                data-tags="{{ json_encode($project->technologies->pluck('id')) }}">


                                <img alt="{{ $project->banner }}" class="banner" loading="lazy" width="500" height="500"
                                    srcset="{{ $project->banner }}" src="{{ $project->banner }}">

                                <div class="content">
                                    <h3>{{ $index }} {{ (($index+1) % 3) == 0 }}- {{ $project->name }}</h3>
                                    <p>{{ $project->description }}</p>

                                    <p class="d-flex flex-wrap">
                                        @foreach ($project->technologies as $technology)
                                        <span class="d-block mb-1">
                                            <img src="{{ $technology->logo }}" width="10">
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
<script>
    $(".gridcell").on('click', function() {
        const project = $(this).data('data');
        const {name, description, banner, url} = project;
        const paragraphs = project.about.split("\n");
        console.log(paragraphs);
        let about = "";
        paragraphs.map(paragraph => {
            about += `<p>${paragraph}</p>`;
        });
        const technologies = project.technologies.map(tech => `<span class="d-block mb-1">${tech.name}</span>`);
        const link = `<a href="#">${project.url}</a>`;
        const sidebarHtml = `@include('partials.sidebar_modal')`;

        if(document.getElementsByClassName('sidebar-modal').length == 0) {
            $('section.page-section .main-content').append(sidebarHtml);
            $('body').css('height', '100vh');
            $('body').css('overflow-y', 'hidden');
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
                $('body').css('max-height', 'auto');
                $('body').css('overflow-y', 'auto');
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