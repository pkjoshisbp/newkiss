<?php

namespace App\Livewire\Admin\Programs;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Program;

class Index extends Component
{
    use WithPagination, WithFileUploads;

    protected $paginationTheme = 'bootstrap';

    public $programId;
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
        $program = Program::findOrFail($id);
        $this->programId = $id;
        $this->isEditing = true;
        
        // Fill properties from model
    }

    public function save()
    {
        $this->validate();

        if ($this->isEditing) {
            $program = Program::findOrFail($this->programId);
            // Update logic
        } else {
            // Create logic
        }

        session()->flash('message', $this->isEditing ? 'Updated successfully.' : 'Created successfully.');
        $this->resetInputFields();
    }

    public function delete($id)
    {
        Program::findOrFail($id)->delete();
        session()->flash('message', 'Deleted successfully.');
    }

    private function resetInputFields()
    {
        $this->programId = null;
        $this->isEditing = false;
    }

    public function render()
    {
        $items = Program::paginate(10);

        return view('livewire.admin.programs.index', [
            'items' => $items
        ])->layout('layouts.admin', [
            'title' => 'Programs',
            'header' => 'Programs Management'
        ]);
    }
}
