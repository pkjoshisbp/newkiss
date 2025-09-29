<div>
    {{-- Hero Banner --}}
    <section class="hero-banner">
        <div class="hero-overlay"></div>
        <div class="container">
            <div class="row align-items-center min-vh-75">
                <div class="col-lg-8">
                    <h1 class="display-3 fw-bold text-white mb-4">
                        Learn to Swim, Float & Survive
                    </h1>
                    <p class="lead text-white mb-4">
                        Professional swimming lessons focused on water safety and survival skills for children and adults across Northeast Ohio.
                    </p>
                    <div class="d-flex gap-3 flex-wrap">
                        <a href="/programs/survival" class="btn btn-primary btn-lg px-4 py-3">
                            <i class="fas fa-swimmer me-2"></i>Survival Program
                        </a>
                        <a href="/programs/continuing" class="btn btn-outline-light btn-lg px-4 py-3">
                            <i class="fas fa-graduation-cap me-2"></i>Continuing Education
                        </a>
                        <a href="https://momence.com/kiss-aquatics" target="_blank" class="btn btn-accent btn-lg px-4 py-3">
                            <i class="fas fa-calendar-alt me-2"></i>Book Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Programs Overview --}}
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center mb-5">
                    <h2 class="display-5 fw-bold text-dark mb-3">Our Swimming Programs</h2>
                    <p class="lead text-muted">
                        We offer two specialized programs designed to teach essential water safety and swimming skills.
                    </p>
                </div>
            </div>
            <div class="row g-4">
                @foreach($programs as $program)
                <div class="col-md-6">
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
                        <div class="card-body">
                            <div class="location-icon mb-3">
                                <i class="fas fa-map-marker-alt fa-2x text-primary"></i>
                            </div>
                            <h4 class="card-title">{{ $location->name }}</h4>
                            <p class="card-text text-muted">{{ $location->address }}</p>
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
</div>

@push('styles')
<style>
.hero-banner {
    background: linear-gradient(135deg, rgba(74, 144, 226, 0.9), rgba(92, 189, 200, 0.8)), 
                url('/target-look.jpg') center/cover;
    position: relative;
    min-height: 75vh;
}

.hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.3);
}

.min-vh-75 {
    min-height: 75vh;
}

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
    background: linear-gradient(135deg, #f8f9fa, #e9ecef);
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
@endpush
