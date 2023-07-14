<nav id="navbar_top" class="navbar navbar-expand-lg navbar-dark bg-dark navbar-absolute">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('') . config('app.imageStorage') . $general['setting']->logo }}" width="30"
                height="30" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto d-flex align-items-center">
                <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/') }}">Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item {{ Request::is('about') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/about') }}">About Us<span class="sr-only">(current)</span></a>
                </li>
                {{-- <li class="nav-item {{ Request::is('blog/*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/blog') }}">Blog<span class="sr-only">(current)</span></a>
                </li> --}}
                <li class="nav-item {{ Request::is('service') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/service') }}">Service<span class="sr-only">(current)</span></a>
                </li>

                <li
                    class="nav-item {{ Request::is('rent/*') || Request::is('rent?*') || Request::is('rent') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/rent') }}">Rent<span class="sr-only">(current)</span></a>
                </li>

                {{-- <li class="nav-item {{ Request::is('booking') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/booking') }}">Booking<span class="sr-only">(current)</span></a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link btn btn-danger bg-danger btn-header-akm fc-white"
                        href="{{ url('/contact') }}">Contact Us
                        <span class="sr-only">
                            (current)
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
