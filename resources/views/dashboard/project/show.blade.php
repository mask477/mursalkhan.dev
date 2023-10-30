@extends('layouts.app')

@section('content')

<div class="col-md-10">
    <div class="card">
        @if($project->banner)
        <img src="{{ $project->banner }}" class="card-img-top" alt="...">
        @else
        <svg class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg"
            role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false" style="user-select: none;
            text-anchor: middle;">
            <rect width="100%" height="100%" fill="#868e96"></rect>
            <text x="50%" y="50%" fill="#dee2e6" dy=".3em">
                No Banner
            </text>
        </svg>
        @endif
        <div class="card-body">
            <h3 class="card-title">
                {{ $project->name }}
            </h3>
            <hr>

            <h5 class="card-title">Description</h5>
            <p class="card-text">{{ $project->description }}</p>
            <hr>

            <h5 class="card-title">About</h5>
            <p class="card-text">{!! $project->about !!}</p>
            <hr>



            <h5 class="card-title">URL:</h5>
            <p class="card-text">
                @if($project->url)
                <a href="{{ $project->url }}" target="_blank">{{ $project->url }}</a>
                @else
                No URL
                @endif
            </p>
        </div>
    </div>
</div>
@endsection