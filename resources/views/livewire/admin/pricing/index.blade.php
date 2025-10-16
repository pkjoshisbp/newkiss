<div>
    <x-slot name="header">Pricing Management</x-slot>
    <x-slot name="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Pricing</li>
    </x-slot>

    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('message') }}
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-dollar-sign"></i> Pricing List
            </h3>
            <div class="card-tools">
                <button wire:click="create" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#formModal">
                    <i class="fas fa-plus"></i> Add Pricing
                </button>
            </div>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>Program</th>
                        <th>Location</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Lessons</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($items as $item)
                        <tr>
                            <td>{{ $item->program->name ?? 'N/A' }}</td>
                            <td>{{ $item->location->name ?? 'N/A' }}</td>
                            <td>{{ $item->name }}</td>
                            <td>${{ number_format($item->price, 0) }}</td>
                            <td>{{ $item->lesson_count ?? 'N/A' }}</td>
                            <td>
                                <span class="badge badge-{{ $item->is_active ? 'success' : 'danger' }}">
                                    {{ $item->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td>
                                <button wire:click="edit({{ $item->id }})" class="btn btn-info btn-sm" data-toggle="modal" data-target="#formModal">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button wire:click="delete({{ $item->id }})" class="btn btn-danger btn-sm" 
                                        onclick="return confirm('Are you sure you want to delete this pricing plan?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No pricing plans found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer clearfix">
            {{ $items->links() }}
        </div>
    </div>

    <!-- Modal for Create/Edit -->
    <div class="modal fade" id="formModal" wire:ignore.self>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ $isEditing ? 'Edit' : 'Create' }} Pricing</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="program_id">Program *</label>
                                    <select wire:model="program_id" class="form-control @error('program_id') is-invalid @enderror" id="program_id">
                                        <option value="">Select Program</option>
                                        @foreach($programs as $program)
                                            <option value="{{ $program->id }}">{{ $program->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('program_id') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="location_id">Location *</label>
                                    <select wire:model="location_id" class="form-control @error('location_id') is-invalid @enderror" id="location_id">
                                        <option value="">Select Location</option>
                                        @foreach($locations as $location)
                                            <option value="{{ $location->id }}">{{ $location->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('location_id') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Plan Name *</label>
                                    <input type="text" wire:model="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="e.g., Survival Program (24 Lessons)">
                                    @error('name') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="price">Price ($) *</label>
                                    <input type="number" wire:model="price" class="form-control @error('price') is-invalid @enderror" id="price" step="0.01" min="0" placeholder="480.00">
                                    @error('price') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lesson_count">Number of Lessons</label>
                                    <input type="number" wire:model="lesson_count" class="form-control @error('lesson_count') is-invalid @enderror" id="lesson_count" min="1" placeholder="24">
                                    @error('lesson_count') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea wire:model="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="3" placeholder="Brief description of this pricing plan"></textarea>
                            @error('description') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>
                        
                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" wire:model="is_active" class="custom-control-input" id="is_active">
                                <label class="custom-control-label" for="is_active">Active</label>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" wire:click="save" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    window.addEventListener('close-modal', event => {
        $('#formModal').modal('hide');
    });
</script>
@endpush
