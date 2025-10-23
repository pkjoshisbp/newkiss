<div>
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
                    {{-- Success/Error Messages --}}
                    @if(session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    
                    @if(session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-triangle me-2"></i>{{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form wire:submit.prevent="submit">
                        <div class="row g-3">
                            {{-- Honeypot field (hidden from users, should stay empty) --}}
                            <div style="position: absolute; left: -9999px; height: 0; overflow: hidden;">
                                <label for="website">Website (leave blank)</label>
                                <input type="text" wire:model="website" id="website" name="website" tabindex="-1" autocomplete="off">
                            </div>

                            <div class="col-md-6">
                                <label for="firstName" class="form-label">First Name *</label>
                                <input type="text" class="form-control @error('firstName') is-invalid @enderror" 
                                       wire:model="firstName" id="firstName" name="firstName">
                                @error('firstName') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            
                            <div class="col-md-6">
                                <label for="lastName" class="form-label">Last Name *</label>
                                <input type="text" class="form-control @error('lastName') is-invalid @enderror" 
                                       wire:model="lastName" id="lastName" name="lastName">
                                @error('lastName') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email Address *</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                       wire:model="email" id="email" name="email">
                                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control @error('phone') is-invalid @enderror" 
                                       wire:model="phone" id="phone" name="phone">
                                @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            
                            <div class="col-md-6">
                                <label for="childAge" class="form-label">Child's Age</label>
                                <select class="form-select @error('childAge') is-invalid @enderror" 
                                        wire:model="childAge" id="childAge" name="childAge">
                                    <option value="">Select Age Range</option>
                                    <option value="6months-2years">6 months - 2 years</option>
                                    <option value="2-4years">2 - 4 years</option>
                                    <option value="4-6years">4 - 6 years</option>
                                    <option value="6-12years">6 - 12 years</option>
                                    <option value="adult">Adult</option>
                                </select>
                                @error('childAge') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            
                            <div class="col-md-6">
                                <label for="location" class="form-label">Preferred Location</label>
                                <select class="form-select @error('location') is-invalid @enderror" 
                                        wire:model="location" id="location" name="location">
                                    <option value="">Select Location</option>
                                    @php
                                        $locations = App\Models\Location::where('is_active', true)->orderBy('sort_order')->get();
                                    @endphp
                                    @foreach($locations as $location)
                                    <option value="{{ $location->name }}">{{ $location->name }}</option>
                                    @endforeach
                                </select>
                                @error('location') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            
                            <div class="col-12">
                                <label for="message" class="form-label">Message *</label>
                                <textarea class="form-control @error('message') is-invalid @enderror" 
                                          wire:model="message" id="message" name="message" rows="5" 
                                          placeholder="Tell us about your needs, questions, or any specific concerns you may have..."></textarea>
                                @error('message') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            {{-- Math Captcha --}}
                            <div class="col-12">
                                <div class="card bg-light border-primary">
                                    <div class="card-body">
                                        <label for="captcha_answer" class="form-label fw-bold">
                                            <i class="fas fa-shield-alt me-2 text-primary"></i>Verify you're human: 
                                            What is {{ $captcha_num1 }} + {{ $captcha_num2 }}? *
                                        </label>
                                        <input type="number" class="form-control @error('captcha_answer') is-invalid @enderror" 
                                               wire:model="captcha_answer" id="captcha_answer" name="captcha_answer" 
                                               placeholder="Enter answer" style="max-width: 150px;">
                                        @error('captcha_answer') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-lg" wire:loading.attr="disabled">
                                    <span wire:loading.remove>
                                        <i class="fas fa-paper-plane me-2"></i>Send Message
                                    </span>
                                    <span wire:loading>
                                        <i class="fas fa-spinner fa-spin me-2"></i>Sending...
                                    </span>
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
                        @if($location->phone)
                            @php
                                $phones = array_map('trim', explode(',', $location->phone));
                            @endphp
                            @foreach($phones as $phone)
                                <a href="tel:{{ $phone }}" class="btn btn-sm btn-outline-primary d-block mb-1" style="width: fit-content;">
                                    <i class="fas fa-phone me-1"></i>{{ $phone }}
                                </a>
                            @endforeach
                        @endif
                        @if($location->email)
                            @php
                                $emails = array_map('trim', explode(',', $location->email));
                            @endphp
                            @foreach($emails as $email)
                                <a href="mailto:{{ $email }}" class="btn btn-sm btn-outline-secondary d-block mb-1" style="width: fit-content;">
                                    <i class="fas fa-envelope me-1"></i>{{ $email }}
                                </a>
                            @endforeach
                        @endif
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


</div>
