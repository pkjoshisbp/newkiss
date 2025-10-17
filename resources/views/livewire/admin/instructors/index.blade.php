<div>
    <x-slot name="header">Instructors Management</x-slot>
    <x-slot name="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Instructors</li>
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
                <i class="fas fa-users"></i> Instructors List
            </h3>
            <div class="card-tools">
                <button wire:click="create" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#formModal">
                    <i class="fas fa-plus"></i> Add Instructor
                </button>
            </div>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th style="width: 80px;">Image</th>
                        <th>Name</th>
                        <th>Title</th>
                        <th>Location</th>
                        <th>Email</th>
                        <th>Order</th>
                        <th>Status</th>
                        <th style="width: 120px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($items as $item)
                        <tr>
                            <td>
                                @if($item->image)
                                    <img src="{{ asset($item->image) }}" alt="{{ $item->name }}" class="img-thumbnail" style="width: 60px; height: 60px; object-fit: cover;">
                                @else
                                    <div class="bg-secondary text-white d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                        <i class="fas fa-user"></i>
                                    </div>
                                @endif
                            </td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->title ?? '-' }}</td>
                            <td>{{ $item->location ?? '-' }}</td>
                            <td>{{ $item->email ?? '-' }}</td>
                            <td>{{ $item->order }}</td>
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
                                        onclick="return confirm('Are you sure you want to delete this instructor?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">No instructors found.</td>
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
                    <h4 class="modal-title">{{ $isEditing ? 'Edit' : 'Create' }} Instructor</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="name">Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                           wire:model="name" id="name" placeholder="Enter instructor name">
                                    @error('name') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="order">Display Order <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control @error('order') is-invalid @enderror" 
                                           wire:model="order" id="order" min="0">
                                    @error('order') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="title">Title/Position</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                   wire:model="title" id="title" placeholder="e.g., Lead Instructor, Founder">
                            @error('title') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="location">Location</label>
                                    <input type="text" class="form-control @error('location') is-invalid @enderror" 
                                           wire:model="location" id="location" placeholder="e.g., Twinsburg, All Locations">
                                    @error('location') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                           wire:model="email" id="email" placeholder="instructor@example.com">
                                    @error('email') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="newImage">Profile Image @if(!$isEditing)<span class="text-danger">*</span>@endif</label>
                            <input type="file" class="form-control-file @error('newImage') is-invalid @enderror" 
                                   wire:model="newImage" id="newImage" accept="image/*">
                            @error('newImage') <span class="invalid-feedback d-block">{{ $message }}</span> @enderror
                            
                            @if ($newImage)
                                <div class="mt-2">
                                    <img src="{{ $newImage->temporaryUrl() }}" alt="Preview" class="img-thumbnail" style="max-width: 150px;">
                                </div>
                            @elseif ($isEditing && $image)
                                <div class="mt-2">
                                    <p class="text-muted mb-1">Current image:</p>
                                    <img src="{{ asset($image) }}" alt="Current" class="img-thumbnail" style="max-width: 150px;">
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="bio">Short Bio (displayed on frontend)</label>
                            <textarea class="form-control @error('bio') is-invalid @enderror" 
                                      wire:model="bio" id="bio" rows="3" 
                                      placeholder="Brief description shown on instructor cards"></textarea>
                            @error('bio') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            <small class="form-text text-muted">Keep it concise - about 100-150 characters.</small>
                        </div>

                        <div class="form-group">
                            <label for="description">Full Description (stored for future use)</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      wire:model="description" id="description" rows="6" 
                                      placeholder="Detailed biography and credentials"></textarea>
                            @error('description') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            <small class="form-text text-muted">This is not currently displayed on the frontend but stored for future use.</small>
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" wire:model="is_active" id="is_active">
                                <label class="custom-control-label" for="is_active">Active (visible on website)</label>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" wire:click="save" class="btn btn-primary">
                        <i class="fas fa-save"></i> Save Instructor
                    </button>
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
