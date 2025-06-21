<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class MyFollowings extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public function render()
    {
        $myFollowings = auth()->user()->followings;
        return view('livewire.my-followings', compact('myFollowings'));
    }
}
