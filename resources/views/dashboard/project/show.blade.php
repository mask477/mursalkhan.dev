@extends('layouts.app')

@push('stylesheets')
<style>
    img.logo {
        object-fit: contain;
    }

    .logo-placeholder {
        width: 100px;
        height: 100px;
        display: flex;
        justify-content: center;
        align-items: center;
        color: white;
    }

    img.banner {
        object-fit: cover;
        width: 100%;
        height: 200px;
    }

    .banner-placeholder,
    .images-placeholder {
        width: 100%;
        height: 200px;
        display: flex;
        justify-content: center;
        align-items: center;
        color: white;
    }

    .carousel-item {
        height: 400px;
        width: 100%;
    }

    .carousel-item img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    .carousel-item form {
        position: absolute;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: 2;
        margin-bottom: 5rem;
    }
</style>

@endpush

@section('content')

<div class="col-md-8">
    <div class="card">
        <div class="card-body">
            <h1 class="card-title mb-4">
                {{ $project->name }}
            </h1>

            <h5 class="card-title">
                Logo
            </h5>
            @if($project->logo)
            <div class="text-center mb-3">
                <img src="{{ $project->logo }}" class="logo bg-secondary" width="100" height="100" />
            </div>
            @else
            <div class="d-flex justify-content-center mb-3">
                <div class="logo-placeholder bg-secondary">
                    <span>Logo</span>
                </div>
            </div>
            @endif
            <form action="{{ route('project.uploadLogo', $project->id) }}" method="POST" enctype="multipart/form-data"
                class="upload-banner-form">
                @csrf
                <div class="row justify-content-between gap-2">
                    <div class="col-md-8">
                        <input class="form-control" name="logo" type="file" id="formFile" required />
                        @error('logo')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-primary w-100">Submit</button>
                    </div>
                </div>
            </form>
            <hr>

            <h5 class="card-title">
                Banner
            </h5>
            @if($project->banner)
            <div class="bg-secondary mb-3">
                <img src="{{ $project->banner }}" class="banner" alt="...">
            </div>
            @else
            <div class="d-flex justify-content-center mb-3">
                <div class="banner-placeholder bg-secondary">
                    <span>Banner</span>
                </div>
            </div>
            @endif
            <form action="{{ route('project.uploadBanner', $project->id) }}" method="POST" enctype="multipart/form-data"
                class="upload-banner-form">
                @csrf
                <div class="row justify-content-between gap-2">
                    <div class="col-md-8">
                        <input class="form-control" name="banner" type="file" id="formFile" required />
                        @error('banner')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-primary w-100">Submit</button>
                    </div>
                </div>
            </form>
            <hr>

            <h5 class="card-title">
                Images
            </h5>
            @if(count($project->images))
            <div id="carouselIndicators" class="carousel slide bg-secondary mb-3">
                <div class="carousel-indicators">
                    @foreach ($project->images as $index => $image)
                    <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="{{ $index }}"
                        class="{{ $index==0 ? 'active' : "" }}" aria-current="true"
                        aria-label="Slide {{ $index+1 }}"></button>
                    @endforeach
                </div>
                <div class="carousel-inner">
                    @foreach ($project->images as $index => $image)
                    <div class="carousel-item {{ $index==0 ? 'active' : "" }}">
                        <form action="{{ route('project.removeImage', $project->id) }}" method="POST"
                            onsubmit="return confirm('Do you really want to delete this image?');">
                            @csrf
                            @method('delete')
                            <input type="hidden" name="image" value="{{ $image->id }}" />
                            <div class="row justify-content-center">
                                <div class="col-md-6 col-sm-8">
                                    <button class="btn btn-danger w-100">Delete Image</button>
                                </div>
                            </div>
                        </form>
                        <img src="{{ $image->url }}" class="d-block w-100" alt="...">
                    </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            @else
            <div class="d-flex justify-content-center mb-3">
                <div class="images-placeholder bg-secondary">
                    <span>There are no Images</span>
                </div>
            </div>
            @endif
            <form action="{{ route('project.uploadImage', $project->id) }}" method="POST" enctype="multipart/form-data"
                class="upload-banner-form">
                @csrf
                <div class="row justify-content-between gap-2">
                    <div class="col-md-8">
                        <input class="form-control @error('image') is-invalid @enderror" name="image" type="file"
                            id="formFile" required />
                        @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-primary w-100">Submit</button>
                    </div>
                </div>
            </form>
            <hr>

            <h5 class="card-title">Description</h5>
            <p class="card-text">{{ $project->description }}</p>
            <hr>

            <h5 class="card-title">About</h5>
            <p class="card-text">{!! $project->about !!}</p>
            <hr>

            <h5 class="card-title">Technologies:</h5>
            <p class="card-text">
                @foreach ($project->technologies as $technology)
                <span class="badge bg-secondary">{{ $technology->name }}</span>
                @endforeach
            </p>
            <hr>

            <h5 class="card-title">URL:</h5>
            <p class="card-text">
                @if($project->url)
                <a href="{{ $project->url }}" target="_blank">{{ $project->url }}</a>
                @else
                No URL
                @endif
            </p>

            <div class="row">
                <div class="col-md-6 col-sm-12 mb-3">
                    <a href="{{ route('project.edit', $project->id) }}" class="btn btn-primary w-100">
                        <i class="bi bi-pen"></i>
                        Edit
                    </a>
                </div>
                <div class="col-md-6 col-sm-12 mb-3">
                    <button class="btn btn-danger w-100">
                        <i class="bi bi-trash"></i>
                        Delete
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection