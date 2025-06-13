<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditPost extends Component
{
    use WithFileUploads;

    public $post;
    public $title;
    public $slug;
    public $content;
    public $uploadedImage;
    public $currentImage;
    public $allCategories;
    public $allTags;
    public $tags;
    public $categories;
    public $status;

    public function mount ($id)
    {
        $this->post = Post::with(['categories', 'tags'])->findOrFail($id);
        Gate::authorize('update', $this->post);

        $this->allCategories = Category::all();
        $this->allTags = Tag::all();
        $this->title = $this->post->title;
        $this->slug = $this->post->slug;
        $this->content = $this->post->content;
        $this->currentImage = $this->post->featured_image;
        $this->tags = $this->post->tags->pluck('id')->toArray();
        $this->categories = $this->post->categories->pluck('id')->toArray();
        $this->status = $this->post->status->value;
    }

    public function updatedTitle ()
    {
        $this->slug = Str::slug($this->title);
        $counter = 2;
        while ( Post::where('slug', $this->slug)->where('id', '!=', $this->post->id)->exists() ) {
            $this->slug = $this->slug . '-' . $counter;
        }
    }

    public function rvCurrentImg ()
    {
        $this->currentImage = null;
    }

    public function rvUploadedImg ()
    {
        $this->uploadedImage = null;
    }

    public function save ()
    {
        dd($this);
        $validated = $this->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:posts,slug,' . $this->post->id,
            'content' => 'required|string',
            'categories.*' => 'required|integer|exists:categories,id',
            'tags.*' => 'required|integer|exists:tags,id',
            'currentImage' => 'nullable|string',
            'uploadedImage' => 'nullable|required_if:currentImage,null|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ( $this->uploadedImage ) {
            $validated['featured_image'] = $this->uploadedImage->store('posts');
        } else {
            $validated['featured_image'] = $this->currentImage ?? null;
        }

        $this->post->update([
            'title' => $validated['title'],
            'slug' => $validated['slug'],
            'content' => $validated['content'],
            'featured_image' => $validated['featured_image'],
            'author_id' => auth()->user()->id,
        ]);

        $this->post->categories()->sync($this->categories);
        $this->post->tags()->sync($this->tags);

        $this->redirect(route('author.posts.index'), true);
    }

    public function render ()
    {
        return view('livewire.edit-post');
    }
}
