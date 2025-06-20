<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class MyComments extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public function render()
    {
        $comments = auth()->user()->comments()->latest()->paginate(10);
        return view('livewire.my-comments', compact('comments'));
    }
}
