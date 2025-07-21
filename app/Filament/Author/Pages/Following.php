<?php

namespace App\Filament\Author\Pages;

use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;

class Following extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.author.pages.following';

    protected ?string $subheading = 'Here you can see author you are following';

    public $followings;

   public function mount()
   {
      $this->followings = $this->getUserFollowings();
   }    

   public function getUserFollowings()      
   {
        return Auth::user()->followings()->get();
   }
}   
