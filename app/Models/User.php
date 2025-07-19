<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable implements FilamentUser
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'bio',
        'avatar',
        'email_verified_at',
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Get the user's initials
     */
    public function initials(): string
    {
        return Str::of($this->name)
            ->explode(' ')
            ->map(fn(string $name) => Str::of($name)->substr(0, 1))
            ->implode('');
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function savedPosts()
    {
        return $this->belongsToMany(Post::class, 'saved_posts');
    }

    public function likedPosts()
    {
        return $this->belongsToMany(Post::class, 'like_posts');
    }

    public function followings()
    {
        return $this->belongsToMany(self::class, 'following', 'follower_id', 'followed_id');
    }

    public function followers()
    {
        return $this->belongsToMany(self::class, 'following', 'followed_id', 'follower_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function canAccessPanel(Panel $panel): bool
    {

        if ($this->role === 'admin' && $panel->getId() === 'author') {
            redirect()->to('/admin')->send();
            exit;
        }

        if ($this->role === 'author' && $panel->getId() === 'admin') {
            redirect()->to('/author')->send();
            exit;
        }

        return match ($panel->getId()) {
            'admin' => $this->role === 'admin',
            'author' => $this->role === 'author',
            default => false,
        };
    }

}
