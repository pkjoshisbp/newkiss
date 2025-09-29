<section class="hero fw-hero position-relative">
    <div class="hero-slider position-absolute top-0 start-0 w-100 h-100 overflow-hidden">
        <div id="heroCarouselFull" class="carousel slide carousel-fade h-100" data-bs-ride="carousel" data-bs-interval="5000">
            <div class="carousel-inner h-100">
                @foreach($slides as $i => $slide)
                    <div class="carousel-item h-100 @if($i===0) active @endif">
                        <div class="hero-bg" style="background-image: url('{{ $slide['src'] }}')"></div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="container h-100 position-relative d-flex align-items-center">
        <div class="row w-100">
            <div class="col-lg-7">
                <h1 class="display-3 fw-bold text-white text-shadow">Survival Swimming Lessons</h1>
                <p class="lead text-white text-shadow mb-4">Kids and Infants Safety & Survival Swim — teaching children to swim, float, and survive.</p>
                <div class="d-flex gap-3 flex-wrap">
                    <a href="/programs/survival" class="btn btn-light btn-lg px-4">Learn More</a>
                    <a href="https://momence.com/kiss-aquatics" target="_blank" class="btn btn-primary btn-lg px-4">Book Now</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Wave divider overlapping the hero -->
    <div class="wave-divider">
        <svg viewBox="0 0 1440 200" preserveAspectRatio="none" class="w-100 h-100">
            <path fill="#ffffff" d="M0,128L80,112C160,96,320,64,480,74.7C640,85,800,139,960,154.7C1120,171,1280,149,1360,138.7L1440,128L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z"></path>
        </svg>
    </div>
</section>

@push('styles')
<style>
.fw-hero { height: 78vh; min-height: 520px; }
.hero-bg { position:absolute; inset:0; background-size:cover; background-position:center; transform: scale(1.06); filter: brightness(0.7); }
.text-shadow { text-shadow: 0 6px 18px rgba(0,0,0,0.45); }
.wave-divider { position:absolute; left:0; right:0; bottom:-1px; height:120px; z-index:2; }
.hero { background: linear-gradient(135deg, rgba(11,60,93,0.4), rgba(47,126,198,0.35)); }

/* Section that slides over the hero */
.section-over-hero { margin-top: -80px; position: relative; z-index: 3; }

/* Parallax-like reveal on scroll */
.hero .hero-bg { will-change: transform; transition: transform 0.2s ease-out; }
</style>
@endpush

@push('scripts')
<script>
(function(){
  const hero = document.querySelector('.fw-hero');
  const bg = hero ? hero.querySelector('.hero-bg') : null;
  let lastScroll = window.pageYOffset;

  window.addEventListener('scroll', () => {
    const current = window.pageYOffset;
    const delta = current - lastScroll;
    lastScroll = current;
    // slight translate for depth
    if (bg) {
      const offset = Math.min(60, Math.max(-60, current * 0.08));
      bg.style.transform = `translateY(${offset}px) scale(1.06)`;
    }
  }, { passive: true });
})();
</script>
@endpush