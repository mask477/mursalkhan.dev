@extends('layouts.app')

@section('content')

<div class="col-md-10">
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Projects</h3>

            <table class="table table-hover table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Logo</th>
                        <th scope="col">Banner</th>
                        <th scope="col">Technologies</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                    <tr>
                        <td>{{ $project->id }}</td>
                        <td>{{ $project->name }}</td>
                        <td class="bg-primary">
                            <img src="{{ $project->logo }}" width="70" height="70" style="object-fit: contain" />
                        </td>
                        <td>
                            <button class="btn btn-outline-primary banner-btn" data-src="{{ $project->banner }}">
                                Banner
                            </button>
                        </td>
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
                                <a href="{{ route('project.show', $project->id) }}"
                                    class="btn btn-sm btn-primary">Show</a>
                                <a href="{{ route('project.edit', $project->id) }}"
                                    class="btn btn-sm btn-warning">Edit</a>
                                <button type="submit" href="{{ route('project.show', $project->id) }}"
                                    class="btn btn-sm btn-danger">Delete</button>
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
                        <th>Logo</th>
                        <th>Banner</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<div class="modal" tabindex="-1" role="dialog" id="bannerModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Banner</h5>
                <button type="button" class="close" data-dismiss="modal" data-target="#bannerModal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="" id="modalImg" style="width: 100%">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                    data-target="#bannerModal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $('.banner-btn').click(function () {
            const src = $(this).data('src');
            $("#modalImg").attr('src', src);
            $('#bannerModal').modal();
        });
</script>
@endpush