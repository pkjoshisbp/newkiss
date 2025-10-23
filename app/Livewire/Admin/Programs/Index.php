<?php

namespace App\Livewire\Admin\Programs;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Program;
use Illuminate\Support\Str;

class Index extends Component
{
    use WithPagination, WithFileUploads;

    protected $paginationTheme = 'bootstrap';

    public $programId;
    public $isEditing = false;
    
    // Model properties
    public $name;
    public $slug;
    public $description;
    public $short_description;
    public $full_content;
    public $age_range;
    public $lesson_count = 24;
    public $duration_minutes = 10;
    public $image;
    public $newImage;
    public $is_active = true;
    public $sort_order = 0;
    
    protected function rules()
    {
        $imageRule = $this->isEditing ? 'nullable' : 'nullable';
        
        return [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:programs,slug,' . ($this->programId ?? 'NULL'),
            'description' => 'required|string',
            'short_description' => 'nullable|string',
            'full_content' => 'nullable|string',
            'age_range' => 'nullable|string|max:100',
            'lesson_count' => 'required|integer|min:1',
            'duration_minutes' => 'required|numeric|min:1',
            'newImage' => $imageRule . '|image|max:2048',
            'is_active' => 'boolean',
            'sort_order' => 'required|integer|min:0',
        ];
    }

    public function updatedName($value)
    {
        if (!$this->isEditing) {
            $this->slug = Str::slug($value);
        }
    }

    public function create()
    {
        $this->resetInputFields();
        $this->isEditing = false;
    }

    public function edit($id)
    {
        $program = Program::findOrFail($id);
        $this->programId = $id;
        $this->isEditing = true;
        
        $this->name = $program->name;
        $this->slug = $program->slug;
        $this->description = $program->description;
        $this->short_description = $program->short_description;
        $this->full_content = $program->full_content;
        $this->age_range = $program->age_range;
        $this->lesson_count = $program->lesson_count;
        $this->duration_minutes = $program->duration_minutes;
        $this->image = $program->image;
        $this->is_active = $program->is_active;
        $this->sort_order = $program->sort_order;
    }

    public function save()
    {
        $this->validate();

        $data = [
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'short_description' => $this->short_description,
            'full_content' => $this->full_content,
            'age_range' => $this->age_range,
            'lesson_count' => $this->lesson_count,
            'duration_minutes' => $this->duration_minutes,
            'is_active' => $this->is_active,
            'sort_order' => $this->sort_order,
        ];

        // Handle image upload
        if ($this->newImage) {
            $filename = Str::slug($this->name) . '-' . time() . '.' . $this->newImage->extension();
            $path = $this->newImage->storeAs('images/programs', $filename, 'public');
            $data['image'] = '/storage/' . $path;
        } elseif ($this->isEditing) {
            $data['image'] = $this->image;
        }

        if ($this->isEditing) {
            $program = Program::findOrFail($this->programId);
            
            // Delete old image if new one is uploaded
            if ($this->newImage && $program->image) {
                $oldPath = str_replace('/storage/', '', $program->image);
                if (file_exists(storage_path('app/public/' . $oldPath))) {
                    unlink(storage_path('app/public/' . $oldPath));
                }
            }
            
            $program->update($data);
            $message = 'Program updated successfully.';
        } else {
            Program::create($data);
            $message = 'Program created successfully.';
        }

        session()->flash('message', $message);
        $this->resetInputFields();
        $this->dispatch('close-modal');
    }

    public function delete($id)
    {
        $program = Program::findOrFail($id);
        
        // Delete image file if exists
        if ($program->image) {
            $path = str_replace('/storage/', '', $program->image);
            if (file_exists(storage_path('app/public/' . $path))) {
                unlink(storage_path('app/public/' . $path));
            }
        }
        
        $program->delete();
        session()->flash('message', 'Program deleted successfully.');
    }

    private function resetInputFields()
    {
        $this->programId = null;
        $this->isEditing = false;
        $this->name = '';
        $this->slug = '';
        $this->description = '';
        $this->short_description = '';
        $this->full_content = '';
        $this->age_range = '';
        $this->lesson_count = 24;
        $this->duration_minutes = 10;
        $this->image = '';
        $this->newImage = null;
        $this->is_active = true;
        $this->sort_order = 0;
    }

    public function render()
    {
        $items = Program::orderBy('sort_order')->paginate(10);

        return view('livewire.admin.programs.index', [
            'items' => $items
        ])->layout('layouts.admin', [
            'title' => 'Programs',
            'header' => 'Programs Management'
        ]);
    }
}
