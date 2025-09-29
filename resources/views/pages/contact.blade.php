@extends('layouts.app')

@section('title', 'Contact Us - K.I.S.S. Aquatics')
@section('description', 'Contact K.I.S.S. Aquatics for swimming lessons, water safety programs, and enrollment information. Serving Northeast Ohio with multiple convenient locations.')

@section('content')
<div class="container py-5">
    {{-- Page Header --}}
    <div class="row mb-5">
        <div class="col-lg-8 mx-auto text-center">
            <h1 class="display-4 fw-bold text-primary mb-3">Contact Us</h1>
            <p class="lead text-muted">
                Get in touch with our team to learn more about our swimming programs or to schedule lessons.
            </p>
        </div>
    </div>

    <div class="row g-5">
        {{-- Contact Form --}}
        <div class="col-lg-8">
            <div class="card shadow-hover border-0">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title mb-0">
                        <i class="fas fa-envelope me-2"></i>Send Us a Message
                    </h3>
                </div>
                <div class="card-body p-4">
                    <form id="contactForm">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="firstName" class="form-label">First Name *</label>
                                <input type="text" class="form-control" id="firstName" name="firstName" required>
                            </div>
                            <div class="col-md-6">
                                <label for="lastName" class="form-label">Last Name *</label>
                                <input type="text" class="form-control" id="lastName" name="lastName" required>
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email Address *</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" id="phone" name="phone">
                            </div>
                            <div class="col-md-6">
                                <label for="childAge" class="form-label">Child's Age</label>
                                <select class="form-select" id="childAge" name="childAge">
                                    <option value="">Select Age Range</option>
                                    <option value="6months-2years">6 months - 2 years</option>
                                    <option value="2-4years">2 - 4 years</option>
                                    <option value="4-6years">4 - 6 years</option>
                                    <option value="6-12years">6 - 12 years</option>
                                    <option value="adult">Adult</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="location" class="form-label">Preferred Location</label>
                                <select class="form-select" id="location" name="location">
                                    <option value="">Select Location</option>
                                    @php
                                        $locations = App\Models\Location::where('is_active', true)->orderBy('sort_order')->get();
                                    @endphp
                                    @foreach($locations as $location)
                                    <option value="{{ $location->name }}">{{ $location->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="program" class="form-label">Program Interest</label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="survival" id="programSurvival" name="programs[]">
                                            <label class="form-check-label" for="programSurvival">
                                                Survival Swimming Program
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="continuing" id="programContinuing" name="programs[]">
                                            <label class="form-check-label" for="programContinuing">
                                                Continuing Education
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="message" class="form-label">Message *</label>
                                <textarea class="form-control" id="message" name="message" rows="5" placeholder="Tell us about your needs, questions, or any specific concerns you may have..." required></textarea>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="consent" name="consent" required>
                                    <label class="form-check-label" for="consent">
                                        I consent to being contacted by K.I.S.S. Aquatics regarding swimming lessons and programs. *
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="fas fa-paper-plane me-2"></i>Send Message
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- Contact Information --}}
        <div class="col-lg-4">
            {{-- Quick Contact --}}
            <div class="card border-0 shadow-hover mb-4">
                <div class="card-header bg-secondary text-white">
                    <h4 class="card-title mb-0">
                        <i class="fas fa-phone me-2"></i>Quick Contact
                    </h4>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-3">
                        <a href="https://momence.com/kiss-aquatics" target="_blank" class="btn btn-primary btn-lg">
                            <i class="fas fa-calendar-alt me-2"></i>Book Lessons Online
                        </a>
                        <a href="/about/locations" class="btn btn-outline-primary">
                            <i class="fas fa-map-marker-alt me-2"></i>View All Locations
                        </a>
                        <a href="/about/pricing" class="btn btn-outline-secondary">
                            <i class="fas fa-dollar-sign me-2"></i>View Pricing
                        </a>
                    </div>
                </div>
            </div>

            {{-- Locations --}}
            <div class="card border-0 shadow-hover mb-4">
                <div class="card-header bg-primary text-white">
                    <h4 class="card-title mb-0">
                        <i class="fas fa-map-marker-alt me-2"></i>Our Locations
                    </h4>
                </div>
                <div class="card-body">
                    @foreach($locations as $location)
                    <div class="mb-3 @if(!$loop->last) border-bottom pb-3 @endif">
                        <h6 class="text-primary mb-1">{{ $location->name }}</h6>
                        <p class="mb-1 small text-muted">{{ $location->city }}, {{ $location->state }}</p>
                        <a href="tel:{{ $location->phone }}" class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-phone me-1"></i>{{ $location->phone }}
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Emergency Information --}}
            <div class="card border-0 bg-danger text-white">
                <div class="card-body text-center">
                    <i class="fas fa-exclamation-triangle fa-2x mb-3"></i>
                    <h5 class="card-title">Water Emergency?</h5>
                    <p class="card-text mb-3">
                        If you are experiencing a water emergency, call 911 immediately.
                    </p>
                    <a href="tel:911" class="btn btn-light btn-lg fw-bold">
                        <i class="fas fa-phone me-2"></i>Call 911
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- FAQ Section --}}
    <div class="row mt-5">
        <div class="col-12">
            <h2 class="text-center text-primary mb-4">
                <i class="fas fa-question-circle me-2"></i>Frequently Asked Questions
            </h2>
            <div class="row g-4">
                @php
                    $faqs = App\Models\FAQ::where('is_published', true)->orderBy('sort_order')->take(6)->get();
                @endphp
                
                @if($faqs->count() > 0)
                    @foreach($faqs as $faq)
                    <div class="col-md-6">
                        <div class="card border-0 bg-light h-100">
                            <div class="card-body">
                                <h6 class="card-title text-primary mb-2">{{ $faq->question }}</h6>
                                <p class="card-text small text-muted">{{ $faq->answer }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                    <div class="col-12 text-center">
                        <p class="text-muted">FAQ content will be available soon.</p>
                    </div>
                @endif
            </div>
            @if($faqs->count() > 0)
            <div class="text-center mt-4">
                <a href="/about/qa" class="btn btn-outline-primary">
                    View All FAQs <i class="fas fa-arrow-right ms-1"></i>
                </a>
            </div>
            @endif
        </div>
    </div>
</div>

@push('styles')
<style>
.shadow-hover {
    transition: all 0.3s ease;
}

.shadow-hover:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15) !important;
}

.form-control:focus, .form-select:focus {
    border-color: var(--kiss-primary-blue);
    box-shadow: 0 0 0 0.2rem rgba(74, 144, 226, 0.25);
}

.form-check-input:checked {
    background-color: var(--kiss-primary-blue);
    border-color: var(--kiss-primary-blue);
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

@push('scripts')
<script>
document.getElementById('contactForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Get form data
    const formData = new FormData(this);
    const data = {};
    for (let [key, value] of formData.entries()) {
        data[key] = value;
    }
    
    // Simple validation
    if (!data.firstName || !data.lastName || !data.email || !data.message || !data.consent) {
        alert('Please fill in all required fields and agree to be contacted.');
        return;
    }
    
    // Simulate form submission (replace with actual endpoint)
    alert('Thank you for your message! We will contact you soon to discuss your swimming lesson needs.');
    this.reset();
});
</script>
@endpush
@endsection