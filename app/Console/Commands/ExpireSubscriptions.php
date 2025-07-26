<?php

namespace App\Console\Commands;

use App\Models\Subscription;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ExpireSubscriptions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subscriptions:expire';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mark expired subscriptions and downgrade user roles';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $expiredSubscriptions = Subscription::where('status', 'active')
            ->where('expires_at', '<=', now())
            ->get();

        $this->info("Found {$expiredSubscriptions->count()} expired subscriptions to process.");

        foreach ($expiredSubscriptions as $subscription) {
            try {
                DB::transaction(function () use ($subscription) {

                    $subscription->update(['status' => 'expired']);
                    
                    $subscription->user->update(['role' => 'reader']);
                    
                    Log::info('Subscription expired and user downgraded', [
                        'subscription_id' => $subscription->id,
                        'user_id' => $subscription->user_id,
                        'expired_at' => $subscription->expires_at
                    ]);
                });

                $this->info("✓ Subscription #{$subscription->id} expired and user #{$subscription->user_id} downgraded.");
                
            } catch (\Exception $e) {
                $this->error("✗ Failed to expire subscription #{$subscription->id}: {$e->getMessage()}");
                
                Log::error('Failed to expire subscription', [
                    'subscription_id' => $subscription->id,
                    'error' => $e->getMessage()
                ]);
            }
        }

        if ($expiredSubscriptions->count() === 0) {
            $this->info('No expired subscriptions found.');
        }

        return 0;
    }
}