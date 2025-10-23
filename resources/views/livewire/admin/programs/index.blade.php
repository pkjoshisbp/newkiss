<div>
    <x-slot name="header">Programs Management</x-slot>
    <x-slot name="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Programs</li>
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
                <i class="fas fa-swimming-pool"></i> Programs List
            </h3>
            <div class="card-tools">
                <button wire:click="create" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#formModal">
                    <i class="fas fa-plus"></i> Add Program
                </button>
            </div>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($items as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name ?? $item->title ?? 'N/A' }}</td>
                            <td>
                                @if(isset($item->is_active))
                                    <span class="badge badge-{{ $item->is_active ? 'success' : 'danger' }}">
                                        {{ $item->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                @endif
                            </td>
                            <td>
                                <button wire:click="edit({{ $item->id }})" class="btn btn-info btn-sm" data-toggle="modal" data-target="#formModal">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button wire:click="delete({{ $item->id }})" class="btn btn-danger btn-sm" 
                                        onclick="return confirm('Are you sure?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No records found.</td>
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
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ $isEditing ? 'Edit' : 'Create' }} Program</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="name">Program Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                           wire:model="name" id="name" placeholder="Enter program name">
                                    @error('name') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="slug">Slug <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('slug') is-invalid @enderror" 
                                           wire:model="slug" id="slug" placeholder="program-slug">
                                    @error('slug') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="age_range">Age Range</label>
                                    <input type="text" class="form-control @error('age_range') is-invalid @enderror" 
                                           wire:model="age_range" id="age_range" placeholder="e.g., 6 months - 6 years">
                                    @error('age_range') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="lesson_count">Lesson Count <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control @error('lesson_count') is-invalid @enderror" 
                                           wire:model="lesson_count" id="lesson_count" min="1">
                                    @error('lesson_count') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="duration_minutes">Duration (minutes) <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control @error('duration_minutes') is-invalid @enderror" 
                                           wire:model="duration_minutes" id="duration_minutes" min="1" step="0.1">
                                    @error('duration_minutes') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="newImage">Program Image</label>
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
                            <label for="description">Description <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      wire:model="description" id="description" rows="3" 
                                      placeholder="Brief program description"></textarea>
                            @error('description') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="short_description">Short Description</label>
                            <textarea class="form-control @error('short_description') is-invalid @enderror" 
                                      wire:model="short_description" id="short_description" rows="2" 
                                      placeholder="One-line summary for cards and headers"></textarea>
                            @error('short_description') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            <small class="form-text text-muted">Used in program overview section.</small>
                        </div>

                        <div class="form-group">
                            <label for="full_content">Full Content (HTML Supported)</label>
                            <textarea class="form-control @error('full_content') is-invalid @enderror" 
                                      wire:model="full_content" id="full_content" rows="10" 
                                      placeholder="Detailed program content with HTML formatting..."></textarea>
                            @error('full_content') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            <small class="form-text text-muted">
                                Full program details displayed on the program page. HTML tags are supported (p, ul, li, strong, em, etc.)
                            </small>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sort_order">Display Order <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control @error('sort_order') is-invalid @enderror" 
                                           wire:model="sort_order" id="sort_order" min="0">
                                    @error('sort_order') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="custom-control custom-switch mt-4">
                                        <input type="checkbox" class="custom-control-input" wire:model="is_active" id="is_active">
                                        <label class="custom-control-label" for="is_active">Active (visible on website)</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" wire:click="save" class="btn btn-primary">
                        <i class="fas fa-save"></i> Save Program
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
