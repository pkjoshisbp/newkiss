<div>
@section('content')
<div class="container py-5">
    <div class="row mb-4">
        <div class="col-lg-8 mx-auto text-center">
            <h1 class="display-5 fw-bold text-kiss-blue">Program Rules</h1>
            <p class="text-muted">Please review and follow these guidelines to ensure a safe and productive lesson experience.</p>
        </div>
    </div>

    @php($rules = App\Models\Page::where('slug', 'rules')->first())
    <div class="row">
        <div class="col-lg-10 mx-auto">
            @if($rules)
                <div class="card border-0 bg-light">
                    <div class="card-body p-4">
                        {!! $rules->content !!}
                    </div>
                </div>
            @else
                <div class="alert alert-info">Rules content will be available soon.</div>
            @endif
        </div>
    </div>
</div>
</div>
