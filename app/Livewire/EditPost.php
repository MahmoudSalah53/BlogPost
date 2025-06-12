<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
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
    public $uploadedImage;
    public $categories;
    public $selectedCategories;
    public $tags;
    public $selectedTags;

    public function mount ($id)
    {
        $this->post = Post::findOrFail($id);
        Gate::authorize('update', $this->post);

        $this->categories = Category::all();
        $this->tags = Tag::all();
        $this->title = $this->post->title;
        $this->slug = $this->post->slug;
        $this->content = $this->post->content;
        $this->featured_image = $this->post->featured_image;
    }

    public function render ()
    {
        return view('livewire.edit-post');
    }
}
