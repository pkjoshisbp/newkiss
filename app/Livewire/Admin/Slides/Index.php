<?php

namespace App\Livewire\Admin\Slides;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\HeroSlide;

class Index extends Component
{
    use WithPagination, WithFileUploads;

    protected $paginationTheme = 'bootstrap';

    public $heroSlideId;
    public $isEditing = false;
    
    // Add your model properties here
    
    protected function rules()
    {
        return [
            // Add validation rules
        ];
    }

    public function create()
    {
        $this->resetInputFields();
        $this->isEditing = false;
    }

    public function edit($id)
    {
        $heroSlide = HeroSlide::findOrFail($id);
        $this->heroSlideId = $id;
        $this->isEditing = true;
        
        // Fill properties from model
    }

    public function save()
    {
        $this->validate();

        if ($this->isEditing) {
            $heroSlide = HeroSlide::findOrFail($this->heroSlideId);
            // Update logic
        } else {
            // Create logic
        }

        session()->flash('message', $this->isEditing ? 'Updated successfully.' : 'Created successfully.');
        $this->resetInputFields();
    }

    public function delete($id)
    {
        HeroSlide::findOrFail($id)->delete();
        session()->flash('message', 'Deleted successfully.');
    }

    private function resetInputFields()
    {
        $this->heroSlideId = null;
        $this->isEditing = false;
    }

    public function render()
    {
        $items = HeroSlide::paginate(10);

        return view('livewire.admin.slides.index', [
            'items' => $items
        ])->layout('layouts.admin', [
            'title' => 'Slides',
            'header' => 'Slides Management'
        ]);
    }
}
