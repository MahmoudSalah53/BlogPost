<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreatePost extends Component
{
    use WithFileUploads;

    public $title;
    public $slug;
    public $content;
    public $featured_image;
    public $categories;
    public $selectedCategories;
    public $tags;
    public $selectedTags;

    public function mount ()
    {
        $this->categories = DB::table('categories')->get(['id', 'name']);
        $this->tags = DB::table('tags')->get(['id', 'name']);
    }

    public function UpdatedTitle ($value)
    {
        $this->slug = Str::slug($value);
        $counter = 1;
        if ( Post::where('slug', $this->slug)->exists() ) {
            while ( Post::where('slug', $this->slug)->exists() ) {
                $this->slug = $this->slug . '-' . $counter;
                $counter++;
            }
        }
    }

    public function deleteImage ()
    {
        $this->featured_image = null;
    }

    public function save ()
    {

        $validated = $this->validate(
            [
                'title' => 'required|string|max:255',
                'slug' => 'required|string|max:255|unique:posts,slug',
                'content' => 'required|string',
                'featured_image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
                'selectedCategories.*' => 'required|integer|exists:categories,id',
                'selectedTags.*' => 'required|integer|exists:tags,id',
            ]
        );

        //store image
        $validated['featured_image'] = $this->featured_image->store('posts');
        // create post
        $post = Post::create([
            'title' => $validated['title'],
            'slug' => $validated['slug'],
            'content' => $validated['content'],
            'featured_image' => $validated['featured_image'],
            'author_id' => auth()->id(),
        ]);

        $post->categories()->attach($this->selectedCategories);
        $post->tags()->attach($this->selectedTags);

        return $this->redirect(route('author.posts.index'), true);
    }

    public function render ()
    {
        return view('livewire.create-post');
    }
}
