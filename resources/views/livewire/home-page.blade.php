<div>
    {{-- Hero Section --}}
    <section class="hero fw-hero position-relative overflow-hidden">
        <!-- Background slider -->
        <div class="hero-slider position-absolute top-0 start-0 w-100 h-100">
            <div id="heroCarouselFull" class="carousel slide carousel-fade h-100" data-bs-ride="carousel" data-bs-interval="6000">
                <div class="carousel-inner h-100">
                    @foreach($heroSlides as $i => $slide)
                        <div class="carousel-item h-100 @if($i===0) active @endif">
                            <div class="hero-bg" style="background-image: url('{{ $slide['src'] }}')"></div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Banner shapes SVG overlay (100% width, positioned to touch menu) -->
        <div class="banner-overlay position-absolute">
            <img src="{{ asset('images/banner-shapes.svg') }}" alt="" class="w-100">
        </div>

        <!-- Logo and Content Overlay -->
        <div class="container h-100 position-relative">
            <div class="row h-100 align-items-center">
                <div class="col-lg-6">
                    <!-- Logo (smaller to fit in blue band) -->
                    <div class="hero-logo-container mb-4">
                        <img src="{{ asset('images/kiss-aquatics-logo.png') }}" alt="K.I.S.S. Aquatics" class="hero-logo img-fluid">
                    </div>
                    
                    <!-- Headline -->
                    <h1 class="hero-title display-3 fw-bold text-white mb-3">
                        Survival Swimming Lessons
                    </h1>
                    
                    <!-- Subtitle -->
                    <p class="hero-subtitle lead text-white mb-4">
                        Kids and infants safety & survival swim — teaching children to swim, float, and survive.
                    </p>
                    
                    <!-- CTA Buttons -->
                    <div class="d-flex gap-3 flex-wrap">
                        <a href="/programs/survival" class="btn btn-light btn-lg px-4 py-3">
                            Learn More
                        </a>
                        <a href="https://momence.com/kiss-aquatics" target="_blank" class="btn btn-warning btn-lg px-4 py-3 text-dark fw-bold">
                            Book Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Programs Overview --}}
    <section class="py-5 bg-light section-over-hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center mb-5">
                    <h2 class="display-5 fw-bold text-dark mb-3">Our Swimming Programs</h2>
                    <p class="lead text-muted">
                        We offer two specialized programs designed to teach essential water safety and swimming skills.
                    </p>
                </div>
            </div>
            <div class="row g-4 justify-content-center">
                @foreach($programs->take(2) as $program)
                <div class="col-md-6 col-lg-5">
                    <div class="card h-100 shadow-hover program-card">
                        @if($program->image_path)
                        <img src="{{ Storage::url($program->image_path) }}" class="card-img-top" alt="{{ $program->name }}">
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h3 class="card-title h4 text-primary">{{ $program->name }}</h3>
                            <p class="card-text flex-grow-1">{{ $program->short_description }}</p>
                            <div class="mt-auto">
                                <a href="/programs/{{ $program->slug }}" class="btn btn-primary">
                                    Learn More <i class="fas fa-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Locations Section --}}
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center mb-5">
                    <h2 class="display-5 fw-bold text-dark mb-3">Our Locations</h2>
                    <p class="lead text-muted">
                        Convenient locations across Northeast Ohio to serve your family's swimming needs.
                    </p>
                </div>
            </div>
            <div class="row g-4">
                @foreach($locations as $location)
                <div class="col-md-6 col-lg-3">
                    <div class="card text-center h-100 shadow-hover location-card">
                        @if($location->image)
                            <img src="{{ asset('storage/' . $location->image) }}" class="card-img-top location-image" alt="{{ $location->name }}">
                        @else
                            <div class="location-icon-header">
                                <i class="fas fa-map-marker-alt fa-3x text-white"></i>
                            </div>
                        @endif
                        <div class="card-body">
                            <h4 class="card-title mb-2">{{ $location->name }}</h4>
                            <p class="card-text text-muted small mb-1">
                                <i class="fas fa-envelope me-1"></i>{{ $location->email }}
                            </p>
                            @if($location->description)
                                <p class="card-text text-muted small mb-3">{{ $location->description }}</p>
                            @endif
                            <div class="mt-auto">
                                <a href="tel:{{ $location->phone }}" class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-phone me-1"></i>{{ $location->phone }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="text-center mt-4">
                <a href="/about/locations" class="btn btn-primary">
                    View All Locations <i class="fas fa-arrow-right ms-1"></i>
                </a>
            </div>
        </div>
    </section>

    {{-- Video Section --}}
    @if($featuredVideos->count() > 0)
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center mb-5">
                    <h2 class="display-5 fw-bold text-dark mb-3">See Our Students in Action</h2>
                    <p class="lead text-muted">
                        Watch how our students learn essential water safety and swimming skills.
                    </p>
                </div>
            </div>
            <div class="row g-4">
                @foreach($featuredVideos as $video)
                <div class="col-md-4">
                    <div class="card shadow-hover video-card">
                        <div class="video-wrapper">
                            <div class="video-thumbnail" style="background-image: url('{{ $video->thumbnail_url ?: '/images/video-placeholder.jpg' }}')">
                                <div class="play-button" wire:click="playVideo('{{ $video->video_url }}')">
                                    <i class="fas fa-play"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $video->title }}</h5>
                            <p class="card-text">{{ $video->description }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="text-center mt-4">
                <a href="/about/videos" class="btn btn-primary">
                    View All Videos <i class="fas fa-arrow-right ms-1"></i>
                </a>
            </div>
        </div>
    </section>
    @endif

    {{-- Statistics & Call to Action --}}
    <section class="py-5 bg-primary text-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h2 class="h3 mb-3">Every Second Counts in Water Safety</h2>
                    <p class="mb-4">
                        <strong>Drowning is the leading cause of death for children ages 1-4</strong> and the second leading cause of unintentional injury death for children ages 5-14. Don't wait - give your child the life-saving skills they need.
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="https://momence.com/kiss-aquatics" target="_blank" class="btn btn-accent btn-lg px-4 py-3">
                        <i class="fas fa-shield-alt me-2"></i>Start Lessons Today
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- Contact CTA --}}
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h2 class="display-6 fw-bold mb-3">Ready to Get Started?</h2>
                    <p class="lead mb-4">
                        Contact us today to learn more about our programs and schedule your child's first lesson.
                    </p>
                    <div class="d-flex gap-3 justify-content-center flex-wrap">
                        <a href="/contact" class="btn btn-outline-primary btn-lg">
                            <i class="fas fa-envelope me-2"></i>Contact Us
                        </a>
                        <a href="/about/pricing" class="btn btn-outline-secondary btn-lg">
                            <i class="fas fa-dollar-sign me-2"></i>View Pricing
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>



<style>
/* Hero Section Styles */
.fw-hero { 
    height: 80vh; 
    min-height: 600px; 
}

.hero { 
    background: transparent; 
}

.hero-slider { 
    background-color: #0b3c5d; 
    z-index: 1; 
}

.hero .hero-bg { 
    position: absolute; 
    inset: 0; 
    background-size: cover; 
    background-position: center; 
}

/* Banner overlay - 100% width, positioned -75px from top so yellow band touches menu */
.banner-overlay {
    width: 100%;
    top: -75px; /* Move up 75px to connect yellow band with menu */
    left: 0;
    z-index: 2;
    pointer-events: none;
}

.banner-overlay img {
    display: block;
    width: 100%;
    height: auto;
    opacity: 0.7; /* 70% opacity */
}

/* Hero content styling */
.hero .container {
    z-index: 3;
}

.hero-logo-container {
    max-width: 180px; /* Smaller logo to fit in blue band */
    margin-top: -20px; /* Shift logo up by 20px */
}

.hero-logo {
    max-width: 100%;
    height: auto;
    filter: drop-shadow(0 4px 6px rgba(0, 0, 0, 0.3));
}

.hero-title {
    text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);
    line-height: 1.2;
}

.hero-subtitle {
    text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.5);
    font-size: 1.25rem;
}

/* Smooth crossfade */
.carousel-fade .carousel-item { 
    opacity: 0; 
    transition: opacity 1.2s ease-in-out; 
}

.carousel-fade .carousel-item.active { 
    opacity: 1; 
}

.carousel-fade .carousel-item-next.carousel-item-start,
.carousel-fade .carousel-item-prev.carousel-item-end { 
    opacity: 0; 
}

.carousel-fade .active.carousel-item-start,
.carousel-fade .active.carousel-item-end { 
    opacity: 1; 
}

/* Section styling */
.section-over-hero { 
    position: relative; 
    z-index: 10; 
}

/* Responsive refinements */
@media (max-width: 991.98px) {
    .banner-overlay {
        width: 100%;
    }
    
    .hero-logo-container {
        max-width: 140px; /* Smaller on tablets */
    }
    
    .hero-title {
        font-size: 2.5rem;
    }
}

@media (max-width: 575.98px) {
    .fw-hero { 
        height: 70vh; 
        min-height: 500px;
    }
    
    .banner-overlay {
        width: 100%;
    }
    
    .hero-logo-container {
        max-width: 110px; /* Smaller on mobile */
    }
    
    .hero-title {
        font-size: 2rem;
    }
    
    .hero-subtitle {
        font-size: 1rem;
    }
}

/* Card hover effects */
.shadow-hover {
    transition: all 0.3s ease;
}

.shadow-hover:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15) !important;
}

.program-card .card-img-top {
    height: 200px;
    object-fit: cover;
}

.location-card {
    border: none;
    overflow: hidden;
}

.location-image {
    height: 180px;
    object-fit: cover;
    width: 100%;
}

.location-icon-header {
    height: 180px;
    background: linear-gradient(135deg, #469EDE, #3A8AC9);
    display: flex;
    align-items: center;
    justify-content: center;
}

.location-icon {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, var(--kiss-primary-blue), var(--kiss-secondary-teal));
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
}

.location-icon i {
    color: white !important;
}

.video-wrapper {
    position: relative;
    overflow: hidden;
}

.video-thumbnail {
    height: 200px;
    background-size: cover;
    background-position: center;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
}

.play-button {
    width: 60px;
    height: 60px;
    background: rgba(255, 255, 255, 0.9);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
}

.play-button:hover {
    background: white;
    transform: scale(1.1);
}

.play-button i {
    color: var(--kiss-primary-blue);
    font-size: 1.5rem;
    margin-left: 3px;
}

.btn-accent {
    background: linear-gradient(135deg, var(--kiss-accent-coral), var(--kiss-accent-orange));
    border: none;
    color: white;
}

.btn-accent:hover {
    background: linear-gradient(135deg, var(--kiss-accent-orange), var(--kiss-accent-coral));
    color: white;
    transform: translateY(-2px);
}
</style>

<script>
// Hero carousel initialized by Bootstrap automatically
</script>
</div>