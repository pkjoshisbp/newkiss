<div>
    <x-slot name="header">Dashboard</x-slot>
    <x-slot name="breadcrumb">
        <li class="breadcrumb-item active">Dashboard</li>
    </x-slot>

    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $stats['programs'] }}</h3>
                    <p>Programs</p>
                </div>
                <div class="icon">
                    <i class="fas fa-swimming-pool"></i>
                </div>
                <a href="{{ route('admin.programs') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $stats['locations'] }}</h3>
                    <p>Locations</p>
                </div>
                <div class="icon">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <a href="{{ route('admin.locations') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $stats['videos'] }}</h3>
                    <p>Videos</p>
                </div>
                <div class="icon">
                    <i class="fas fa-video"></i>
                </div>
                <a href="{{ route('admin.videos') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $stats['pricing_plans'] }}</h3>
                    <p>Pricing Plans</p>
                </div>
                <div class="icon">
                    <i class="fas fa-dollar-sign"></i>
                </div>
                <a href="{{ route('admin.pricing') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Quick Actions</h3>
                </div>
                <div class="card-body">
                    <a href="{{ route('admin.slides') }}" class="btn btn-primary mr-2">
                        <i class="fas fa-images"></i> Manage Slides
                    </a>
                    <a href="{{ route('admin.programs') }}" class="btn btn-info mr-2">
                        <i class="fas fa-plus"></i> Add Program
                    </a>
                    <a href="{{ route('admin.locations') }}" class="btn btn-success mr-2">
                        <i class="fas fa-plus"></i> Add Location
                    </a>
                    <a href="{{ route('admin.settings') }}" class="btn btn-secondary">
                        <i class="fas fa-cog"></i> Site Settings
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
