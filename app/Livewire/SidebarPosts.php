<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Tag;
use Livewire\Component;

class SidebarPosts extends Component
{
    public ?int $selectedCategory = null;

    public function selectCategory($categoryId)
    {
        $this->selectedCategory = $categoryId;
        $this->dispatch('categorySelected', $categoryId);
    }


    public function render()
    {
        $categories = Category::orderBy('name')->get();
        $tags       = Tag::orderBy('name')->get();
        return view('livewire.sidebar-posts', compact('categories', 'tags'));
    }
}
