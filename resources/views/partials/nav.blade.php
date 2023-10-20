<header class="header">
    <nav class="navbar navbar-expand-lg bg-dark navbar-light">
        <div class="container">
            <a href="{{ route('home') }}" class="navbar-brand" aria-label="{{ env('APP_NAME') }} Home">
                <svg class="navbrand-logo" width="100" height="100" viewBox="0 0 974 494" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M35.5 0.494768C33.85 0.735768 29.332 2.39576 25.459 4.18276C12.519 10.1568 3.275 22.4858 1.035 36.7568C0.365 41.0298 0.0130004 119.223 0.00800037 265.007L0 486.757H43.497H86.993L87.247 344.007L87.5 201.257L166 338.757C229.897 450.678 245.43 477.199 249.5 481.318C258.586 490.516 272.263 494.832 285.75 492.757C295.083 491.32 305.805 485.915 311.088 479.982C313.686 477.064 345.076 422.872 393.148 338.311L471 201.365V344.061V486.757H515H559L558.988 262.507C558.978 75.7348 558.747 37.3958 557.605 33.1068C548.598 -0.72123 506.892 -11.3842 483.354 14.1238C478.459 19.4288 461.297 48.6538 378.543 192.612C324.116 287.292 279.341 364.74 279.043 364.718C278.744 364.697 255.576 324.759 227.558 275.968C77.722 15.0428 79.732 18.4918 74.274 12.9658C64.79 3.36278 49.508 -1.55223 35.5 0.494768ZM752.066 103.757L654.806 201.757H623.903H593V245.757V289.757H623.869H654.738L752.355 387.765L849.972 485.772L911.484 485.515L972.997 485.257L850.039 365.757C782.412 300.032 727.175 245.966 727.29 245.611C727.406 245.256 779.925 194.022 844 131.759C908.075 69.4948 963.421 15.6728 966.991 12.1538L973.481 5.75676H911.404H849.327L752.066 103.757Z"
                        fill="black" />
                </svg>

            </a>

            <button class="navbar-toggler pr-0" type="button" aria-label="Open Button Toggle"><span
                    class="navbar-toggler-icon"></span></button>

            <div class="collapse navbar-collapse  false" id="collapsibleNavbar">

                <button class="d-block d-md-none close-nav" type="button">
                    <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd"
                        clip-rule="evenodd">
                        <path
                            d="M12 11.293l10.293-10.293.707.707-10.293 10.293 10.293 10.293-.707.707-10.293-10.293-10.293 10.293-.707-.707 10.293-10.293-10.293-10.293.707-.707 10.293 10.293z">
                        </path>
                    </svg>
                </button>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item hover_bottom d-block d-md-none">
                        <a class="nav-link" id="cardHover" aria-label="Go Home" title="Home" href="/">Home</a>
                    </li>
                    <li class="nav-item hover_bottom">
                        <a class="nav-link" id="cardHover" aria-label="Go To About Page" title="About"
                            href="/about">About</a>
                    </li>
                    <li class="nav-item hover_bottom">
                        <a class="nav-link is-active" id="cardHover" aria-label="Go To Projects Page" title="Projects"
                            href="/projects">Projects</a>
                    </li>
                    <li class="nav-item hover_bottom">
                        <a class="nav-link" id="cardHover" aria-label="Go To Contacts Page" title="Contact"
                            href="/contact">Contact</a>
                    </li>
                    <li class="nav-item pl-md-3">
                        <a class="nav-link nav-svg" aria-label="Turn On Light Mood" href="#" id="toggleThemeBtn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path
                                    d="M0 12c0 6.627 5.373 12 12 12s12-5.373 12-12-5.373-12-12-12-12 5.373-12 12zm2 0c0-5.514 4.486-10 10-10v20c-5.514 0-10-4.486-10-10z">
                                </path>
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

@push('scripts')
<script>
    $(document).ready(function () {
        console.log(localStorage.getItem('theme'));
        if(!localStorage.getItem('theme')) {
            localStorage.setItem('theme', 'dark');
        }

        $('#toggleThemeBtn').click(function() {
            const currentTheme = localStorage.getItem('theme');

            if(currentTheme == 'light') {
                localStorage.setItem('theme', 'dark');
                $('body').addClass('dark');
                $('body').removeClass('light');
            } else {
                localStorage.setItem('theme', 'light');
                $('body').addClass('light');
                $('body').removeClass('dark');
            }

            updateNavbrand(currentTheme);
        });
    });

    function updateNavbrand (theme) {
        console.log('updateNavbrand:', theme)
        if(theme == 'dark') {
            $('#navbrandImage').attr('src', `{{ asset('img/mk_logo_white.png') }}`);
        } else {
            $('#navbrandImage').attr('src', `{{ asset('img/mk_logo_black.png') }}`);
        }
    }
</script>
@endpush