@extends('layouts.app')

@section('title', 'Student Videos - K.I.S.S. Aquatics')
@section('description', 'Watch our students demonstrate water safety and survival swimming skills. See the progress and success of K.I.S.S. Aquatics swimming programs.')

@section('content')
<div class="container py-5">
    {{-- Page Header --}}
    <div class="row mb-5">
        <div class="col-lg-8 mx-auto text-center">
            <h1 class="display-4 fw-bold text-primary mb-3">Student Videos</h1>
            <p class="lead text-muted">
                Watch our students demonstrate the life-saving water safety and survival skills they've learned.
            </p>
        </div>
    </div>

    {{-- Videos Grid --}}
    @php
        $videos = App\Models\Video::where('is_published', true)->orderBy('sort_order')->get();
    @endphp

    @if($videos->count() > 0)
    <div class="row g-4">
        @foreach($videos as $video)
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-hover video-card h-100">
                <div class="video-wrapper">
                    <div class="video-thumbnail" style="background-image: url('{{ $video->thumbnail_url ?: '/images/video-placeholder.jpg' }}')">
                        <div class="play-button" onclick="playVideo('{{ $video->video_url }}', '{{ $video->title }}')">
                            <i class="fas fa-play"></i>
                        </div>
                        @if($video->duration)
                        <span class="video-duration">{{ $video->duration }}</span>
                        @endif
                    </div>
                </div>
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $video->title }}</h5>
                    <p class="card-text flex-grow-1">{{ $video->description }}</p>
                    @if($video->student_age)
                    <div class="mt-auto">
                        <span class="badge bg-primary">Age {{ $video->student_age }}</span>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    {{-- Placeholder Content --}}
    <div class="row g-4">
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-hover video-card h-100">
                <div class="video-wrapper">
                    <div class="video-thumbnail" style="background: linear-gradient(135deg, var(--kiss-primary-blue), var(--kiss-secondary-teal)); display: flex; align-items: center; justify-content: center;">
                        <div class="text-center text-white">
                            <i class="fas fa-video fa-3x mb-2"></i>
                            <h5>Survival Skills Demo</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Float to Survive</h5>
                    <p class="card-text flex-grow-1">Watch as a young student demonstrates proper back floating technique, a critical survival skill.</p>
                    <div class="mt-auto">
                        <span class="badge bg-primary">Age 4</span>
                        <span class="badge bg-secondary ms-1">Coming Soon</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4">
            <div class="card shadow-hover video-card h-100">
                <div class="video-wrapper">
                    <div class="video-thumbnail" style="background: linear-gradient(135deg, var(--kiss-secondary-teal), var(--kiss-accent-coral)); display: flex; align-items: center; justify-content: center;">
                        <div class="text-center text-white">
                            <i class="fas fa-swimmer fa-3x mb-2"></i>
                            <h5>Swimming Progress</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Swimming to Safety</h5>
                    <p class="card-text flex-grow-1">A student demonstrates swimming to the pool edge and climbing out safely.</p>
                    <div class="mt-auto">
                        <span class="badge bg-primary">Age 6</span>
                        <span class="badge bg-secondary ms-1">Coming Soon</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4">
            <div class="card shadow-hover video-card h-100">
                <div class="video-wrapper">
                    <div class="video-thumbnail" style="background: linear-gradient(135deg, var(--kiss-accent-orange), var(--kiss-primary-blue)); display: flex; align-items: center; justify-content: center;">
                        <div class="text-center text-white">
                            <i class="fas fa-child fa-3x mb-2"></i>
                            <h5>Toddler Success</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Toddler Water Confidence</h5>
                    <p class="card-text flex-grow-1">See how even our youngest students develop confidence and basic water safety skills.</p>
                    <div class="mt-auto">
                        <span class="badge bg-primary">Age 2</span>
                        <span class="badge bg-secondary ms-1">Coming Soon</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4">
            <div class="card shadow-hover video-card h-100">
                <div class="video-wrapper">
                    <div class="video-thumbnail" style="background: linear-gradient(135deg, var(--kiss-accent-coral), var(--kiss-secondary-teal)); display: flex; align-items: center; justify-content: center;">
                        <div class="text-center text-white">
                            <i class="fas fa-certificate fa-3x mb-2"></i>
                            <h5>Graduation</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Program Graduation</h5>
                    <p class="card-text flex-grow-1">A student demonstrates all required skills for program completion.</p>
                    <div class="mt-auto">
                        <span class="badge bg-success">All Ages</span>
                        <span class="badge bg-secondary ms-1">Coming Soon</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4">
            <div class="card shadow-hover video-card h-100">
                <div class="video-wrapper">
                    <div class="video-thumbnail" style="background: linear-gradient(135deg, var(--kiss-primary-blue), var(--kiss-accent-orange)); display: flex; align-items: center; justify-content: center;">
                        <div class="text-center text-white">
                            <i class="fas fa-heart fa-3x mb-2"></i>
                            <h5>Parent Stories</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Parent Testimonials</h5>
                    <p class="card-text flex-grow-1">Hear from parents about their experience with K.I.S.S. Aquatics programs.</p>
                    <div class="mt-auto">
                        <span class="badge bg-info">Testimonial</span>
                        <span class="badge bg-secondary ms-1">Coming Soon</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4">
            <div class="card shadow-hover video-card h-100">
                <div class="video-wrapper">
                    <div class="video-thumbnail" style="background: linear-gradient(135deg, var(--kiss-secondary-teal), var(--kiss-accent-coral)); display: flex; align-items: center; justify-content: center;">
                        <div class="text-center text-white">
                            <i class="fas fa-graduation-cap fa-3x mb-2"></i>
                            <h5>Advanced Skills</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Continuing Education</h5>
                    <p class="card-text flex-grow-1">Students in our continuing education program demonstrate advanced stroke techniques.</p>
                    <div class="mt-auto">
                        <span class="badge bg-primary">Age 8+</span>
                        <span class="badge bg-secondary ms-1">Coming Soon</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    {{-- Video Modal --}}
    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="videoModalLabel">Video</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <div class="ratio ratio-16x9">
                        <iframe id="videoFrame" src="" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Safety Notice --}}
    <div class="row mt-5">
        <div class="col-lg-10 mx-auto">
            <div class="alert alert-info border-0 shadow-sm">
                <div class="row align-items-center">
                    <div class="col-md-2 text-center">
                        <i class="fas fa-info-circle fa-3x text-info"></i>
                    </div>
                    <div class="col-md-10">
                        <h4 class="alert-heading text-info">Important Safety Note</h4>
                        <p class="mb-0">
                            These videos showcase student progress and achievements. All activities are performed under professional supervision. Never attempt to recreate these skills without proper instruction and supervision. Water safety always requires adult supervision regardless of swimming ability.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- CTA Section --}}
    <div class="row mt-5">
        <div class="col-lg-8 mx-auto text-center">
            <div class="p-4 bg-primary text-white rounded">
                <h3 class="mb-3">Ready to See Your Child Succeed?</h3>
                <p class="mb-3">
                    Join the many families who have trusted K.I.S.S. Aquatics to teach their children essential water safety skills.
                </p>
                <div class="d-flex gap-3 justify-content-center flex-wrap">
                    <a href="https://momence.com/kiss-aquatics" target="_blank" class="btn btn-accent btn-lg">
                        <i class="fas fa-calendar-alt me-2"></i>Schedule Lessons
                    </a>
                    <a href="/contact" class="btn btn-outline-light btn-lg">
                        <i class="fas fa-envelope me-2"></i>Ask Questions
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
.video-wrapper {
    position: relative;
    overflow: hidden;
}

.video-thumbnail {
    height: 200px;
    background-size: cover;
    background-position: center;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
}

.play-button {
    width: 60px;
    height: 60px;
    background: rgba(255, 255, 255, 0.9);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
}

.play-button:hover {
    background: white;
    transform: scale(1.1);
}

.play-button i {
    color: var(--kiss-primary-blue);
    font-size: 1.5rem;
    margin-left: 3px;
}

.video-duration {
    position: absolute;
    bottom: 10px;
    right: 10px;
    background: rgba(0, 0, 0, 0.8);
    color: white;
    padding: 4px 8px;
    border-radius: 4px;
    font-size: 0.875rem;
}

.video-card {
    transition: all 0.3s ease;
    border: none;
}

.video-card:hover {
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

@push('scripts')
<script>
function playVideo(videoUrl, title) {
    if (videoUrl) {
        // Convert YouTube watch URLs to embed URLs
        let embedUrl = videoUrl;
        if (videoUrl.includes('youtube.com/watch')) {
            const videoId = videoUrl.split('v=')[1];
            embedUrl = `https://www.youtube.com/embed/${videoId}`;
        } else if (videoUrl.includes('youtu.be/')) {
            const videoId = videoUrl.split('youtu.be/')[1];
            embedUrl = `https://www.youtube.com/embed/${videoId}`;
        }
        
        document.getElementById('videoModalLabel').textContent = title;
        document.getElementById('videoFrame').src = embedUrl;
        
        const modal = new bootstrap.Modal(document.getElementById('videoModal'));
        modal.show();
        
        // Clear video when modal is closed
        document.getElementById('videoModal').addEventListener('hidden.bs.modal', function () {
            document.getElementById('videoFrame').src = '';
        });
    } else {
        alert('Video coming soon! We\'re working on adding more student demonstration videos.');
    }
}
</script>
@endpush
@endsection