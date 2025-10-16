<?php

namespace App\Livewire\Admin\Pricing;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\{PricingPlan, Program, Location};

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $pricingPlanId;
    public $program_id;
    public $location_id;
    public $name;
    public $price;
    public $lesson_count;
    public $description;
    public $is_active = true;
    public $isEditing = false;
    
    protected function rules()
    {
        return [
            'program_id' => 'required|exists:programs,id',
            'location_id' => 'required|exists:locations,id',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'lesson_count' => 'nullable|integer|min:1',
            'description' => 'nullable|string',
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
        $pricingPlan = PricingPlan::findOrFail($id);
        $this->pricingPlanId = $id;
        $this->program_id = $pricingPlan->program_id;
        $this->location_id = $pricingPlan->location_id;
        $this->name = $pricingPlan->name;
        $this->price = $pricingPlan->price;
        $this->lesson_count = $pricingPlan->lesson_count;
        $this->description = $pricingPlan->description;
        $this->is_active = $pricingPlan->is_active;
        $this->isEditing = true;
    }

    public function save()
    {
        $this->validate();

        $data = [
            'program_id' => $this->program_id,
            'location_id' => $this->location_id,
            'name' => $this->name,
            'price' => $this->price,
            'lesson_count' => $this->lesson_count,
            'description' => $this->description,
            'is_active' => $this->is_active,
        ];

        if ($this->isEditing) {
            $pricingPlan = PricingPlan::findOrFail($this->pricingPlanId);
            $pricingPlan->update($data);
            session()->flash('message', 'Pricing plan updated successfully.');
        } else {
            PricingPlan::create($data);
            session()->flash('message', 'Pricing plan created successfully.');
        }

        $this->resetInputFields();
        $this->dispatch('close-modal');
    }

    public function delete($id)
    {
        PricingPlan::findOrFail($id)->delete();
        session()->flash('message', 'Pricing plan deleted successfully.');
    }

    private function resetInputFields()
    {
        $this->pricingPlanId = null;
        $this->program_id = null;
        $this->location_id = null;
        $this->name = '';
        $this->price = '';
        $this->lesson_count = '';
        $this->description = '';
        $this->is_active = true;
        $this->isEditing = false;
    }

    public function render()
    {
        $items = PricingPlan::with(['program', 'location'])->paginate(10);
        $programs = Program::where('is_active', true)->get();
        $locations = Location::where('is_active', true)->orderBy('sort_order')->get();

        return view('livewire.admin.pricing.index', [
            'items' => $items,
            'programs' => $programs,
            'locations' => $locations,
        ])->layout('layouts.admin', [
            'title' => 'Pricing',
            'header' => 'Pricing Management'
        ]);
    }
}
