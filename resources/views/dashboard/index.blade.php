@extends('layouts.app')

@section('content')

<div class="col-md-10">
    <h1>Dashboard</h1>
    <hr>
    <ul>
        <li>
            <a href="{{ route('project.index') }}">Projects</a>
        </li>
        <li>
            <a href="{{ route('technology.index') }}">Technologies</a>
        </li>
    </ul>
</div>
@endsection