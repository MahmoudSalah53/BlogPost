<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class AuthorsList extends Component
{
    use WithPagination;

    public $search = '';

    protected $paginationTheme = 'tailwind';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $authors = User::where('role', 'author')
                   ->where(function($quere)
            {
                $quere->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('bio', 'like', '%' . $this->search . '%');
            })->orderBy('name', 'asc')
            ->paginate(6);
        return view('livewire.authors-list', compact('authors'));
    }
}
