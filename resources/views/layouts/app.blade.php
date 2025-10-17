<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', $title ?? 'K.I.S.S. Aquatics - Swimming Lessons for Water Safety & Survival')</title>
    
    <!-- Meta Tags -->
    <meta name="description" content="@yield('description', $description ?? 'Learn essential water safety and survival swimming skills for all ages in Northeast Ohio. Professional swim instructors teaching children to swim, float, and survive.')">
    <meta name="robots" content="{{ $robots ?? 'index,follow' }}">
    <meta name="author" content="K.I.S.S. Aquatics">
    
    <!-- Open Graph -->
    <meta property="og:title" content="{{ $title ?? 'K.I.S.S. Aquatics' }}">
    <meta property="og:description" content="{{ $description ?? 'Swimming lessons for water safety and survival' }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('target-look.jpg') }}">
    
    <!-- Canonical -->
    @if(isset($canonical))
        <link rel="canonical" href="{{ $canonical }}">
    @endif
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Styles -->
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
    
    <!-- Livewire Styles -->
    @livewireStyles
    
    <!-- Custom Styles -->
    @stack('styles')
</head>
<body>
    <!-- Header -->
    <header class="navbar navbar-expand-lg navbar-light shadow-sm sticky-top" style="background-color: #469EDE;">
        <div class="container">
            <!-- Mobile Toggle -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <!-- Navigation -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav align-items-lg-center">
                    <li class="nav-item">
                        <a class="nav-link text-white {{ request()->routeIs('home') ? 'fw-bold' : '' }}" href="{{ route('home') }}">
                            HOME
                        </a>
                    </li>
                    
                    <!-- About Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white {{ request()->routeIs('about.*') && !request()->routeIs('about.videos') ? 'fw-bold' : '' }}" href="#" role="button" data-bs-toggle="dropdown">
                            ABOUT
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('about.locations') }}">Locations</a></li>
                            <li><a class="dropdown-item" href="{{ route('about.pricing') }}">Pricing</a></li>
                            <li><a class="dropdown-item" href="{{ route('about.instructors') }}">Our Instructors</a></li>
                            <li><a class="dropdown-item" href="{{ route('about.rules') }}">The Rules</a></li>
                            <li><a class="dropdown-item" href="{{ route('about.qa') }}">Q&A</a></li>
                        </ul>
                    </li>
                    
                    <!-- Programs Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white {{ request()->routeIs('programs.*') ? 'fw-bold' : '' }}" href="#" role="button" data-bs-toggle="dropdown">
                            PROGRAMS
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('programs.survival') }}">Survival Program</a></li>
                            <li><a class="dropdown-item" href="{{ route('programs.continuing') }}">Continuing Education</a></li>
                        </ul>
                    </li>
                    
                    <!-- Videos - Top Level Menu Item -->
                    <li class="nav-item">
                        <a class="nav-link text-white {{ request()->routeIs('about.videos') ? 'fw-bold' : '' }}" href="{{ route('about.videos') }}">
                            VIDEOS
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link text-white {{ request()->routeIs('contact') ? 'fw-bold' : '' }}" href="{{ route('contact') }}">
                            CONTACT US
                        </a>
                    </li>
                    
                    <!-- Client Portal Button -->
                    <li class="nav-item ms-2 ms-lg-auto">
                        <a href="https://momence.com" 
                           target="_blank" 
                           class="btn rounded-pill px-4" 
                           style="background-color: #F7CD45; color: #333;">
                            CLIENT PORTAL
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        @isset($slot)
            {{ $slot }}
        @else
            @yield('content')
        @endisset
    </main>

    <!-- Drowning Statistics Banner -->
    <section class="drowning-stats py-3 bg-warning">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    <strong>Drowning is the second leading cause of accidental death for children under 5</strong>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <!-- Contact Info -->
                <div class="col-lg-4 mb-4">
                    <h5 class="text-kiss-teal mb-3">Contact Information</h5>
                    <div class="mb-2">
                        <i class="bi bi-envelope me-2"></i>
                        <a href="mailto:kiss.swim@gmail.com">kiss.swim@gmail.com</a>
                    </div>
                    <div class="mb-2">
                        <i class="bi bi-telephone me-2"></i>
                        <a href="tel:(216) 469-6400">(216) 469-6400</a>
                    </div>
                </div>
                
                <!-- Quick Links -->
                <div class="col-lg-4 mb-4">
                    <h5 class="text-kiss-teal mb-3">Quick Links</h5>
                    <ul class="footer-links">
                        <li><a href="{{ route('about.locations') }}">Locations</a></li>
                        <li><a href="{{ route('about.pricing') }}">Pricing</a></li>
                        <li><a href="{{ route('programs.survival') }}">Survival Program</a></li>
                        <li><a href="{{ route('programs.continuing') }}">Continuing Education</a></li>
                        <li><a href="{{ route('about.qa') }}">FAQ</a></li>
                        <li><a href="{{ route('contact') }}">Contact Us</a></li>
                    </ul>
                </div>
                
                <!-- Resources -->
                <div class="col-lg-4 mb-4">
                    <h5 class="text-kiss-teal mb-3">Resources</h5>
                    <ul class="footer-links">
                        <li><a href="http://www.redcross.org/take-a-class/program-highlights/cpr-first-aid" target="_blank">Red Cross CPR Training</a></li>
                        <li><a href="http://ndpa.org/" target="_blank">National Drowning Prevention Alliance</a></li>
                        <li><a href="http://www.infantaquatics.com/" target="_blank">Infant Aquatics</a></li>
                    </ul>
                    
                    <!-- Social Links -->
                    <div class="social-links mt-3">
                        <a href="#" target="_blank" title="Facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" target="_blank" title="Instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" target="_blank" title="YouTube"><i class="bi bi-youtube"></i></a>
                    </div>
                </div>
            </div>
            
            <hr class="my-4">
            
            <div class="row align-items-center">
                <div class="col-md-6">
                    <p class="mb-0">&copy; {{ date('Y') }} K.I.S.S. Aquatics L.L.C. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <small class="text-muted">
                        Website by <a href="#" class="text-kiss-teal">KISS Aquatics Development Team</a>
                    </small>
                </div>
            </div>
        </div>
    </footer>

    <!-- Livewire Scripts -->
    @livewireScripts
    
    <!-- Custom Scripts -->
    <script>
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
    
    @stack('scripts')
</body>
</html>
