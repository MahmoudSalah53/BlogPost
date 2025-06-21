<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class AuthorsList extends Component
{
    use WithPagination;

    public $search = '';
    public array $followings = [];

    protected $paginationTheme = 'tailwind';

    public function mount()
    {
        if (auth()->check()) {
            $this->followings = auth()->user()->followings()->pluck('followed_id')->toArray();
        }
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function toggleFollow($authorId)
    {
        if (!auth()->check()) {
            return $this->redirect(route('login'), true);
        }

        $user = auth()->user();

        if (in_array($authorId, $this->followings)) {
            $user->followings()->detach($authorId);
            $this->followings = array_diff($this->followings, [$authorId]);
        } else {
            $user->followings()->attach($authorId);
            $this->followings[] = $authorId;
        }
    }

    public function render()
    {
        $authors = User::where('role', 'author')
            ->where('id', '!=', auth()->id())
            ->where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('bio', 'like', '%' . $this->search . '%');
            })
            ->orderBy('name', 'asc')
            ->paginate(6);

        return view('livewire.authors-list', compact('authors'));
    }
}
