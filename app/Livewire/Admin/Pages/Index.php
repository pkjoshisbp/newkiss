<?php

namespace App\Livewire\Admin\Pages;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Page;

class Index extends Component
{
    use WithPagination;

    public $pageId;
    public $title = '';
    public $slug = '';
    public $content = '';
    public $meta_title = '';
    public $meta_description = '';
    public $is_published = true;
    public $isEditing = false;

    protected $paginationTheme = 'bootstrap';

    protected $rules = [
        'title' => 'required|string|max:255',
        'slug' => 'required|string|max:255|unique:pages,slug',
        'content' => 'nullable|string',
        'meta_title' => 'nullable|string|max:255',
        'meta_description' => 'nullable|string|max:500',
        'is_published' => 'boolean',
    ];

    public function render()
    {
        return view('livewire.admin.pages.index', [
            'pages' => Page::orderBy('title')->paginate(20)
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

        Page::create([
            'title' => $this->title,
            'slug' => $this->slug,
            'content' => $this->content,
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
            'is_published' => $this->is_published,
        ]);

        session()->flash('message', 'Page created successfully.');
        $this->resetForm();
        $this->dispatch('page-saved');
    }

    public function edit($id)
    {
        $page = Page::findOrFail($id);
        $this->pageId = $page->id;
        $this->title = $page->title;
        $this->slug = $page->slug;
        $this->content = $page->content;
        $this->meta_title = $page->meta_title;
        $this->meta_description = $page->meta_description;
        $this->is_published = $page->is_published;
        $this->isEditing = true;
    }

    public function update()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:pages,slug,' . $this->pageId,
            'content' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'is_published' => 'boolean',
        ]);

        $page = Page::findOrFail($this->pageId);
        $page->update([
            'title' => $this->title,
            'slug' => $this->slug,
            'content' => $this->content,
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
            'is_published' => $this->is_published,
        ]);

        session()->flash('message', 'Page updated successfully.');
        $this->resetForm();
        $this->dispatch('page-saved');
    }

    public function delete($id)
    {
        Page::findOrFail($id)->delete();
        session()->flash('message', 'Page deleted successfully.');
    }

    public function resetForm()
    {
        $this->pageId = null;
        $this->title = '';
        $this->slug = '';
        $this->content = '';
        $this->meta_title = '';
        $this->meta_description = '';
        $this->is_published = true;
        $this->isEditing = false;
        $this->resetErrorBag();
    }
}
