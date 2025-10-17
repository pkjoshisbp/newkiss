<?php

namespace App\Livewire\Admin\Faqs;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\FAQ;

class Index extends Component
{
    use WithPagination;

    public $faqId;
    public $question = '';
    public $answer = '';
    public $category = '';
    public $is_published = true;
    public $sort_order = 0;
    public $isEditing = false;

    protected $paginationTheme = 'bootstrap';

    protected $rules = [
        'question' => 'required|string|max:500',
        'answer' => 'required|string',
        'category' => 'nullable|string|max:100',
        'is_published' => 'boolean',
        'sort_order' => 'integer|min:0',
    ];

    public function render()
    {
        return view('livewire.admin.faqs.index', [
            'faqs' => FAQ::orderBy('sort_order')->orderBy('created_at', 'desc')->paginate(20)
        ])->layout('layouts.admin');
    }

    public function create()
    {
        $this->resetForm();
        $this->isEditing = false;
    }

    public function store()
    {
        $this->validate();

        FAQ::create([
            'question' => $this->question,
            'answer' => $this->answer,
            'category' => $this->category,
            'is_published' => $this->is_published,
            'sort_order' => $this->sort_order,
        ]);

        session()->flash('message', 'FAQ created successfully.');
        $this->resetForm();
        $this->dispatch('faq-saved');
    }

    public function edit($id)
    {
        $faq = FAQ::findOrFail($id);
        $this->faqId = $faq->id;
        $this->question = $faq->question;
        $this->answer = $faq->answer;
        $this->category = $faq->category;
        $this->is_published = $faq->is_published;
        $this->sort_order = $faq->sort_order;
        $this->isEditing = true;
    }

    public function update()
    {
        $this->validate();

        $faq = FAQ::findOrFail($this->faqId);
        $faq->update([
            'question' => $this->question,
            'answer' => $this->answer,
            'category' => $this->category,
            'is_published' => $this->is_published,
            'sort_order' => $this->sort_order,
        ]);

        session()->flash('message', 'FAQ updated successfully.');
        $this->resetForm();
        $this->dispatch('faq-saved');
    }

    public function delete($id)
    {
        FAQ::findOrFail($id)->delete();
        session()->flash('message', 'FAQ deleted successfully.');
    }

    public function resetForm()
    {
        $this->faqId = null;
        $this->question = '';
        $this->answer = '';
        $this->category = '';
        $this->is_published = true;
        $this->sort_order = 0;
        $this->isEditing = false;
        $this->resetErrorBag();
    }
}

