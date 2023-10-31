@extends('layouts.app')

@push('stylesheets')
<style>
    .project-card {
        height: 100%;
        min-height: 30vh;
    }
</style>
@endpush

@section('content')
<div class="row g-4">
    <div class="col-lg-8 col-md-6 col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                    <h3 class="card-title m-0">
                        Projects
                    </h3>
                    <div>
                        <a href="{{ route('project.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus-lg"></i>
                            Create Project
                        </a>
                    </div>
                </div>

                <div class="row g-2">
                    @foreach ($projects as $project)
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="card project-card">
                            <div class="card-body">
                                <div class="d-flex flex-column justify-content-between h-100">
                                    <div>
                                        <h6 class="card-title">{{ $project->name }}</h6>
                                        <p class="card-text">{{ $project->description }}</p>
                                    </div>

                                    <form action="{{ route('project.destroy', $project->id) }}" method="POST"
                                        onsubmit="return confirm('Do you really want to delete this project?');">
                                        @csrf
                                        @method('delete')
                                        <div class="mb-3">
                                            @foreach ($project->technologies as $technology)
                                            <span class="badge bg-primary">{{ $technology->name }}</span>
                                            @endforeach
                                        </div>
                                        <div>
                                            <a href="{{ route('project.show', $project->id) }}"
                                                class="btn btn-sm btn-primary">
                                                <i class="bi bi-eye"></i>
                                                Show
                                            </a>
                                            <a href="{{ route('project.edit', $project->id) }}"
                                                class="btn btn-sm btn-warning">
                                                <i class="bi bi-pen"></i>
                                                Edit
                                            </a>
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="bi bi-trash"></i>
                                                Delete
                                            </button>
                                        </div>
                                    </form>
                                </div>


                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="card technologies-card">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                    <h3 class="card-title m-0">
                        Technologies
                    </h3>
                    <div>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#createTechnologyModal">
                            <i class="bi bi-plus-lg"></i>
                            Create Technology
                        </button>
                    </div>
                </div>

                <ul class="list-group">
                    @foreach ($technologies as $technology)
                    <li class="list-group-item">
                        <div class="d-flex justify-content-between" title="{{ $technology->description }}">
                            <div class="col">
                                {{ $technology->name }}
                                <span class="badge bg-primary">
                                    {{ $technology->projects_count }}
                                </span>
                            </div>

                            <div class="col d-flex justify-content-end gap-1">

                                <button class="btn btn-sm btn-warning btn-edit-technology"
                                    data-technology="{{ json_encode($technology) }}">
                                    <i class="bi bi-pen"></i>
                                </button>

                                <form action="{{ route('technology.destroy', $technology->id) }}" method="POST"
                                    onsubmit="return confirm('Do you really want to delete this technology?');">
                                    @csrf
                                    @method('delete')

                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@include('dashboard.technology.create_modal')
@include('dashboard.technology.edit_modal')
@endsection