<?php

/**
 * KISS Aquatics Admin Components Generator
 * Run with: php generate-admin-components.php
 */

echo "Generating Admin Components...\n\n";

$components = [
    'Slides' => [
        'model' => 'HeroSlide',
        'fields' => ['image_path', 'title', 'alt_text', 'sort_order', 'is_active'],
        'icon' => 'images'
    ],
    'Locations' => [
        'model' => 'Location',
        'fields' => ['name', 'address', 'city', 'state', 'zip', 'phone', 'email', 'sort_order', 'is_active'],
        'icon' => 'map-marker-alt'
    ],
    'Pricing' => [
        'model' => 'PricingPlan',
        'fields' => ['name', 'location_id', 'price', 'description', 'duration', 'sort_order', 'is_active'],
        'icon' => 'dollar-sign'
    ],
    'Programs' => [
        'model' => 'Program',
        'fields' => ['name', 'slug', 'short_description', 'description', 'image_path', 'sort_order', 'is_active'],
        'icon' => 'swimming-pool'
    ],
    'Videos' => [
        'model' => 'Video',
        'fields' => ['title', 'description', 'video_url', 'thumbnail_url', 'sort_order', 'is_published'],
        'icon' => 'video'
    ],
    'Settings' => [
        'model' => 'SiteSetting',
        'fields' => ['key', 'value', 'type', 'description'],
        'icon' => 'cog'
    ]
];

foreach ($components as $name => $config) {
    echo "Creating {$name} component...\n";
    
    $className = "App\\Livewire\\Admin\\{$name}\\Index";
    $viewPath = "resources/views/livewire/admin/" . strtolower($name) . "/index.blade.php";
    $classPath = "app/Livewire/Admin/{$name}/Index.php";
    
    // Create component class file content
    $classContent = generateComponentClass($name, $config);
    
    // Create view file content
    $viewContent = generateComponentView($name, $config);
    
    // Write files
    @mkdir(dirname($classPath), 0755, true);
    file_put_contents($classPath, $classContent);
    
    @mkdir(dirname($viewPath), 0755, true);
    file_put_contents($viewPath, $viewContent);
    
    echo "✓ {$name} component created\n";
}

echo "\nAll components generated successfully!\n";

function generateComponentClass($name, $config) {
    $model = $config['model'];
    $modelVar = lcfirst($model);
    
    return <<<PHP
<?php

namespace App\Livewire\Admin\\{$name};

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\\{$model};

class Index extends Component
{
    use WithPagination, WithFileUploads;

    protected \$paginationTheme = 'bootstrap';

    public \${$modelVar}Id;
    public \$isEditing = false;
    
    // Add your model properties here
    
    protected function rules()
    {
        return [
            // Add validation rules
        ];
    }

    public function create()
    {
        \$this->resetInputFields();
        \$this->isEditing = false;
    }

    public function edit(\$id)
    {
        \${$modelVar} = {$model}::findOrFail(\$id);
        \$this->{$modelVar}Id = \$id;
        \$this->isEditing = true;
        
        // Fill properties from model
    }

    public function save()
    {
        \$this->validate();

        if (\$this->isEditing) {
            \${$modelVar} = {$model}::findOrFail(\$this->{$modelVar}Id);
            // Update logic
        } else {
            // Create logic
        }

        session()->flash('message', \$this->isEditing ? 'Updated successfully.' : 'Created successfully.');
        \$this->resetInputFields();
    }

    public function delete(\$id)
    {
        {$model}::findOrFail(\$id)->delete();
        session()->flash('message', 'Deleted successfully.');
    }

    private function resetInputFields()
    {
        \$this->{$modelVar}Id = null;
        \$this->isEditing = false;
    }

    public function render()
    {
        \$items = {$model}::paginate(10);

        return view('livewire.admin.{strtolower($name)}.index', [
            'items' => \$items
        ])->layout('layouts.admin', [
            'title' => '{$name}',
            'header' => '{$name} Management'
        ]);
    }
}

PHP;
}

function generateComponentView($name, $config) {
    $icon = $config['icon'];
    $singular = rtrim($name, 's');
    
    return <<<BLADE
<div>
    <x-slot name="header">{$name} Management</x-slot>
    <x-slot name="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">{$name}</li>
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
                <i class="fas fa-{$icon}"></i> {$name} List
            </h3>
            <div class="card-tools">
                <button wire:click="create" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#formModal">
                    <i class="fas fa-plus"></i> Add {$singular}
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
                    @forelse(\$items as \$item)
                        <tr>
                            <td>{{ \$item->id }}</td>
                            <td>{{ \$item->name ?? \$item->title ?? 'N/A' }}</td>
                            <td>
                                @if(isset(\$item->is_active))
                                    <span class="badge badge-{{ \$item->is_active ? 'success' : 'danger' }}">
                                        {{ \$item->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                @endif
                            </td>
                            <td>
                                <button wire:click="edit({{ \$item->id }})" class="btn btn-info btn-sm" data-toggle="modal" data-target="#formModal">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button wire:click="delete({{ \$item->id }})" class="btn btn-danger btn-sm" 
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
            {{ \$items->links() }}
        </div>
    </div>

    <!-- Modal for Create/Edit -->
    <div class="modal fade" id="formModal" wire:ignore.self>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ \$isEditing ? 'Edit' : 'Create' }} {$singular}</h4>
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

BLADE;
}

PHP;
