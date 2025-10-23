<div>
@section('content')
<div class="container py-5">
    {{-- Page Header --}}
    <div class="row mb-5">
        <div class="col-lg-8 mx-auto text-center">
            <h1 class="display-4 fw-bold text-primary mb-3">Survival Swimming Program</h1>
            <p class="lead text-muted">
                Teaching essential water safety and survival skills that could save your child's life.
            </p>
        </div>
    </div>

    @php
        $survivalProgram = App\Models\Program::where('slug', 'survival')->first();
    @endphp

    @if($survivalProgram)
    {{-- Program Overview --}}
    <div class="row mb-5">
        <div class="col-lg-8">
            <div class="card border-0 shadow-hover">
                <div class="card-body p-4">
                    <h2 class="text-primary mb-3">
                        <i class="fas fa-life-ring me-2"></i>Program Overview
                    </h2>
                    @if($survivalProgram->short_description)
                        <p class="lead mb-4">{{ $survivalProgram->short_description }}</p>
                    @endif
                    
                    @if($survivalProgram->full_content)
                        <div class="program-description">
                            {!! $survivalProgram->full_content !!}
                        </div>
                    @elseif($survivalProgram->description)
                        <div class="program-description">
                            {!! $survivalProgram->description !!}
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card bg-primary text-white">
                <div class="card-body text-center">
                    <i class="fas fa-shield-alt fa-3x mb-3"></i>
                    <h3 class="mb-3">Life-Saving Skills</h3>
                    <p class="mb-4">
                        Our survival program focuses on teaching children the essential skills to survive unexpected water emergencies.
                    </p>
                    <a href="https://momence.com/kiss-aquatics" target="_blank" class="btn btn-accent btn-lg">
                        <i class="fas fa-calendar-alt me-2"></i>Book Lessons
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- Key Skills Section --}}
    <div class="row mb-5">
        <div class="col-12">
            <h2 class="text-center text-primary mb-4">
                <i class="fas fa-star me-2"></i>Key Skills Your Child Will Learn
            </h2>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="card text-center h-100 skill-card">
                        <div class="card-body">
                            <div class="skill-icon mb-3">
                                <i class="fas fa-swimmer fa-2x"></i>
                            </div>
                            <h4 class="card-title">Breath Control</h4>
                            <p class="card-text">
                                Learning to get the face wet and learn to hold their breath.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card text-center h-100 skill-card">
                        <div class="card-body">
                            <div class="skill-icon mb-3">
                                <i class="fas fa-water fa-2x"></i>
                            </div>
                            <h4 class="card-title">Back Float</h4>
                            <p class="card-text">
                                Comfort laying down on float independently and trust the float for safety.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card text-center h-100 skill-card">
                        <div class="card-body">
                            <div class="skill-icon mb-3">
                                <i class="fas fa-lungs fa-2x"></i>
                            </div>
                            <h4 class="card-title">Transitions</h4>
                            <p class="card-text">
                                Ability to roll over or rotate into a back float position.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card text-center h-100 skill-card">
                        <div class="card-body">
                            <div class="skill-icon mb-3">
                                <i class="fas fa-life-ring fa-2x"></i>
                            </div>
                            <h4 class="card-title">Survival</h4>
                            <p class="card-text">
                                Simulation of a real water accident for ultimate training.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    {{-- Age Groups --}}
    <div class="row mb-5">
        <div class="col-lg-10 mx-auto">
            <div class="card border-0 bg-light">
                <div class="card-body p-4">
                    <h3 class="text-center text-primary mb-4">
                        <i class="fas fa-users me-2"></i>Age Groups & Program Details
                    </h3>
                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="text-center">
                                <div class="age-badge mb-3">
                                    <span class="badge bg-primary fs-6 px-3 py-2">6 months - 2 years</span>
                                </div>
                                <h5>Infant & Toddler</h5>
                                <p class="text-muted small">
                                    Introduction to water safety and basic floating skills with parent participation.
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="text-center">
                                <div class="age-badge mb-3">
                                    <span class="badge bg-primary fs-6 px-3 py-2">2 - 6 years</span>
                                </div>
                                <h5>Preschool</h5>
                                <p class="text-muted small">
                                    Independent floating and swimming skills development with safety focus.
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="text-center">
                                <div class="age-badge mb-3">
                                    <span class="badge bg-primary fs-6 px-3 py-2">6+ years</span>
                                </div>
                                <h5>School Age & Adults</h5>
                                <p class="text-muted small">
                                    Advanced survival techniques and stroke refinement for all skill levels.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Statistics Alert --}}
    <div class="row mb-5">
        <div class="col-lg-10 mx-auto">
            <div class="alert alert-danger border-0 shadow-sm">
                <div class="row align-items-center">
                    <div class="col-md-2 text-center">
                        <i class="fas fa-exclamation-triangle fa-3x text-danger"></i>
                    </div>
                    <div class="col-md-10">
                        <h4 class="alert-heading text-danger">Critical Water Safety Facts</h4>
                        <p class="mb-0">
                            <strong>Drowning is the leading cause of death for children ages 1-4</strong> and the second leading cause of unintentional injury death for children ages 5-14. It can happen quickly and quietly - often in less than 20 seconds.
                        </p>
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
                        $query->where('is_active', true)->whereHas('program', function($q){
                            $q->where('slug', 'survival');
                        })->with('program');
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
                                    <span class="badge bg-primary">${{ number_format($plan->price, 0) }}</span>
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

    {{-- Contact CTA --}}
    <div class="row">
        <div class="col-lg-8 mx-auto text-center">
            <div class="p-4 bg-primary text-white rounded">
                <h3 class="mb-3">Ready to Start Your Child's Water Safety Journey?</h3>
                <p class="mb-3">
                    Contact us today to learn more about our Survival Swimming Program and schedule an assessment.
                </p>
                <div class="d-flex gap-3 justify-content-center flex-wrap">
                    <a href="/contact" class="btn btn-accent btn-lg">
                        <i class="fas fa-envelope me-2"></i>Contact Us
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
    background: linear-gradient(135deg, var(--kiss-primary-blue), var(--kiss-secondary-teal));
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
</div>
