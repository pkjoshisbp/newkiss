<?php

namespace App\Livewire\Admin\Videos;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Video;

class Index extends Component
{
    use WithPagination, WithFileUploads;

    protected $paginationTheme = 'bootstrap';

    public $videoId;
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
        $video = Video::findOrFail($id);
        $this->videoId = $id;
        $this->isEditing = true;
        
        // Fill properties from model
    }

    public function save()
    {
        $this->validate();

        if ($this->isEditing) {
            $video = Video::findOrFail($this->videoId);
            // Update logic
        } else {
            // Create logic
        }

        session()->flash('message', $this->isEditing ? 'Updated successfully.' : 'Created successfully.');
        $this->resetInputFields();
    }

    public function delete($id)
    {
        Video::findOrFail($id)->delete();
        session()->flash('message', 'Deleted successfully.');
    }

    private function resetInputFields()
    {
        $this->videoId = null;
        $this->isEditing = false;
    }

    public function render()
    {
        $items = Video::paginate(10);

        return view('livewire.admin.videos.index', [
            'items' => $items
        ])->layout('layouts.admin', [
            'title' => 'Videos',
            'header' => 'Videos Management'
        ]);
    }
}
