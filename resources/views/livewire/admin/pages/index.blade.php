<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Pages</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                        <li class="breadcrumb-item active">Pages</li>
                    </ol>
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

            <!-- Page Form Card -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-{{ $isEditing ? 'edit' : 'plus' }} mr-2"></i>
                        {{ $isEditing ? 'Edit Page' : 'Add New Page' }}
                    </h3>
                </div>
                <form wire:submit.prevent="{{ $isEditing ? 'update' : 'store' }}">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title">Page Title *</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                           wire:model="title" id="title" placeholder="Enter page title">
                                    @error('title') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="slug">Slug *</label>
                                    <input type="text" class="form-control @error('slug') is-invalid @enderror" 
                                           wire:model="slug" id="slug" placeholder="page-slug">
                                    @error('slug') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                    <small class="form-text text-muted">URL-friendly version (e.g., rules, privacy-policy)</small>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control @error('content') is-invalid @enderror" 
                                      wire:model="content" id="content" rows="15" 
                                      placeholder="Enter page content (HTML allowed)"></textarea>
                            @error('content') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            <small class="form-text text-muted">You can use HTML tags for formatting</small>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="meta_title">Meta Title</label>
                                    <input type="text" class="form-control @error('meta_title') is-invalid @enderror" 
                                           wire:model="meta_title" id="meta_title" placeholder="SEO title">
                                    @error('meta_title') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="custom-control custom-switch mt-4">
                                        <input type="checkbox" class="custom-control-input" 
                                               wire:model="is_published" id="is_published">
                                        <label class="custom-control-label" for="is_published">Published</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="meta_description">Meta Description</label>
                            <textarea class="form-control @error('meta_description') is-invalid @enderror" 
                                      wire:model="meta_description" id="meta_description" rows="3" 
                                      placeholder="SEO description (max 160 characters)"></textarea>
                            @error('meta_description') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save mr-2"></i>{{ $isEditing ? 'Update' : 'Save' }} Page
                        </button>
                        @if($isEditing)
                            <button type="button" wire:click="resetForm" class="btn btn-secondary">
                                <i class="fas fa-times mr-2"></i>Cancel
                            </button>
                        @endif
                    </div>
                </form>
            </div>

            <!-- Pages List Card -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-list mr-2"></i>All Pages</h3>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Title</th>
                                <th>Slug</th>
                                <th style="width: 100px">Status</th>
                                <th style="width: 150px">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pages as $page)
                                <tr>
                                    <td>{{ $page->id }}</td>
                                    <td>
                                        <strong>{{ $page->title }}</strong>
                                        @if($page->meta_title)
                                            <br>
                                            <small class="text-muted">SEO: {{ $page->meta_title }}</small>
                                        @endif
                                    </td>
                                    <td><code>{{ $page->slug }}</code></td>
                                    <td>
                                        @if($page->is_published)
                                            <span class="badge badge-success">Published</span>
                                        @else
                                            <span class="badge badge-warning">Draft</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button wire:click="edit({{ $page->id }})" class="btn btn-sm btn-info">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button wire:click="delete({{ $page->id }})" 
                                                class="btn btn-sm btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this page?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted">No pages found. Create your first one!</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">
                    {{ $pages->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
