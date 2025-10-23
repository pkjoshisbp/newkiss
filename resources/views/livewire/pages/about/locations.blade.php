<div>
    <div class="container py-5">
        {{-- Page Header --}}
        <div class="row mb-5">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4 fw-bold text-primary mb-3">Our Locations</h1>
                <p class="lead text-muted">
                    Convenient swimming lesson locations across Northeast Ohio to serve your family's needs.
                </p>
            </div>
        </div>

        {{-- Warning Banner --}}
        <div class="row mb-4">
            <div class="col-lg-10 mx-auto">
                <div class="alert alert-warning border-0 shadow-sm">
                    <div class="row align-items-center">
                        <div class="col-md-2 text-center">
                            <i class="fas fa-exclamation-triangle fa-3x text-warning"></i>
                        </div>
                        <div class="col-md-10">
                            <h4 class="alert-heading text-warning mb-2">Critical Water Safety Facts</h4>
                            <p class="mb-0">
                                <strong>More children ages 1–4 die from drowning than any other cause of death.</strong> 
                                It can happen quickly and quietly - often in less than 20 seconds. Don't wait - give your child the life-saving skills they need.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Locations Grid --}}
        <div class="row g-4">
            @foreach($locations as $location)
            <div class="col-md-6 col-lg-6">
                <div class="card h-100 shadow-hover location-detail-card">
                    <div class="card-header bg-primary text-white">
                        <h3 class="card-title mb-0">
                            <i class="fas fa-map-marker-alt me-2"></i>{{ $location->name }}
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <h5 class="text-primary mb-2">
                                    <i class="fas fa-building me-2"></i>Address
                                </h5>
                                <p class="mb-1">{{ $location->address }}</p>
                                <p class="mb-0 text-muted">{{ $location->city }}, {{ $location->state }} {{ $location->zip }}</p>
                            </div>
                            
                            @if($location->phone)
                            <div class="col-md-6 mb-3">
                                <h5 class="text-primary mb-2">
                                    <i class="fas fa-phone me-2"></i>Phone
                                </h5>
                                @php
                                    $phones = array_map('trim', explode(',', $location->phone));
                                @endphp
                                @foreach($phones as $phone)
                                    <a href="tel:{{ $phone }}" class="btn btn-outline-primary btn-sm d-block mb-1">
                                        {{ $phone }}
                                    </a>
                                @endforeach
                            </div>
                            @endif
                            
                            @if($location->email)
                            <div class="col-md-6 mb-3">
                                <h5 class="text-primary mb-2">
                                    <i class="fas fa-envelope me-2"></i>Email
                                </h5>
                                @php
                                    $emails = array_map('trim', explode(',', $location->email));
                                @endphp
                                @foreach($emails as $email)
                                    <a href="mailto:{{ $email }}" class="btn btn-outline-secondary btn-sm d-block mb-1">
                                        {{ $email }}
                                    </a>
                                @endforeach
                            </div>
                            @endif
                        </div>
                        
                        @if($location->notes)
                        <div class="mt-3 p-3 bg-light rounded">
                            <h6 class="text-primary mb-2">
                                <i class="fas fa-info-circle me-2"></i>Location Notes
                            </h6>
                            <p class="mb-0 small">{{ $location->notes }}</p>
                        </div>
                        @endif
                    </div>
                    <div class="card-footer bg-light">
                        <div class="d-flex gap-2">
                            <a href="https://momence.com/kiss-aquatics" target="_blank" class="btn btn-primary btn-sm flex-fill">
                                <i class="fas fa-calendar-alt me-1"></i>Book Lessons
                            </a>
                            @if($location->address)
                            <a href="https://maps.google.com/?q={{ urlencode($location->address . ', ' . $location->city . ', ' . $location->state) }}" 
                               target="_blank" class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-directions me-1"></i>Directions
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Contact CTA --}}
        <div class="row mt-5">
            <div class="col-lg-8 mx-auto text-center">
                <div class="p-4 bg-primary text-white rounded">
                    <h3 class="mb-3">Need Help Choosing a Location?</h3>
                    <p class="mb-3">
                        Our team can help you find the most convenient location for your family and answer any questions about our programs.
                    </p>
                    <a href="/contact" class="btn btn-accent btn-lg">
                        <i class="fas fa-envelope me-2"></i>Contact Us Today
                    </a>
                </div>
            </div>
        </div>
    </div>

    <style>
    .location-detail-card {
        transition: all 0.3s ease;
        border: none;
    }

    .location-detail-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15) !important;
    }

    .shadow-hover {
        transition: all 0.3s ease;
    }

    .shadow-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15) !important;
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
</div>
