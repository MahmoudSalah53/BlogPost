<?php

namespace App\Livewire;

use App\Models\Comment;
use Livewire\Component;

class DeleteMyComment extends Component
{
    public $commentId;

    public function delete()
    {
        $comment = Comment::where('id', $this->commentId)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        $comment->delete();

        $this->dispatch('commentDeleted');
    }

    public function render()
    {
        return view('livewire.delete-my-comment');
    }
}