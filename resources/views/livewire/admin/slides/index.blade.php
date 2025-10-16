<div>
    <x-slot name="header">Slides Management</x-slot>
    <x-slot name="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Slides</li>
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
                <i class="fas fa-images"></i> Slides List
            </h3>
            <div class="card-tools">
                <button wire:click="create" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#formModal">
                    <i class="fas fa-plus"></i> Add Slide
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
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ $isEditing ? 'Edit' : 'Create' }} Slide</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <!-- Add your form fields here -->
                    <p class="text-muted">Form fields need to be implemented</p>
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
