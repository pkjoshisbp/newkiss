<?php

namespace App\Livewire\Admin\Settings;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\SiteSetting;

class Index extends Component
{
    use WithPagination, WithFileUploads;

    protected $paginationTheme = 'bootstrap';

    public $siteSettingId;
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
        $siteSetting = SiteSetting::findOrFail($id);
        $this->siteSettingId = $id;
        $this->isEditing = true;
        
        // Fill properties from model
    }

    public function save()
    {
        $this->validate();

        if ($this->isEditing) {
            $siteSetting = SiteSetting::findOrFail($this->siteSettingId);
            // Update logic
        } else {
            // Create logic
        }

        session()->flash('message', $this->isEditing ? 'Updated successfully.' : 'Created successfully.');
        $this->resetInputFields();
    }

    public function delete($id)
    {
        SiteSetting::findOrFail($id)->delete();
        session()->flash('message', 'Deleted successfully.');
    }

    private function resetInputFields()
    {
        $this->siteSettingId = null;
        $this->isEditing = false;
    }

    public function render()
    {
        $items = SiteSetting::paginate(10);

        return view('livewire.admin.settings.index', [
            'items' => $items
        ])->layout('layouts.admin', [
            'title' => 'Settings',
            'header' => 'Settings Management'
        ]);
    }
}
