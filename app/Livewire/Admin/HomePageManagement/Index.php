<?php

namespace App\Livewire\Admin\HomePageManagement;

use Livewire\Component;
use App\Models\HomePageContent;

class Index extends Component
{
    public $sections;
    
    // Form fields
    public $sectionId;
    public $section_key;
    public $title;
    public $subtitle;
    public $content;
    public $button_text;
    public $button_link;
    public $is_active = true;
    public $sort_order = 0;
    
    public $isEditing = false;

    public function mount()
    {
        $this->loadSections();
    }

    public function loadSections()
    {
        $this->sections = HomePageContent::ordered()->get();
    }

    public function edit($id)
    {
        $section = HomePageContent::findOrFail($id);
        $this->sectionId = $section->id;
        $this->section_key = $section->section_key;
        $this->title = $section->title;
        $this->subtitle = $section->subtitle;
        $this->content = $section->content;
        $this->button_text = $section->button_text;
        $this->button_link = $section->button_link;
        $this->is_active = $section->is_active;
        $this->sort_order = $section->sort_order;
        $this->isEditing = true;
        $this->dispatch('open-section-modal');
    }

    public function save()
    {
        $this->validate([
            'section_key' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string',
            'content' => 'nullable|string',
            'button_text' => 'nullable|string|max:255',
            'button_link' => 'nullable|string|max:500',
            'is_active' => 'boolean',
            'sort_order' => 'required|integer|min:0',
        ]);

        $data = [
            'section_key' => $this->section_key,
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'content' => $this->content,
            'button_text' => $this->button_text,
            'button_link' => $this->button_link,
            'is_active' => $this->is_active,
            'sort_order' => $this->sort_order,
        ];

        if ($this->isEditing && $this->sectionId) {
            $section = HomePageContent::findOrFail($this->sectionId);
            $section->update($data);
            session()->flash('message', 'Section updated successfully.');
        }

        $this->dispatch('close-section-modal');
        $this->resetForm();
        $this->loadSections();
    }

    private function resetForm()
    {
        $this->sectionId = null;
        $this->section_key = '';
        $this->title = '';
        $this->subtitle = '';
        $this->content = '';
        $this->button_text = '';
        $this->button_link = '';
        $this->is_active = true;
        $this->sort_order = 0;
    }

    public function render()
    {
        return view('livewire.admin.home-page-management.index')->layout('layouts.admin');
    }
}
