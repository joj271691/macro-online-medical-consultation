<nav class="navbar navbar-expand-lg bg-light fixed-top shadow-lg">
    <div class="container">
        <a class="navbar-brand mx-auto d-lg-none" href="index.html">
            Medic Care
            <strong class="d-block">Health Specialist</strong>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#hero">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#about">About</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#timeline">Timeline</a>
                </li>

                <a class="navbar-brand d-none d-lg-block" href="index.html">
                    Medic Care
                    <strong class="d-block">Health Specialist</strong>
                </a>

                <li class="nav-item">
                    <a class="nav-link" href="#reviews">Testimonials</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#booking">Booking</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#contact">Contact</a>
                </li>
                <li>
                @if (Route::has('login'))
                <nav class="-mx-3 flex flex-1 justify-end">
                    @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Logout</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                        @endif
                    </li>
                    @endauth
                </nav>
            @endif
                
               
            </ul>
        </div>

    </div>
</nav>