<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage FAQs</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                        <li class="breadcrumb-item active">FAQs</li>
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

            <!-- FAQ Form Card -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-{{ $isEditing ? 'edit' : 'plus' }} mr-2"></i>
                        {{ $isEditing ? 'Edit FAQ' : 'Add New FAQ' }}
                    </h3>
                </div>
                <form wire:submit.prevent="{{ $isEditing ? 'update' : 'store' }}">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="question">Question *</label>
                                    <input type="text" class="form-control @error('question') is-invalid @enderror" 
                                           wire:model="question" id="question" placeholder="Enter question">
                                    @error('question') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <select class="form-control @error('category') is-invalid @enderror" 
                                            wire:model="category" id="category">
                                        <option value="">Select Category</option>
                                        <option value="general">General</option>
                                        <option value="programs">Programs</option>
                                        <option value="pricing">Pricing</option>
                                        <option value="safety">Safety</option>
                                        <option value="logistics">Logistics</option>
                                    </select>
                                    @error('category') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="answer">Answer *</label>
                            <textarea class="form-control @error('answer') is-invalid @enderror" 
                                      wire:model="answer" id="answer" rows="4" 
                                      placeholder="Enter answer"></textarea>
                            @error('answer') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sort_order">Sort Order</label>
                                    <input type="number" class="form-control @error('sort_order') is-invalid @enderror" 
                                           wire:model="sort_order" id="sort_order" min="0">
                                    @error('sort_order') <span class="invalid-feedback">{{ $message }}</span> @enderror
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
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save mr-2"></i>{{ $isEditing ? 'Update' : 'Save' }} FAQ
                        </button>
                        @if($isEditing)
                            <button type="button" wire:click="resetForm" class="btn btn-secondary">
                                <i class="fas fa-times mr-2"></i>Cancel
                            </button>
                        @endif
                    </div>
                </form>
            </div>

            <!-- FAQs List Card -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-list mr-2"></i>All FAQs</h3>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Question</th>
                                <th>Category</th>
                                <th style="width: 80px">Sort</th>
                                <th style="width: 100px">Status</th>
                                <th style="width: 150px">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($faqs as $faq)
                                <tr>
                                    <td>{{ $faq->id }}</td>
                                    <td>
                                        <strong>{{ $faq->question }}</strong>
                                        <br>
                                        <small class="text-muted">{{ \Str::limit($faq->answer, 100) }}</small>
                                    </td>
                                    <td>
                                        @if($faq->category)
                                            <span class="badge badge-info">{{ ucfirst($faq->category) }}</span>
                                        @else
                                            <span class="badge badge-secondary">Uncategorized</span>
                                        @endif
                                    </td>
                                    <td>{{ $faq->sort_order }}</td>
                                    <td>
                                        @if($faq->is_published)
                                            <span class="badge badge-success">Published</span>
                                        @else
                                            <span class="badge badge-warning">Draft</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button wire:click="edit({{ $faq->id }})" class="btn btn-sm btn-info">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button wire:click="delete({{ $faq->id }})" 
                                                class="btn btn-sm btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this FAQ?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted">No FAQs found. Create your first one!</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">
                    {{ $faqs->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
