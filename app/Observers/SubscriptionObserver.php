<?php

namespace App\Observers;

use App\Models\Subscription;
use Carbon\Carbon;

class SubscriptionObserver
{
    public function deleted(Subscription $subscription): void
    {
        $user = $subscription->user;

        $hasOtherActive = $user->subscriptions()
            ->where('status', 'active')
            ->where('expires_at', '>', now())
            ->exists();

        if (! $hasOtherActive && $user->role === 'author') {
            $user->update(['role' => 'reader']);
        }
    }

    public function updated(Subscription $subscription): void
    {
        if ($subscription->status === 'expired') {
            $user = $subscription->user;

            $hasOtherActive = $user->subscriptions()
                ->where('status', 'active')
                ->where('expires_at', '>', now())
                ->exists();

            if (! $hasOtherActive && $user->role === 'author') {
                $user->update(['role' => 'reader']);
            }
        }
    }
}
