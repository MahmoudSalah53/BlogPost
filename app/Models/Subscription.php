<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'stripe_payment_intent_id',
        'status',
        'amount',
        'currency',
        'starts_at',
        'expires_at',
        'metadata',
    ];

    protected $casts = [
        'starts_at' => 'datetime',
        'expires_at' => 'datetime',
        'metadata' => 'array',
        'amount' => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function isActive()
    {
        return $this->status === 'active' && 
               $this->expires_at && 
               $this->expires_at > now();
    }

    public function isExpired()
    {
        return $this->expires_at && $this->expires_at <= now();
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active')
            ->where('expires_at', '>', now());
    }

    public function scopeExpired($query)
    {
        return $query->where('status', 'active')
            ->where('expires_at', '<=', now());
    }

    public function scopeValid($query)
    {
        return $query->where('expires_at', '>', now());
    }

    public function activate($durationInDays = 30)
    {
        $this->update([
            'status' => 'active',
            'starts_at' => now(),
            'expires_at' => now()->addDays($durationInDays),
        ]);
    }


    public function expire()
    {
        $this->update(['status' => 'expired']);
        
        $this->user->update(['role' => 'reader']);
    }


    public function getTimeRemainingAttribute()
    {
        if (!$this->expires_at || $this->isExpired()) {
            return null;
        }

        return $this->expires_at->diffForHumans();
    }

    public function getSecondsRemainingAttribute()
    {
        if (!$this->expires_at || $this->isExpired()) {
            return 0;
        }

        return $this->expires_at->diffInSeconds(now());
    }
}