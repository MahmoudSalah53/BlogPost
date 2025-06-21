<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class MyFollowings extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $myFollowings = auth()->user()
            ->followings()
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('name', 'like', '%' . $this->search . '%')
                        ->orWhere('bio', 'like', '%' . $this->search . '%');
                });
            })
            ->latest()
            ->paginate(6);

        return view('livewire.my-followings', compact('myFollowings'));
    }
}
