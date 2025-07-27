<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasAvatar;
use Filament\Models\Contracts\HasName;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Cashier\Billable;

class User extends Authenticatable implements FilamentUser, HasName
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, Billable;

    /*
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
    /*
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

    public function follow(User $user)
    {
        if (!$this->isFollowing($user) && $this->id !== $user->id) {
            $this->followings()->attach($user->id);
        }
    }

    public function unfollow(User $user)
    {
        $this->followings()->detach($user->id);
    }

    public function isFollowing(User $user)
    {
        return $this->followings()->where('followed_id', $user->id)->exists();
    }

    public function isFollowedBy(User $user)
    {
        return $this->followers()->where('follower_id', $user->id)->exists();
    }

    public function followersCount()
    {
        return $this->followers()->count();
    }

    public function followingsCount()
    {
        return $this->followings()->count();
    }

    // Subscription-related methods
    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function activeSubscription()
    {
        return $this->subscriptions()
            ->active()
            ->latest()
            ->first();
    }

    public function hasActiveSubscription()
    {
        return $this->activeSubscription() !== null;
    }

    public function getIsAuthorAttribute()
    {
        return $this->role === 'author' || $this->hasActiveSubscription();
    }

    public function upgradeToAuthor()
    {
        if ($this->hasActiveSubscription()) {
            $this->update(['role' => 'author']);
        }
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return match ($panel->getId()) {
            'admin' => $this->role === 'admin',
            'author' => $this->role === 'author',
            default => false,
        };
    }
    public function getFilamentName(): string
    {
        return ucfirst($this->name);
    }

    public function checkSubscriptionStatus()
    {
        if ($this->subscriptions()->valid()->exists()) {
            $this->update(['role' => 'author']);
        } else {
            $this->update(['role' => 'reader']);
        }
    }


}
