<?php

namespace App\Livewire\Admin\ProgramSkills;

use Livewire\Component;
use App\Models\Program;
use App\Models\ProgramSkill;

class Index extends Component
{
    public $programs;
    public $selectedProgramId;
    public $skills;
    
    // Form fields
    public $skillId;
    public $program_id;
    public $title;
    public $description;
    public $icon = 'fas fa-star';
    public $sort_order = 0;
    public $is_active = true;
    
    public $isEditing = false;

    public function mount()
    {
        $this->programs = Program::orderBy('name')->get();
        if ($this->programs->count() > 0) {
            $this->selectedProgramId = $this->programs->first()->id;
            $this->loadSkills();
        }
    }

    public function updatedSelectedProgramId()
    {
        $this->loadSkills();
    }

    public function loadSkills()
    {
        if ($this->selectedProgramId) {
            $this->skills = ProgramSkill::where('program_id', $this->selectedProgramId)
                ->ordered()
                ->get();
        }
    }

    public function create()
    {
        $this->resetForm();
        $this->program_id = $this->selectedProgramId;
        $this->isEditing = false;
        $this->dispatch('open-skill-modal');
    }

    public function edit($id)
    {
        $skill = ProgramSkill::findOrFail($id);
        $this->skillId = $skill->id;
        $this->program_id = $skill->program_id;
        $this->title = $skill->title;
        $this->description = $skill->description;
        $this->icon = $skill->icon;
        $this->sort_order = $skill->sort_order;
        $this->is_active = $skill->is_active;
        $this->isEditing = true;
        $this->dispatch('open-skill-modal');
    }

    public function save()
    {
        $this->validate([
            'program_id' => 'required|exists:programs,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|string|max:255',
            'sort_order' => 'required|integer|min:0',
            'is_active' => 'boolean',
        ]);

        $data = [
            'program_id' => $this->program_id,
            'title' => $this->title,
            'description' => $this->description,
            'icon' => $this->icon,
            'sort_order' => $this->sort_order,
            'is_active' => $this->is_active,
        ];

        if ($this->isEditing && $this->skillId) {
            $skill = ProgramSkill::findOrFail($this->skillId);
            $skill->update($data);
            session()->flash('message', 'Skill updated successfully.');
        } else {
            ProgramSkill::create($data);
            session()->flash('message', 'Skill created successfully.');
        }

        $this->dispatch('close-skill-modal');
        $this->resetForm();
        $this->loadSkills();
    }

    public function delete($id)
    {
        $skill = ProgramSkill::findOrFail($id);
        $skill->delete();
        
        session()->flash('message', 'Skill deleted successfully.');
        $this->loadSkills();
    }

    private function resetForm()
    {
        $this->skillId = null;
        $this->program_id = $this->selectedProgramId;
        $this->title = '';
        $this->description = '';
        $this->icon = 'fas fa-star';
        $this->sort_order = 0;
        $this->is_active = true;
    }

    public function render()
    {
        return view('livewire.admin.program-skills.index')->layout('layouts.admin');
    }
}
