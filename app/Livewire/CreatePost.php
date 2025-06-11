<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Enums\PostStatus;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class Create extends Component
{
    use WithFileUploads;

    public $title;
    public $slug;
    public $content;
    public $featured_image;
    public $status = PostStatus::Draft;
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
        $this->slug = Str::slug($this->title);
    }

    public function save()
    {
        $validated = $this->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:posts,slug',
            'content' => 'required',
            'featured_image' => 'nullable|image|max:2048',
            'status' => 'required|in:draft,published',
            'categories' => 'array',
            'tags' => 'array',
        ]);

        if ($this->featured_image) {
            $path = $this->featured_image->store('posts', 'public');
            $validated['featured_image'] = $path;
        }

        $post = Post::create([
            'title' => $validated['title'],
            'slug' => $validated['slug'],
            'content' => $validated['content'],
            'featured_image' => $validated['featured_image'] ?? null,
            'status' => $validated['status'],
            'author_id' => auth()->id(),
        ]);

        $post->categories()->attach($this->categories);
        $post->tags()->attach($this->tags);

        session()->flash('success', 'Post created successfully.');
        return redirect()->route('posts.index');
    }

    public function render()
    {
        return view('livewire.create-post');
    }
}
