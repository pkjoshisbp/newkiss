@extends('layouts.app')

@section('title', 'Pricing - K.I.S.S. Aquatics')
@section('description', 'View our competitive pricing for swimming lessons at K.I.S.S. Aquatics. Programs for survival swimming and continuing education across Northeast Ohio.')

@section('content')
<div class="container py-5">
    {{-- Page Header --}}
    <div class="row mb-5">
        <div class="col-lg-8 mx-auto text-center">
            <h1 class="display-4 fw-bold text-primary mb-3">Pricing</h1>
            <p class="lead text-muted">
                Competitive rates for professional swimming lessons that teach essential water safety and survival skills.
            </p>
        </div>
    </div>

    {{-- Pricing by Location --}}
    @php
        $locations = App\Models\Location::with(['pricingPlans' => function($q){
            $q->where('is_active', true)->with('program');
        }])->where('is_active', true)->orderBy('sort_order')->get();
    @endphp

    <div class="row g-4">
        @foreach($locations as $location)
        <div class="col-lg-6">
            <div class="card h-100 shadow-hover pricing-card">
                <div class="card-header bg-primary text-white text-center">
                    <h3 class="card-title mb-0">
                        <i class="fas fa-map-marker-alt me-2"></i>{{ $location->name }}
                    </h3>
                    <p class="mb-0 small opacity-75">{{ $location->city }}, {{ $location->state }}</p>
                </div>
                <div class="card-body">
                    @if($location->pricingPlans->count() > 0)
                        @php $grouped = $location->pricingPlans->groupBy(function($plan){ return optional($plan->program)->name ?? 'Program'; }); @endphp
                        @foreach($grouped as $programName => $plans)
                        <div class="mb-4">
                            <h4 class="text-secondary border-bottom pb-2 mb-3">{{ $programName }}</h4>
                            @foreach($plans as $plan)
                            <div class="d-flex justify-content-between align-items-center mb-2 p-3 bg-light rounded">
                                <div>
                                    <h6 class="mb-1 fw-bold">{{ $plan->name }}</h6>
                                    @if($plan->description)
                                    <p class="mb-0 small text-muted">{{ $plan->description }}</p>
                                    @endif
                                </div>
                                <div class="text-end">
                                    <span class="h5 text-primary fw-bold">${{ number_format($plan->price, 0) }}</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endforeach
                    @else
                        <div class="text-center py-4">
                            <i class="fas fa-info-circle fa-2x text-muted mb-3"></i>
                            <p class="text-muted">Pricing information coming soon for this location.</p>
                        </div>
                    @endif
                </div>
                <div class="card-footer bg-light text-center">
                    <a href="tel:{{ $location->phone }}" class="btn btn-outline-primary me-2">
                        <i class="fas fa-phone me-1"></i>{{ $location->phone }}
                    </a>
                    <a href="https://momence.com/kiss-aquatics" target="_blank" class="btn btn-primary">
                        <i class="fas fa-calendar-alt me-1"></i>Book Now
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    {{-- General Pricing Information --}}
    <div class="row mt-5">
        <div class="col-lg-10 mx-auto">
            <div class="card border-0 bg-light">
                <div class="card-body p-4">
                    <h3 class="text-center text-primary mb-4">
                        <i class="fas fa-info-circle me-2"></i>Pricing Information
                    </h3>
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="d-flex align-items-start">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-dollar-sign text-primary fa-lg mt-1"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="mb-2">Payment Options</h5>
                                    <p class="mb-0 text-muted">
                                        We accept cash, check, and all major credit cards. Payment is due at the time of booking.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-start">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-calendar-check text-primary fa-lg mt-1"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="mb-2">Scheduling</h5>
                                    <p class="mb-0 text-muted">
                                        Lessons are scheduled based on availability. Book early to secure your preferred time slots.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-start">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-redo text-primary fa-lg mt-1"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="mb-2">Cancellation Policy</h5>
                                    <p class="mb-0 text-muted">
                                        24-hour notice required for cancellations. Please contact your location directly for rescheduling.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-start">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-shield-alt text-primary fa-lg mt-1"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="mb-2">Value Promise</h5>
                                    <p class="mb-0 text-muted">
                                        Quality instruction focused on water safety and survival skills that last a lifetime.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Contact CTA --}}
    <div class="row mt-5">
        <div class="col-lg-8 mx-auto text-center">
            <div class="p-4 bg-primary text-white rounded">
                <h3 class="mb-3">Questions About Pricing?</h3>
                <p class="mb-3">
                    Contact us for more information about our programs, group discounts, or payment plans.
                </p>
                <a href="/contact" class="btn btn-accent btn-lg">
                    <i class="fas fa-envelope me-2"></i>Get in Touch
                </a>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
.pricing-card {
    transition: all 0.3s ease;
    border: none;
}

.pricing-card:hover {
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
@endpush
@endsection