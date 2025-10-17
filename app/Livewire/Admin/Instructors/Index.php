<?php

namespace App\Livewire\Admin\Instructors;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Instructor;
use Illuminate\Support\Str;

class Index extends Component
{
    use WithPagination, WithFileUploads;

    protected $paginationTheme = 'bootstrap';

    public $instructorId;
    public $isEditing = false;
    
    // Model properties
    public $name;
    public $title;
    public $image;
    public $newImage;
    public $location;
    public $email;
    public $bio;
    public $description;
    public $order = 0;
    public $is_active = true;
    
    protected function rules()
    {
        $imageRule = $this->isEditing ? 'nullable' : 'required';
        
        return [
            'name' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'newImage' => $imageRule . '|image|max:2048',
            'location' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'bio' => 'nullable|string',
            'description' => 'nullable|string',
            'order' => 'required|integer|min:0',
            'is_active' => 'boolean',
        ];
    }

    public function create()
    {
        $this->resetInputFields();
        $this->isEditing = false;
    }

    public function edit($id)
    {
        $instructor = Instructor::findOrFail($id);
        $this->instructorId = $id;
        $this->isEditing = true;
        
        $this->name = $instructor->name;
        $this->title = $instructor->title;
        $this->image = $instructor->image;
        $this->location = $instructor->location;
        $this->email = $instructor->email;
        $this->bio = $instructor->bio;
        $this->description = $instructor->description;
        $this->order = $instructor->order;
        $this->is_active = $instructor->is_active;
    }

    public function save()
    {
        $this->validate();

        $data = [
            'name' => $this->name,
            'title' => $this->title,
            'location' => $this->location,
            'email' => $this->email,
            'bio' => $this->bio,
            'description' => $this->description,
            'order' => $this->order,
            'is_active' => $this->is_active,
        ];

        // Handle image upload
        if ($this->newImage) {
            $filename = Str::slug($this->name) . '-' . time() . '.' . $this->newImage->extension();
            $path = $this->newImage->storeAs('images/instructors', $filename, 'public');
            $data['image'] = '/storage/' . $path;
        } elseif ($this->isEditing) {
            $data['image'] = $this->image;
        }

        if ($this->isEditing) {
            $instructor = Instructor::findOrFail($this->instructorId);
            
            // Delete old image if new one is uploaded
            if ($this->newImage && $instructor->image) {
                $oldPath = str_replace('/storage/', '', $instructor->image);
                if (file_exists(storage_path('app/public/' . $oldPath))) {
                    unlink(storage_path('app/public/' . $oldPath));
                }
            }
            
            $instructor->update($data);
            $message = 'Instructor updated successfully.';
        } else {
            Instructor::create($data);
            $message = 'Instructor created successfully.';
        }

        session()->flash('message', $message);
        $this->resetInputFields();
        $this->dispatch('close-modal');
    }

    public function delete($id)
    {
        $instructor = Instructor::findOrFail($id);
        
        // Delete image file if exists
        if ($instructor->image) {
            $path = str_replace('/storage/', '', $instructor->image);
            if (file_exists(storage_path('app/public/' . $path))) {
                unlink(storage_path('app/public/' . $path));
            }
        }
        
        $instructor->delete();
        session()->flash('message', 'Instructor deleted successfully.');
    }

    private function resetInputFields()
    {
        $this->instructorId = null;
        $this->isEditing = false;
        $this->name = '';
        $this->title = '';
        $this->image = '';
        $this->newImage = null;
        $this->location = '';
        $this->email = '';
        $this->bio = '';
        $this->description = '';
        $this->order = 0;
        $this->is_active = true;
    }

    public function render()
    {
        $items = Instructor::orderBy('order')->paginate(10);

        return view('livewire.admin.instructors.index', [
            'items' => $items
        ])->layout('layouts.admin', [
            'title' => 'Instructors',
            'header' => 'Instructors Management'
        ]);
    }
}
