<div>
    <div class="container py-5">
        {{-- Page Header --}}
        <div class="row mb-5">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4 fw-bold mb-3" style="color: #469EDE;">Our Instructors</h1>
                <p class="lead text-muted">
                    Professional, caring, and highly trained instructors dedicated to your child's safety.
                </p>
            </div>
        </div>

        {{-- Professional Swim Instructors Section --}}
        <div class="row mb-5">
            <div class="col-lg-10 mx-auto">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-5">
                        <div class="text-center mb-4">
                            <h2 class="fw-bold" style="color: #469EDE;">
                                <i class="fas fa-users me-2"></i>PROFESSIONAL SWIM INSTRUCTORS
                            </h2>
                        </div>
                        <p class="lead text-center mb-4">
                            KISS Aquatics is comprised of energetic, creative professionals who love being in the water. We are dedicated to teaching your child the survival swimming skills needed to enjoy the water safely.
                        </p>
                        <div class="alert alert-info text-center" role="alert">
                            <i class="fas fa-info-circle me-2"></i>
                            <strong>All our instructors are adults - NO HIGH SCHOOL OR COLLEGE kids.</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Experience and Education --}}
        <div class="row mb-5">
            <div class="col-lg-10 mx-auto">
                <div class="card border-0 bg-light">
                    <div class="card-body p-5">
                        <div class="d-flex align-items-start mb-4">
                            <div class="flex-shrink-0">
                                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px; background-color: #469EDE !important;">
                                    <i class="fas fa-graduation-cap fa-2x"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-4">
                                <h3 class="fw-bold mb-3" style="color: #469EDE;">EXPERIENCE AND EDUCATION</h3>
                                <p class="text-muted mb-3">
                                    Each instructor has over 175 hours of in-water training and education in child development and behavior. Combining our years of experience and educational background with the physics of swimming, we offer safe and comprehensive swimming lessons. All trainers of the Kiss Aquatics program have a teaching style and experience that enables them to determine the most effective way to teach your child to swim.
                                </p>
                                <p class="text-muted mb-0">
                                    <strong>Our instructors teach an average of 4,000-5,000 lessons a year and this is our full time career. K.I.S.S. Swim teaches around 45,000 swim lessons every year!!!</strong>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Instructors Grid --}}
        <div class="row mb-5">
            <div class="col-12">
                <h2 class="text-center fw-bold mb-5" style="color: #469EDE;">Meet Our Team</h2>
                <div class="row g-4">
                    @foreach($instructors as $instructor)
                        <div class="col-md-6 col-lg-4 col-xl-3">
                            <div class="card instructor-card border-0 shadow-sm h-100">
                                <div class="instructor-image-wrapper">
                                    <img src="{{ asset($instructor->image) }}" 
                                         alt="{{ $instructor->name }}" 
                                         class="card-img-top instructor-image">
                                </div>
                                <div class="card-body text-center">
                                    <h5 class="fw-bold mb-2" style="color: #469EDE;">{{ $instructor->name }}</h5>
                                    @if($instructor->title)
                                        <p class="text-muted small mb-2">{{ $instructor->title }}</p>
                                    @endif
                                    @if($instructor->bio)
                                        <p class="small text-muted mb-0">{{ $instructor->bio }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- Ultimate Goal --}}
        <div class="row mb-5">
            <div class="col-lg-10 mx-auto">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-5">
                        <div class="d-flex align-items-start">
                            <div class="flex-shrink-0">
                                <div class="text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px; background-color: #F7CD45;">
                                    <i class="fas fa-heart fa-2x" style="color: #333;"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-4">
                                <h3 class="fw-bold mb-3" style="color: #469EDE;">ULTIMATE GOAL</h3>
                                <p class="text-muted mb-0">
                                    We take pride in our expertise in working with infants and small children and believe that we are saving lives, one child at a time. We form special relationships with both our students and their parents. Watching your child discover the joy of swimming is truly the most rewarding experience for us all.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Call to Action --}}
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <div class="p-4 rounded text-white" style="background-color: #469EDE;">
                    <h3 class="mb-3">Ready to Start Your Child's Swimming Journey?</h3>
                    <p class="mb-3">
                        Our experienced instructors are ready to help your child become safe and confident in the water.
                    </p>
                    <a href="{{ route('contact') }}" class="btn btn-lg me-2" style="background-color: #F7CD45; color: #333; border-color: #F7CD45;">
                        <i class="fas fa-envelope me-2"></i>Contact Us
                    </a>
                    <a href="https://momence.com" target="_blank" class="btn btn-lg btn-light">
                        <i class="fas fa-calendar-alt me-2"></i>Book Now
                    </a>
                </div>
            </div>
        </div>
    </div>

    <style>
    .instructor-card {
        transition: all 0.3s ease;
        overflow: hidden;
    }

    .instructor-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15) !important;
    }

    .instructor-image-wrapper {
        overflow: hidden;
        position: relative;
        padding-top: 100%; /* 1:1 Aspect Ratio */
        background-color: #f8f9fa;
    }

    .instructor-image {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .instructor-card:hover .instructor-image {
        transform: scale(1.05);
    }
    </style>
</div>
