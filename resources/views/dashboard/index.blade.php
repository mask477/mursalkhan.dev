@extends('layouts.app')

@push('stylesheets')
<style>
    .project-card {
        height: 100%;
        min-height: 30vh;
    }

    /* .technologies-card .card-body {
        max-height: 80vh;
        overflow-y: auto;
    } */
</style>
@endpush

@section('content')
<div class="row g-4">
    <div class="col-lg-8 col-md-6 col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between ">
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
                <hr>

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
                                        <button type="submit" href="{{ route('project.show', $project->id) }}"
                                            class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash"></i>
                                            Delete
                                        </button>
                                    </form>
                                </div>


                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                {{--
                <table class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Technologies</th>
                            <th scope="col" width="35%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                        <tr>
                            <td>{{ $project->id }}</td>
                            <td>{{ $project->name }}</td>
                            <td>
                                @foreach ($project->technologies as $technology)
                                <a class="badge bg-primary text-white"
                                    href="{{ route('technology.show', $technology->id) }}">
                                    <span>{{ $technology->name }}</span>
                                </a>
                                @endforeach
                            </td>
                            <td>
                                <form action="{{ route('project.destroy', $project->id) }}" action="DELETE">
                                    <a href="{{ route('project.show', $project->id) }}" class="btn btn-sm btn-primary">
                                        <i class="bi bi-eye"></i>
                                        Show
                                    </a>
                                    <a href="{{ route('project.edit', $project->id) }}" class="btn btn-sm btn-warning">
                                        <i class="bi bi-pen"></i>
                                        Edit
                                    </a>
                                    <button type="submit" href="{{ route('project.show', $project->id) }}"
                                        class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash"></i>
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Technologies</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
                --}}
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="card technologies-card">
            <div class="card-body">
                <div class="d-flex justify-content-between ">
                    <h3 class="card-title m-0">
                        Technologies
                    </h3>
                    <div>
                        <a href="{{ route('project.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus-lg"></i>
                            Create Project
                        </a>
                    </div>
                </div>

                <hr>

                <ul class="list-group">
                    @foreach ($technologies as $technology)
                    <li class="list-group-item">
                        <div class="d-flex justify-content-between">
                            <div>
                                {{ $technology->name }}
                            </div>

                            <span class="badge bg-primary">
                                {{ $technology->projects_count }}
                            </span>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection