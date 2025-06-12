<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditPost extends Component
{
    use WithFileUploads;

    public $post;
    public $title;
    public $slug;
    public $content;
    public $featured_image;
    public $categories;
    public $selectedCategories;
    public $tags;
    public $selectedTags;

    public function mount ($id)
    {
        $this->post = Post::findOrFail($id);
        Gate::authorize('update', $this->post);
    }

    public function render ()
    {
        return view('livewire.edit-post');
    }
}
