<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostsList extends Component
{
    use WithPagination;

    public $perPage = 5;
    public $loading = false;
    public $search = '';
    public $selectedTag = '';
    public $selectedCategoryId = '';
    public $selectedDate = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function loadMore()
    {
        $this->loading = true;
        $this->perPage += 5;
    }

    public function render()
    {
        $posts = Post::with('author', 'tags')
            ->withCount(['likedByUsers', 'comments', 'savedByUsers'])
            ->where(function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('content', 'like', '%' . $this->search . '%');
            })
            ->when($this->selectedTag, function ($query) {
                $query->whereHas('tags', function ($q) {
                    $q->where('name', $this->selectedTag);
                });
            })
            ->when($this->selectedCategoryId, function ($query) {
                $query->whereHas('categories', function ($q) {
                    $q->where('categories.id', $this->selectedCategoryId);
                });
            })
            ->when($this->selectedDate, function ($query, $selectedDate) {
                if ($selectedDate === 'today') {
                    $query->whereDate('created_at', today());
                } elseif ($selectedDate === 'this_week') {
                    $query->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
                } elseif ($selectedDate === 'this_month') {
                    $query->whereMonth('created_at', now()->month);
                } elseif ($selectedDate === 'this_year') {
                    $query->whereYear('created_at', now()->year);
                }
            })
            ->where('status', 1)
            ->latest()
            ->paginate($this->perPage);

        return view('livewire.posts-list', compact('posts'));
    }
}
