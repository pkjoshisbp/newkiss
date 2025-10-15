<section class="hero fw-hero position-relative overflow-hidden">
    <!-- Background slider -->
    <div class="hero-slider position-absolute top-0 start-0 w-100 h-100 overflow-hidden">
        <div id="heroCarouselFull" class="carousel slide carousel-fade h-100" data-bs-ride="carousel" data-bs-interval="6000">
            <div class="carousel-inner h-100">
                @foreach($slides as $i => $slide)
                    <div class="carousel-item h-100 @if($i===0) active @endif">
                        <div class="hero-bg" style="background-image: url('{{ $slide['src'] }}')"></div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

@push('styles')
<style>
.fw-hero { 
    height: 78vh; 
    min-height: 520px; 
}

.hero { 
    background: transparent; 
}

.hero-slider { 
    background-color: #0b3c5d; 
    z-index: 1; 
}

.hero .hero-bg { 
    position: absolute; 
    inset: 0; 
    background-size: cover; 
    background-position: center; 
}

/* Smooth crossfade */
.carousel-fade .carousel-item { 
    opacity: 0; 
    transition: opacity 1.2s ease-in-out; 
}

.carousel-fade .carousel-item.active { 
    opacity: 1; 
}

.carousel-fade .carousel-item-next.carousel-item-start,
.carousel-fade .carousel-item-prev.carousel-item-end { 
    opacity: 0; 
}

.carousel-fade .active.carousel-item-start,
.carousel-fade .active.carousel-item-end { 
    opacity: 1; 
}

/* Responsive refinements */
@media (max-width: 575.98px) {
  .fw-hero { 
      height: 68vh; 
  }
}
</style>
@endpush

@push('scripts')
<script>
// Hero carousel initialized by Bootstrap automatically
</script>
@endpush