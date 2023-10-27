@extends('partials.layout', [
"footer_title" => "Home",
"footer_url" => route('home')
])

@push('stylesheets')
<style>
    body {
        height: 100vh;
        overflow-y: hidden;
    }

    main {
        height: 100vh;
        display: flex;
        flex-direction: column
    }

    .page_404 {
        flex: 1;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center
    }
</style>
@endpush
@section('content')
<section class="page_404">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h1 class="text-center ">404</h1>
                <h3 class="h2">
                    Look like you're lost
                </h3>
                <p>the page you are looking for not is avaible!</p>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection