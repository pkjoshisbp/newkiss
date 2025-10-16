<div>
    <x-slot name="header">Locations Management</x-slot>
    <x-slot name="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Locations</li>
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
                <i class="fas fa-map-marker-alt"></i> Locations List
            </h3>
            <div class="card-tools">
                <button wire:click="create" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#formModal">
                    <i class="fas fa-plus"></i> Add Location
                </button>
            </div>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>City</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($items as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->city }}, {{ $item->state }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->phone }}</td>
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
                                        onclick="return confirm('Are you sure you want to delete this location?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No locations found.</td>
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
                    <h4 class="modal-title">{{ $isEditing ? 'Edit' : 'Create' }} Location</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="image">Location Image</label>
                                    <input type="file" wire:model="image" class="form-control @error('image') is-invalid @enderror" id="image" accept="image/*">
                                    @error('image') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                    @if ($image)
                                        <div class="mt-2">
                                            <img src="{{ $image->temporaryUrl() }}" class="img-thumbnail" style="max-height: 150px;">
                                            <p class="small text-muted mt-1">Preview of new image</p>
                                        </div>
                                    @elseif ($existingImage)
                                        <div class="mt-2">
                                            <img src="{{ asset('storage/' . $existingImage) }}" class="img-thumbnail" style="max-height: 150px;">
                                            <p class="small text-muted mt-1">Current image</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Location Name *</label>
                                    <input type="text" wire:model="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="e.g., Twinsburg">
                                    @error('name') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email *</label>
                                    <input type="email" wire:model="email" class="form-control @error('email') is-invalid @enderror" id="email">
                                    @error('email') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" wire:model="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" placeholder="(216) 469-6400">
                                    @error('phone') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address">Address *</label>
                                    <input type="text" wire:model="address" class="form-control @error('address') is-invalid @enderror" id="address">
                                    @error('address') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="city">City *</label>
                                    <input type="text" wire:model="city" class="form-control @error('city') is-invalid @enderror" id="city">
                                    @error('city') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="state">State *</label>
                                    <input type="text" wire:model="state" class="form-control @error('state') is-invalid @enderror" id="state" maxlength="2">
                                    @error('state') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="zip">ZIP Code *</label>
                                    <input type="text" wire:model="zip" class="form-control @error('zip') is-invalid @enderror" id="zip">
                                    @error('zip') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea wire:model="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="2" placeholder="Brief description or additional details about this location"></textarea>
                            @error('description') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="notes">Notes (Internal)</label>
                            <textarea wire:model="notes" class="form-control @error('notes') is-invalid @enderror" id="notes" rows="2" placeholder="Internal notes (not displayed to public)"></textarea>
                            @error('notes') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sort_order">Sort Order</label>
                                    <input type="number" wire:model="sort_order" class="form-control @error('sort_order') is-invalid @enderror" id="sort_order" min="0">
                                    @error('sort_order') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="custom-control custom-switch mt-4">
                                        <input type="checkbox" wire:model="is_active" class="custom-control-input" id="is_active">
                                        <label class="custom-control-label" for="is_active">Active</label>
                                    </div>
                                </div>
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
