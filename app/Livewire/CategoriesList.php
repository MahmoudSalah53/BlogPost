<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class CategoriesList extends Component
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
        $categories = Category::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->paginate(8);

        return view('livewire.categories-list', compact('categories'));
    }
}
