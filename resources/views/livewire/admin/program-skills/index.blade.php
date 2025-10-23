<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Program Skills Management</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('message') }}
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Select Program</label>
                            <select wire:model.live="selectedProgramId" class="form-control">
                                @foreach($programs as $program)
                                    <option value="{{ $program->id }}">{{ $program->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 text-right align-self-end">
                            <button wire:click="create" class="btn btn-primary">
                                <i class="fas fa-plus"></i> Add New Skill
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if($skills && $skills->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th width="50">Order</th>
                                        <th width="80">Icon</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th width="100">Status</th>
                                        <th width="150">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($skills as $skill)
                                        <tr>
                                            <td>{{ $skill->sort_order }}</td>
                                            <td class="text-center">
                                                <i class="{{ $skill->icon }} fa-2x text-primary"></i>
                                            </td>
                                            <td><strong>{{ $skill->title }}</strong></td>
                                            <td>{{ $skill->description }}</td>
                                            <td>
                                                @if($skill->is_active)
                                                    <span class="badge badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-secondary">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <button wire:click="edit({{ $skill->id }})" class="btn btn-sm btn-info">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button wire:click="delete({{ $skill->id }})" 
                                                        onclick="return confirm('Are you sure?')" 
                                                        class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-center text-muted">No skills found for this program. Click "Add New Skill" to create one.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- Modal --}}
    <div class="modal fade" id="skillModal" tabindex="-1" wire:ignore.self>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $isEditing ? 'Edit' : 'Add' }} Skill</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form wire:submit.prevent="save">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Program</label>
                            <select wire:model="program_id" class="form-control @error('program_id') is-invalid @enderror">
                                @foreach($programs as $program)
                                    <option value="{{ $program->id }}">{{ $program->name }}</option>
                                @endforeach
                            </select>
                            @error('program_id') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label>Title *</label>
                            <input type="text" wire:model="title" class="form-control @error('title') is-invalid @enderror" 
                                   placeholder="e.g., Breath Control">
                            @error('title') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            <small class="form-text text-muted">The main heading for this skill</small>
                        </div>

                        <div class="form-group">
                            <label>Description *</label>
                            <textarea wire:model="description" rows="3" 
                                      class="form-control @error('description') is-invalid @enderror"
                                      placeholder="Explain what this skill teaches..."></textarea>
                            @error('description') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            <small class="form-text text-muted">Brief description of the skill</small>
                        </div>

                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Icon (FontAwesome Class) *</label>
                                    <input type="text" wire:model.live="icon" 
                                           class="form-control @error('icon') is-invalid @enderror" 
                                           placeholder="e.g., fas fa-swimmer">
                                    @error('icon') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                    <small class="form-text text-muted">
                                        Use FontAwesome icons: 
                                        <a href="https://fontawesome.com/icons" target="_blank">Browse icons</a>
                                    </small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Icon Preview</label>
                                    <div class="text-center p-3 bg-light rounded">
                                        <i class="{{ $icon }} fa-3x text-primary"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Sort Order *</label>
                                    <input type="number" wire:model="sort_order" 
                                           class="form-control @error('sort_order') is-invalid @enderror" 
                                           min="0">
                                    @error('sort_order') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                    <small class="form-text text-muted">Display order (lower numbers first)</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Status</label>
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" wire:model="is_active" class="custom-control-input" id="isActiveSwitch">
                                        <label class="custom-control-label" for="isActiveSwitch">
                                            {{ $is_active ? 'Active' : 'Inactive' }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> {{ $isEditing ? 'Update' : 'Create' }} Skill
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('open-skill-modal', () => {
                $('#skillModal').modal('show');
            });
            
            Livewire.on('close-skill-modal', () => {
                $('#skillModal').modal('hide');
            });
        });
    </script>
    @endpush
</div>
