@extends('layouts.app')

@section('content')

<div class="col-md-10">
    <h1>Dashboard</h1>
    <hr>
    <ul>
        <li>
            <a href="{{ route('projects.index') }}">Projects</a>
        </li>
        <li>
            <a href="{{ route('projects.index') }}">Technologies</a>
        </li>
    </ul>
</div>
@endsection