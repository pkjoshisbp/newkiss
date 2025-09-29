@extends('layouts.app')

@section('title', 'Our Instructors - K.I.S.S. Aquatics')
@section('description', 'Meet the K.I.S.S. Aquatics instructors who are certified and dedicated to teaching water safety and survival.')

@section('content')
<div class="container py-5">
    <div class="row mb-4">
        <div class="col-lg-8 mx-auto text-center">
            <h1 class="display-5 fw-bold text-kiss-blue">Our Instructors</h1>
            <p class="text-muted">Professional, caring, and highly trained instructors dedicated to your child’s safety.</p>
        </div>
    </div>

    @php($instructors = App\Models\InstructorNote::orderBy('sort_order')->get() ?? collect())

    <div class="row g-4">
        @forelse($instructors as $ins)
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 shadow-sm">
                @if(!empty($ins->photo_path))
                <img src="{{ Storage::url($ins->photo_path) }}" class="card-img-top" alt="{{ $ins->name }}">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $ins->name }}</h5>
                    <p class="card-text small text-muted">{!! nl2br(e($ins->bio)) !!}</p>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center text-muted">Instructor profiles coming soon.</div>
        @endforelse
    </div>
</div>
@endsection
