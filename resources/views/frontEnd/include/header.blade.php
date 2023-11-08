<!-- Topbar Start -->
<div style="background-color: #f8f9fa;" class="container-fluid pt-3 d-none d-lg-block">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 text-center text-lg-left mb-2 mb-lg-0">
                <div style="display: flex; align-items: center;">
                    <p><i style="margin-right: 5px;" class="fa fa-envelope"></i>info@example.com</p>
                    <p style="color: #777; margin: 0 10px;">|</p>
                    <p><i style="margin-right: 5px;" class="fa fa-phone-alt"></i>+012 345 6789</p>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div style="display: flex; align-items: center;">
                    <a style="color: #007bff; padding: 0 10px;" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a style="color: #007bff; padding: 0 10px;" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a style="color: #007bff; padding: 0 10px;" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a style="color: #007bff; padding: 0 10px;" href="">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a style="color: #007bff; padding: 0 10px;" href="">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Topbar End -->


<!-- Navbar Start -->
<div class="container-fluid position-relative nav-bar p-0">
    <div class="container-lg position-relative p-0 px-lg-3" style="z-index: 9;">
        <nav class="navbar navbar-expand-lg bg-light navbar-light shadow-lg py-3 py-lg-0 pl-3 pl-lg-5">
            <a href="{{ route('home') }}" class="navbar-brand">
                <h1 class="m-0 text-primary"><span style="color: #343a40;">TRAVEL</span>ER</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                <div class="navbar-nav ml-auto py-0">
                    <a href="{{ route('home') }}" class="nav-item nav-link active">Home</a>
                    <a href="{{ route('about') }}" class="nav-item nav-link">About</a>
                    <a href="{{ route('service') }}" class="nav-item nav-link">Services</a>
                    <a href="{{ route('tour-packages') }}" class="nav-item nav-link">Tour Packages</a>
                    <a href="{{ route('contact') }}" class="nav-item nav-link">Contact</a>

                    @if (auth()->user())
                        <!-- Display the username and logout button if the user is logged in -->
                        <span class="nav-item nav-link">
                            {{ auth()->user()->name }}
                        </span>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="nav-item nav-link" style="background: var(--color-primary); border:0px; ">
                                {{ __('Logout') }}
                            </button>
                        </form>
                    @else
                        <!-- Display register and login buttons if the user is not logged in -->
                        <a href="{{ route('frontEnd.login.login') }}" class="nav-item nav-link">Register</a>
                        <a href="{{ route('frontEnd.register.register') }}" class="nav-item nav-link">Login</a>
                    @endif
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Navbar End -->
