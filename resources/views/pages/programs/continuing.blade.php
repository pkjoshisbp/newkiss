@extends('layouts.app')

@section('title', 'Continuing Education Program - K.I.S.S. Aquatics')
@section('description', 'Advanced swimming lessons and stroke development for students who have mastered basic survival skills. Perfect for refining technique and building confidence.')

@section('content')
<div class="container py-5">
    {{-- Page Header --}}
    <div class="row mb-5">
        <div class="col-lg-8 mx-auto text-center">
            <h1 class="display-4 fw-bold text-primary mb-3">Continuing Education Program</h1>
            <p class="lead text-muted">
                Advanced swimming instruction for students ready to refine their technique and build confidence.
            </p>
        </div>
    </div>

    @php
        $continuingProgram = App\Models\Program::where('slug', 'continuing')->first();
    @endphp

    @if($continuingProgram)
    {{-- Program Overview --}}
    <div class="row mb-5">
        <div class="col-lg-8">
            <div class="card border-0 shadow-hover">
                <div class="card-body p-4">
                    <h2 class="text-primary mb-3">
                        <i class="fas fa-graduation-cap me-2"></i>Program Overview
                    </h2>
                    <p class="lead mb-4">{{ $continuingProgram->short_description }}</p>
                    <div class="program-description">
                        {!! $continuingProgram->description !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card bg-secondary text-white">
                <div class="card-body text-center">
                    <i class="fas fa-swimmer fa-3x mb-3"></i>
                    <h3 class="mb-3">Build on Success</h3>
                    <p class="mb-4">
                        For students who have mastered basic survival skills and are ready to develop proper stroke technique and advanced water skills.
                    </p>
                    <a href="https://momence.com/kiss-aquatics" target="_blank" class="btn btn-accent btn-lg">
                        <i class="fas fa-calendar-alt me-2"></i>Book Lessons
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endif

    {{-- Prerequisites Section --}}
    <div class="row mb-5">
        <div class="col-lg-10 mx-auto">
            <div class="card border-0 bg-light">
                <div class="card-body p-4">
                    <h3 class="text-center text-primary mb-4">
                        <i class="fas fa-check-circle me-2"></i>Prerequisites for Continuing Education
                    </h3>
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="d-flex align-items-start">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-water text-primary fa-lg mt-1"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="mb-2">Floating Skills</h5>
                                    <p class="mb-0 text-muted">
                                        Student can independently float on their back for extended periods without assistance.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-start">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-swimmer text-primary fa-lg mt-1"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="mb-2">Basic Swimming</h5>
                                    <p class="mb-0 text-muted">
                                        Student can swim independently for at least 10-15 feet using any stroke.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-start">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-lungs text-primary fa-lg mt-1"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="mb-2">Breathing Control</h5>
                                    <p class="mb-0 text-muted">
                                        Student demonstrates proper breathing techniques and can hold breath underwater.
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
                                    <h5 class="mb-2">Water Confidence</h5>
                                    <p class="mb-0 text-muted">
                                        Student shows comfort and confidence in the water without fear or hesitation.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Skills Development Section --}}
    <div class="row mb-5">
        <div class="col-12">
            <h2 class="text-center text-primary mb-4">
                <i class="fas fa-star me-2"></i>Skills You'll Develop
            </h2>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="card text-center h-100 skill-card">
                        <div class="card-body">
                            <div class="skill-icon mb-3">
                                <i class="fas fa-swimmer fa-2x"></i>
                            </div>
                            <h4 class="card-title">Stroke Technique</h4>
                            <p class="card-text">
                                Proper freestyle, backstroke, breaststroke, and butterfly technique development.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card text-center h-100 skill-card">
                        <div class="card-body">
                            <div class="skill-icon mb-3">
                                <i class="fas fa-tachometer-alt fa-2x"></i>
                            </div>
                            <h4 class="card-title">Endurance</h4>
                            <p class="card-text">
                                Building stamina and the ability to swim longer distances with confidence.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card text-center h-100 skill-card">
                        <div class="card-body">
                            <div class="skill-icon mb-3">
                                <i class="fas fa-diving fa-2x"></i>
                            </div>
                            <h4 class="card-title">Advanced Skills</h4>
                            <p class="card-text">
                                Diving, turns, underwater swimming, and advanced water safety techniques.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card text-center h-100 skill-card">
                        <div class="card-body">
                            <div class="skill-icon mb-3">
                                <i class="fas fa-medal fa-2x"></i>
                            </div>
                            <h4 class="card-title">Competition Prep</h4>
                            <p class="card-text">
                                Preparation for competitive swimming, swim teams, or personal goals.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Program Levels --}}
    <div class="row mb-5">
        <div class="col-lg-10 mx-auto">
            <h3 class="text-center text-primary mb-4">
                <i class="fas fa-layer-group me-2"></i>Program Levels
            </h3>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 border-primary">
                        <div class="card-header bg-primary text-white text-center">
                            <h4 class="mb-0">Level 1: Foundation</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled">
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Stroke introduction</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Breathing refinement</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Body position</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Basic coordination</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 border-secondary">
                        <div class="card-header bg-secondary text-white text-center">
                            <h4 class="mb-0">Level 2: Development</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled">
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Multiple strokes</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Distance swimming</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Diving basics</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Turn techniques</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 border-success">
                        <div class="card-header bg-success text-white text-center">
                            <h4 class="mb-0">Level 3: Advanced</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled">
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Competitive strokes</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Advanced techniques</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Endurance training</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Race preparation</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Locations & Pricing --}}
    <div class="row mb-5">
        <div class="col-12">
            <h2 class="text-center text-primary mb-4">
                <i class="fas fa-map-marker-alt me-2"></i>Available Locations
            </h2>
            <div class="row g-4">
                @php
                    $locations = App\Models\Location::with(['pricingPlans' => function($query) {
                        $query->where('program_name', 'Continuing Education');
                    }])->where('is_active', true)->orderBy('sort_order')->get();
                @endphp
                
                @foreach($locations as $location)
                <div class="col-md-6 col-lg-3">
                    <div class="card text-center h-100 shadow-hover location-card">
                        <div class="card-body">
                            <h5 class="card-title text-primary">{{ $location->name }}</h5>
                            <p class="card-text small text-muted mb-3">{{ $location->city }}, {{ $location->state }}</p>
                            
                            @if($location->pricingPlans->count() > 0)
                                @foreach($location->pricingPlans as $plan)
                                <div class="mb-2">
                                    <span class="badge bg-secondary">${{ number_format($plan->price, 0) }}</span>
                                    <br><small class="text-muted">{{ $plan->name }}</small>
                                </div>
                                @endforeach
                            @endif
                            
                            <div class="mt-auto">
                                <a href="tel:{{ $location->phone }}" class="btn btn-outline-primary btn-sm mb-2">
                                    <i class="fas fa-phone me-1"></i>{{ $location->phone }}
                                </a>
                                <br>
                                <a href="https://momence.com/kiss-aquatics" target="_blank" class="btn btn-primary btn-sm">
                                    <i class="fas fa-calendar-alt me-1"></i>Book Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Assessment CTA --}}
    <div class="row">
        <div class="col-lg-8 mx-auto text-center">
            <div class="p-4 bg-primary text-white rounded">
                <h3 class="mb-3">Ready to Take Your Swimming to the Next Level?</h3>
                <p class="mb-3">
                    Schedule an assessment to determine the right continuing education level for your swimmer.
                </p>
                <div class="d-flex gap-3 justify-content-center flex-wrap">
                    <a href="/contact" class="btn btn-accent btn-lg">
                        <i class="fas fa-envelope me-2"></i>Schedule Assessment
                    </a>
                    <a href="/about/pricing" class="btn btn-outline-light btn-lg">
                        <i class="fas fa-dollar-sign me-2"></i>View Pricing
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
.skill-card {
    border: none;
    background: linear-gradient(135deg, #f8f9fa, #e9ecef);
    transition: all 0.3s ease;
}

.skill-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15) !important;
}

.skill-icon {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, var(--kiss-secondary-teal), var(--kiss-primary-blue));
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
}

.skill-icon i {
    color: white;
}

.location-card {
    transition: all 0.3s ease;
}

.location-card:hover {
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

.program-description p {
    margin-bottom: 1rem;
    line-height: 1.6;
}

.program-description ul {
    padding-left: 1.5rem;
}

.program-description li {
    margin-bottom: 0.5rem;
}
</style>
@endpush
@endsection