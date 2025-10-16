<?php

namespace App\Livewire\Admin\Locations;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Location;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{
    use WithPagination, WithFileUploads;

    protected $paginationTheme = 'bootstrap';

    public $locationId;
    public $name;
    public $email;
    public $phone;
    public $address;
    public $city;
    public $state = 'OH';
    public $zip;
    public $notes;
    public $description;
    public $image;
    public $existingImage;
    public $is_active = true;
    public $sort_order = 0;
    public $isEditing = false;
    
    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'required|string|max:500',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:2',
            'zip' => 'required|string|max:10',
            'notes' => 'nullable|string',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'is_active' => 'boolean',
            'sort_order' => 'integer|min:0',
        ];
    }

    public function create()
    {
        $this->resetInputFields();
        $this->isEditing = false;
    }

    public function edit($id)
    {
        $location = Location::findOrFail($id);
        $this->locationId = $id;
        $this->name = $location->name;
        $this->email = $location->email;
        $this->phone = $location->phone;
        $this->address = $location->address;
        $this->city = $location->city;
        $this->state = $location->state;
        $this->zip = $location->zip;
        $this->notes = $location->notes;
        $this->description = $location->description;
        $this->existingImage = $location->image;
        $this->is_active = $location->is_active;
        $this->sort_order = $location->sort_order;
        $this->isEditing = true;
    }

    public function save()
    {
        $this->validate();

        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'city' => $this->city,
            'state' => $this->state,
            'zip' => $this->zip,
            'notes' => $this->notes,
            'description' => $this->description,
            'is_active' => $this->is_active,
            'sort_order' => $this->sort_order,
        ];

        // Handle image upload
        if ($this->image) {
            $imagePath = $this->image->store('locations', 'public');
            $data['image'] = $imagePath;

            // Delete old image if editing
            if ($this->isEditing && $this->existingImage) {
                Storage::disk('public')->delete($this->existingImage);
            }
        }

        if ($this->isEditing) {
            $location = Location::findOrFail($this->locationId);
            $location->update($data);
            session()->flash('message', 'Location updated successfully.');
        } else {
            Location::create($data);
            session()->flash('message', 'Location created successfully.');
        }

        $this->resetInputFields();
        $this->dispatch('close-modal');
    }

    public function delete($id)
    {
        $location = Location::findOrFail($id);
        
        // Delete image if exists
        if ($location->image) {
            Storage::disk('public')->delete($location->image);
        }
        
        $location->delete();
        session()->flash('message', 'Location deleted successfully.');
    }

    private function resetInputFields()
    {
        $this->locationId = null;
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->address = '';
        $this->city = '';
        $this->state = 'OH';
        $this->zip = '';
        $this->notes = '';
        $this->description = '';
        $this->image = null;
        $this->existingImage = null;
        $this->is_active = true;
        $this->sort_order = 0;
        $this->isEditing = false;
    }

    public function render()
    {
        $items = Location::orderBy('sort_order')->paginate(10);

        return view('livewire.admin.locations.index', [
            'items' => $items
        ])->layout('layouts.admin', [
            'title' => 'Locations',
            'header' => 'Locations Management'
        ]);
    }
}
