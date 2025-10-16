<div>
@section('content')
<div class="container py-5">
    {{-- Page Header --}}
    <div class="row mb-5">
        <div class="col-lg-8 mx-auto text-center">
            <h1 class="display-4 fw-bold text-primary mb-3">Frequently Asked Questions</h1>
            <p class="lead text-muted">
                Find answers to common questions about our swimming programs and policies.
            </p>
        </div>
    </div>

    {{-- FAQ Content --}}
    @php
        $faqs = App\Models\FAQ::where('is_published', true)->orderBy('sort_order')->get();
    @endphp

    @if($faqs->count() > 0)
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="accordion" id="faqAccordion">
                @foreach($faqs as $faq)
                <div class="accordion-item border-0 shadow-sm mb-3">
                    <h2 class="accordion-header" id="heading{{ $faq->id }}">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $faq->id }}" aria-expanded="false" aria-controls="collapse{{ $faq->id }}">
                            <strong>{{ $faq->question }}</strong>
                        </button>
                    </h2>
                    <div id="collapse{{ $faq->id }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $faq->id }}" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            <p class="mb-0">{{ $faq->answer }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @else
    {{-- Placeholder FAQ Content --}}
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="accordion" id="faqAccordion">
                {{-- General Questions --}}
                <div class="accordion-item border-0 shadow-sm mb-3">
                    <h2 class="accordion-header" id="heading1">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                            <strong>What age groups do you teach?</strong>
                        </button>
                    </h2>
                    <div id="collapse1" class="accordion-collapse collapse" aria-labelledby="heading1" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            <p class="mb-0">We teach all ages from 6 months to adults. Our programs are specifically designed for different age groups: Infant & Toddler (6 months - 2 years), Preschool (2 - 6 years), and School Age & Adults (6+ years).</p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item border-0 shadow-sm mb-3">
                    <h2 class="accordion-header" id="heading2">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                            <strong>How long are the lessons?</strong>
                        </button>
                    </h2>
                    <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="heading2" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            <p class="mb-0">Lesson lengths vary by age and program. Typically, infant and toddler lessons are 30 minutes, while older children and adults have 30-45 minute sessions. We focus on quality instruction rather than duration.</p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item border-0 shadow-sm mb-3">
                    <h2 class="accordion-header" id="heading3">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                            <strong>Do you offer group lessons or only private lessons?</strong>
                        </button>
                    </h2>
                    <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="heading3" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            <p class="mb-0">We offer both private and small group lessons. Private lessons provide personalized attention, while small group lessons (typically 2-4 students) offer a social learning environment at a more affordable rate.</p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item border-0 shadow-sm mb-3">
                    <h2 class="accordion-header" id="heading4">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                            <strong>What should I bring to lessons?</strong>
                        </button>
                    </h2>
                    <div id="collapse4" class="accordion-collapse collapse" aria-labelledby="heading4" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            <p class="mb-0">Bring a well-fitted swimsuit, towel, and any necessary personal items. Goggles are optional but not required for our survival-focused programs. We recommend avoiding loose clothing or jewelry that could pose safety risks.</p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item border-0 shadow-sm mb-3">
                    <h2 class="accordion-header" id="heading5">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                            <strong>How do you handle safety in the water?</strong>
                        </button>
                    </h2>
                    <div id="collapse5" class="accordion-collapse collapse" aria-labelledby="heading5" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            <p class="mb-0">Safety is our top priority. All instructors are certified and maintain constant supervision. We use proper safety equipment, maintain appropriate instructor-to-student ratios, and follow strict safety protocols at all times.</p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item border-0 shadow-sm mb-3">
                    <h2 class="accordion-header" id="heading6">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
                            <strong>What is your cancellation policy?</strong>
                        </button>
                    </h2>
                    <div id="collapse6" class="accordion-collapse collapse" aria-labelledby="heading6" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            <p class="mb-0">We require 24-hour notice for cancellations. Lessons cancelled with proper notice can be rescheduled based on availability. Same-day cancellations may be subject to full charges unless due to emergency or illness.</p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item border-0 shadow-sm mb-3">
                    <h2 class="accordion-header" id="heading7">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse7" aria-expanded="false" aria-controls="collapse7">
                            <strong>How many lessons does my child need?</strong>
                        </button>
                    </h2>
                    <div id="collapse7" class="accordion-collapse collapse" aria-labelledby="heading7" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            <p class="mb-0">Every child progresses at their own pace. Basic survival skills typically develop over 10-20 lessons, while advanced swimming techniques may require ongoing instruction. We'll assess your child's progress and provide recommendations.</p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item border-0 shadow-sm mb-3">
                    <h2 class="accordion-header" id="heading8">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse8" aria-expanded="false" aria-controls="collapse8">
                            <strong>Do you offer lessons year-round?</strong>
                        </button>
                    </h2>
                    <div id="collapse8" class="accordion-collapse collapse" aria-labelledby="heading8" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            <p class="mb-0">Yes, we offer lessons year-round at our indoor pool locations. This ensures consistent skill development and maintenance of water safety abilities regardless of the season.</p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item border-0 shadow-sm mb-3">
                    <h2 class="accordion-header" id="heading9">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse9" aria-expanded="false" aria-controls="collapse9">
                            <strong>Can parents watch the lessons?</strong>
                        </button>
                    </h2>
                    <div id="collapse9" class="accordion-collapse collapse" aria-labelledby="heading9" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            <p class="mb-0">Yes, parents are welcome to observe lessons. However, we find that some children focus better without parent observation, especially during the initial learning phases. We'll work with you to determine what's best for your child.</p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item border-0 shadow-sm mb-3">
                    <h2 class="accordion-header" id="heading10">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse10" aria-expanded="false" aria-controls="collapse10">
                            <strong>What makes K.I.S.S. Aquatics different from other swim schools?</strong>
                        </button>
                    </h2>
                    <div id="collapse10" class="accordion-collapse collapse" aria-labelledby="heading10" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            <p class="mb-0">We focus specifically on survival swimming and water safety skills rather than just stroke technique. Our approach emphasizes the ability to survive unexpected water emergencies, which is the foundation for all future swimming development.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    {{-- Contact CTA --}}
    <div class="row mt-5">
        <div class="col-lg-8 mx-auto text-center">
            <div class="p-4 bg-light rounded">
                <h3 class="text-primary mb-3">Still Have Questions?</h3>
                <p class="mb-3">
                    Don't see your question answered here? We're happy to help with any additional questions about our programs.
                </p>
                <div class="d-flex gap-3 justify-content-center flex-wrap">
                    <a href="/contact" class="btn btn-primary btn-lg">
                        <i class="fas fa-envelope me-2"></i>Contact Us
                    </a>
                    <a href="https://momence.com/kiss-aquatics" target="_blank" class="btn btn-outline-primary btn-lg">
                        <i class="fas fa-calendar-alt me-2"></i>Schedule a Consultation
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
.accordion-button {
    background-color: var(--kiss-primary-blue);
    color: white;
    border: none;
}

.accordion-button:not(.collapsed) {
    background-color: var(--kiss-secondary-teal);
    color: white;
    box-shadow: none;
}

.accordion-button:focus {
    box-shadow: 0 0 0 0.25rem rgba(74, 144, 226, 0.25);
}

.accordion-button::after {
    filter: brightness(0) invert(1);
}

.shadow-hover {
    transition: all 0.3s ease;
}

.shadow-hover:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15) !important;
}
</style>
@endpush
</div>
