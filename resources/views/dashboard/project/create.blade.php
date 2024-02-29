@extends('layouts.app')

@push('stylesheets')
<link rel="stylesheet" href="{{ asset('css/tich-text-editor.css') }}" />
@endpush

@section('content')

<div class="col-md-10">
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">
                Create Project
            </h3>

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="{{ route('project.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name"
                        placeholder="Project Name" value="{{ old('name') }}" required />
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="type" class="form-label">Type:</label>
                    <select name="type" class="form-select @error('type') is-invalid @enderror" id="type"
                        aria-describedby="typeHelp" placeholder="Enter type" required>
                        <option value="" disabled hidden selected>Select Type</option>
                        <option value="Web" @selected(old('type')=='Web' )>Web Application</option>
                        <option value="Mobile" @selected(old('type')=='Mobile' )>Mobile Application</option>
                        <option value="Desktop" @selected(old('type')=='Desktop' )>Desktop Application</option>
                    </select>

                    @error('type')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="desscription" class="form-label">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                        id="description" rows="2" required>{{ old('description') }}</textarea>

                    @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="about">About:</label>
                    <textarea class="form-control @error('about') is-invalid @enderror" name="about" id="about" rows="5"
                        required>{{ old('about') }}</textarea>

                    @error('about')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>


                <div class="mb-3">
                    <div class="card @error('technologies') border border-danger @enderror">
                        <div class="card-body">
                            <h5 class="card-title">
                                Technologies
                            </h5>
                            <div class="d-flex flex-wrap gap-1" id="selectedTechnologies">
                                @foreach ($technologies as $technology)
                                @if(old('technologies') && in_array($technology->id, old('technologies')))
                                <button type="button" class="btn btn-sm btn-primary btn-block btn-technology">
                                    {{ $technology->name }}
                                    <input type="hidden" name="technologies[]" value="{{ $technology->id }}" />
                                </button>
                                @endif
                                @endforeach
                            </div>
                            <hr>
                            <div class="d-flex flex-wrap gap-1" id="existingTechnologies">
                                @foreach ($technologies as $technology)
                                <button type="button" class="btn btn-sm btn-primary btn-block btn-technology">
                                    {{ $technology->name }}
                                    <input type="hidden" name="technologies[]" value="{{ $technology->id }}" disabled />
                                </button>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @error('technologies')
                    <input type="hidden" class="is-invalid">
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                {{-- <div class="form-group">
                    <label for="banner">Logo:</label>
                    <input type="file" name="logo" class="form-control-file" id="logo" aria-describedby="logoHelp"
                        placeholder="Enter logo">

                    @error('logo')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="banner">Banner:</label>
                    <input type="file" name="bannmer" class="form-control-file" id="bannmer"
                        aria-describedby="bannmerHelp" placeholder="Enter bannmer">

                    @error('banner')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div> --}}
                <div class="mb-3">
                    <label for="url">URl:</label>
                    <input type="text" name="url" class="form-control @error('url') is-invalid @enderror" id="url"
                        placeholder="Enter url" value="{{ old('url') }}">

                    @error('url')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    let selectedTechnologies = [];

    $('.btn-technology').click(function () {
        const technology = $(this).data('data');

        if($(this).parent().attr('id') == 'existingTechnologies') {
            $(this).detach().appendTo('#selectedTechnologies');
            $(this).children('input').attr('disabled', false);
        } else {
            $(this).detach().appendTo('#existingTechnologies');
            $(this).children('input').attr('disabled', true);
        }
    });
</script>
@endpush