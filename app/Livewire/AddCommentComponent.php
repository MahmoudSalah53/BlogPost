<?php

namespace App\Livewire;

use App\Models\Comment;
use Livewire\Component;

class AddCommentComponent extends Component
{
    public $content;
    public $postId;

    public function mount($postId)
    {
        $this->postId = $postId;
    }

    public function save ()
    {
        $this->validate([
            'content' => 'required|string',
        ]);


        Comment::create([
            'content' => $this->content,
            'user_id' => 1,
            'post_id' => $this->postId,
        ]);
    }

    public function render()
    {
        $comments = Comment::with('user')->where('post_id', $this->postId)->latest()->get();
        return view('livewire.add-comment-component', ['comments' => $comments]);
    }
}
