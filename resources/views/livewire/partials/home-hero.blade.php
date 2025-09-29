<section class="hero-curve position-relative">
    <div class="curve-top"></div>

    <div class="container py-5 py-lg-5">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <h1 class="display-4 fw-bold text-white mb-3">Survival Swimming Lessons</h1>
                <p class="lead text-white-50 mb-4">Kids and Infants Safety & Survival Swim—teaching crucial skills: swim, float, survive.</p>
                <div class="d-flex gap-3 flex-wrap">
                    <a href="/programs/survival" class="btn btn-light btn-lg">Learn More</a>
                    <a href="https://momence.com/kiss-aquatics" target="_blank" class="btn btn-primary btn-lg">Book Now</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div id="heroCarousel" class="carousel slide shadow rounded overflow-hidden" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($slides as $i => $slide)
                            <div class="carousel-item @if($i===0) active @endif">
                                <img src="{{ $slide['src'] }}" class="d-block w-100" alt="{{ $slide['alt'] }}">
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="curve-bottom"></div>
</section>