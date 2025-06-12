<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Enums\PostStatus;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class CreatePost extends Component
{
    use WithFileUploads;

    public $title;
    public $slug;
    public $content;
    public $featured_image;
    public $categories = [];
    public $tags = [];
    public $allCategories;
    public $allTags;

    public function mount()
    {
        $this->allCategories = Category::all();
        $this->allTags = Tag::all();
    }

    public function generateSlug()
    {
        $random = rand(100, 999);
        $random2 = rand(100, 999);
        $baseSlug = Str::slug($this->title);
        $this->slug = "{$baseSlug}-{$random}-{$random2}";
    }

    public function changeCategory($value)
    {
        $this->categories = $value;
    }

    public function changeTag($value)
    {
        $this->tags = $value;
    }


    public function save()
    {
        $validated = $this->validate(
            [
                'title' => 'required|string|max:255',
                'slug' => 'required|string|max:255|unique:posts,slug',
                'content' => 'required',
                'featured_image' => 'nullable|image|max:2048',
                'categories' => 'required|integer|min:1',
                'tags' => 'required|integer|min:1',
            ],
            [
                'categories.min' => 'The tags field is required.',
                'tags.min' => 'The tags field is required.',
            ]
        );

        if ($this->featured_image) {
            $path = $this->featured_image->store('posts', 'public');
            $validated['featured_image'] = $path;
        } else {
            $validated['featured_image'] = null;
        }

        $post = Post::create([
            'title' => $validated['title'],
            'slug' => $validated['slug'],
            'content' => $validated['content'],
            'featured_image' => $validated['featured_image'] ?? null,
            'author_id' => auth()->id(),
        ]);

        $post->categories()->attach($this->categories);
        $post->tags()->attach($this->tags);

        session()->flash('success', 'Post created successfully. Please wait until your post is accepted.');
        $this->reset([
            'title',
            'slug',
            'content',
            'featured_image',
        ]);

        $this->categories = 0;
        $this->tags = 0;

        $this->dispatch('resetSelects');
    }


    public function render()
    {
        return view('livewire.create-post');
    }
}
