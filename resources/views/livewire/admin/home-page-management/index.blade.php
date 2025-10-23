<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Home Page Content Management</h1>
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
                    <h3 class="card-title">Homepage Sections</h3>
                </div>
                <div class="card-body">
                    @if($sections && $sections->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th width="50">Order</th>
                                        <th>Section</th>
                                        <th>Title</th>
                                        <th>Content Preview</th>
                                        <th width="100">Status</th>
                                        <th width="100">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sections as $section)
                                        <tr>
                                            <td>{{ $section->sort_order }}</td>
                                            <td><span class="badge badge-info">{{ $section->section_key }}</span></td>
                                            <td><strong>{{ $section->title ?: '-' }}</strong></td>
                                            <td>
                                                @if($section->content)
                                                    {{ Str::limit(strip_tags($section->content), 80) }}
                                                @elseif($section->subtitle)
                                                    {{ Str::limit($section->subtitle, 80) }}
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>
                                                @if($section->is_active)
                                                    <span class="badge badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-secondary">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <button wire:click="edit({{ $section->id }})" class="btn btn-sm btn-info">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-center text-muted">No sections found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- Modal --}}
    <div class="modal fade" id="sectionModal" tabindex="-1" wire:ignore.self>
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Homepage Section</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form wire:submit.prevent="save">
                    <div class="modal-body">
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle"></i> Editing section: <strong>{{ $section_key }}</strong>
                        </div>

                        <div class="form-group">
                            <label>Section Key (Identifier)</label>
                            <input type="text" wire:model="section_key" class="form-control" readonly>
                            <small class="form-text text-muted">This identifies which part of the homepage this content appears in</small>
                        </div>

                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" wire:model="title" class="form-control @error('title') is-invalid @enderror" 
                                   placeholder="Main heading for this section">
                            @error('title') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            <small class="form-text text-muted">The main heading displayed in this section</small>
                        </div>

                        <div class="form-group">
                            <label>Subtitle</label>
                            <textarea wire:model="subtitle" rows="2" 
                                      class="form-control @error('subtitle') is-invalid @enderror"
                                      placeholder="Supporting text or tagline"></textarea>
                            @error('subtitle') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            <small class="form-text text-muted">Optional secondary text (for hero section)</small>
                        </div>

                        <div class="form-group">
                            <label>Content</label>
                            <textarea wire:model="content" rows="4" 
                                      class="form-control @error('content') is-invalid @enderror"
                                      placeholder="Main content text for this section"></textarea>
                            @error('content') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            <small class="form-text text-muted">HTML tags are supported. This is the main text content for the section.</small>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Button Text</label>
                                    <input type="text" wire:model="button_text" 
                                           class="form-control @error('button_text') is-invalid @enderror" 
                                           placeholder="e.g., Learn More">
                                    @error('button_text') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                    <small class="form-text text-muted">Text shown on the call-to-action button</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Button Link</label>
                                    <input type="text" wire:model="button_link" 
                                           class="form-control @error('button_link') is-invalid @enderror" 
                                           placeholder="e.g., /programs/survival">
                                    @error('button_link') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                    <small class="form-text text-muted">URL or path for the button</small>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Sort Order</label>
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
                            <i class="fas fa-save"></i> Update Section
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('open-section-modal', () => {
                $('#sectionModal').modal('show');
            });
            
            Livewire.on('close-section-modal', () => {
                $('#sectionModal').modal('hide');
            });
        });
    </script>
    @endpush
</div>
