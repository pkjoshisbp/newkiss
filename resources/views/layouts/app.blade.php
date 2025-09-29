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
    
    <!-- Styles -->
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
    
    <!-- Livewire Styles -->
    @livewireStyles
    
    <!-- Custom Styles -->
    @stack('styles')
</head>
<body>
    <!-- Header -->
    <header class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
        <div class="container">
            <!-- Brand -->
            <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
                <img src="{{ asset('target-look.jpg') }}" alt="K.I.S.S. Aquatics" height="50" class="me-2 rounded">
                <div>
                    <div class="fw-bold text-kiss-blue">K.I.S.S. AQUATICS</div>
                    <small class="text-muted">Safety & Survival Swim</small>
                </div>
            </a>
            
            <!-- Mobile Toggle -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <!-- Navigation -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                            <i class="bi bi-house-door me-1"></i> HOME
                        </a>
                    </li>
                    
                    <!-- About Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('about.*') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="bi bi-info-circle me-1"></i> ABOUT
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('about.locations') }}">
                                <i class="bi bi-geo-alt me-2"></i> Locations
                            </a></li>
                            <li><a class="dropdown-item" href="{{ route('about.pricing') }}">
                                <i class="bi bi-currency-dollar me-2"></i> Pricing
                            </a></li>
                            <li><a class="dropdown-item" href="{{ route('about.instructors') }}">
                                <i class="bi bi-people me-2"></i> Our Instructors
                            </a></li>
                            <li><a class="dropdown-item" href="{{ route('about.rules') }}">
                                <i class="bi bi-list-check me-2"></i> The Rules
                            </a></li>
                            <li><a class="dropdown-item" href="{{ route('about.videos') }}">
                                <i class="bi bi-play-circle me-2"></i> Videos
                            </a></li>
                            <li><a class="dropdown-item" href="{{ route('about.qa') }}">
                                <i class="bi bi-question-circle me-2"></i> Q&A
                            </a></li>
                        </ul>
                    </li>
                    
                    <!-- Programs Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('programs.*') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="bi bi-water me-1"></i> PROGRAMS
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('programs.survival') }}">
                                <i class="bi bi-shield-check me-2"></i> Survival Program
                            </a></li>
                            <li><a class="dropdown-item" href="{{ route('programs.continuing') }}">
                                <i class="bi bi-arrow-up me-2"></i> Continuing Education
                            </a></li>
                        </ul>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">
                            <i class="bi bi-envelope me-1"></i> CONTACT US
                        </a>
                    </li>
                    
                    <!-- Book Now Button -->
                    <li class="nav-item ms-2">
                        <a href="{{ App\Models\SiteSetting::getValue('booking_url', 'https://momence.com') }}" 
                           target="_blank" 
                           class="btn btn-primary rounded-pill px-4">
                            <i class="bi bi-calendar-check me-1"></i> BOOK NOW
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <!-- Main Content -->
            {{-- Main Content --}}
        <main>
            @isset($slot)
                {{ $slot }}
            @else
                @yield('content')
            @endisset
        </main>

    <!-- Drowning Statistics Banner -->
    <section class="drowning-stats">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    <strong>{{ App\Models\SiteSetting::getValue('drowning_statistic', 'Drowning is the second leading cause of accidental death for children under 5') }}</strong>
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
                        <a href="mailto:{{ App\Models\SiteSetting::getValue('contact_email', 'kiss.swim@gmail.com') }}">
                            {{ App\Models\SiteSetting::getValue('contact_email', 'kiss.swim@gmail.com') }}
                        </a>
                    </div>
                    <div class="mb-2">
                        <i class="bi bi-telephone me-2"></i>
                        <a href="tel:{{ App\Models\SiteSetting::getValue('phone_main', '(216) 469-6400') }}">
                            {{ App\Models\SiteSetting::getValue('phone_main', '(216) 469-6400') }}
                        </a>
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
        
        // Video lazy loading
        document.addEventListener('DOMContentLoaded', function() {
            const videoContainers = document.querySelectorAll('.video-container');
            videoContainers.forEach(container => {
                const playButton = container.querySelector('.play-button');
                const thumbnail = container.querySelector('.video-thumbnail');
                
                if (playButton) {
                    playButton.addEventListener('click', function() {
                        const videoUrl = this.dataset.videoUrl;
                        if (videoUrl) {
                            const iframe = document.createElement('iframe');
                            iframe.src = videoUrl + '?autoplay=1';
                            iframe.allowFullscreen = true;
                            container.innerHTML = '';
                            container.appendChild(iframe);
                        }
                    });
                }
            });
        });
    </script>
    
    <!-- Custom Scripts -->
    @stack('scripts')
</body>
</html>