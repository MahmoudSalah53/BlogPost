<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Stripe\Webhook;

class StripeController extends Controller
{
    public function handleWebhook(Request $request)
    {
        Log::info('✅ Stripe Webhook Hit');

        $payload = $request->getContent();
        $sigHeader = $request->header('Stripe-Signature');
        $secret = config('services.stripe.webhook_secret');

        try {
            $event = Webhook::constructEvent(
                $payload,
                $sigHeader,
                $secret
            );
        } catch (\UnexpectedValueException $e) {
            Log::error('Invalid Stripe payload', ['error' => $e->getMessage()]);
            return response('Invalid Payload', 400);
        } catch (\Stripe\Exception\SignatureVerificationException $e) {
            Log::error('Invalid Stripe signature', ['error' => $e->getMessage()]);
            return response('Invalid Signature', 400);
        }

        Log::info('Stripe webhook event received', ['type' => $event->type]);

        // Handle the event
        switch ($event->type) {
            case 'payment_intent.succeeded':
                $this->handlePaymentSuccess($event->data->object);
                break;
                
            case 'payment_intent.payment_failed':
                $this->handlePaymentFailed($event->data->object);
                break;
                
            case 'payment_intent.canceled':
                $this->handlePaymentCanceled($event->data->object);
                break;
                
            default:
                Log::info('Unhandled Stripe event type', ['type' => $event->type]);
        }

        return response('Webhook Handled', 200);
    }

    private function handlePaymentSuccess($paymentIntent)
    {
        Log::info('💰 Payment succeeded', ['id' => $paymentIntent->id]);

        $subscription = Subscription::where('stripe_payment_intent_id', $paymentIntent->id)->first();

        if (!$subscription) {
            Log::error('Subscription not found for payment intent', ['id' => $paymentIntent->id]);
            return;
        }

        // Activate the subscription
        $subscription->activate();

        // Upgrade user to author
        $user = $subscription->user;
        $user->upgradeToAuthor();

        Log::info('User upgraded to author', [
            'user_id' => $user->id,
            'subscription_id' => $subscription->id
        ]);
    }

    private function handlePaymentFailed($paymentIntent)
    {
        Log::info('❌ Payment failed', ['id' => $paymentIntent->id]);

        $subscription = Subscription::where('stripe_payment_intent_id', $paymentIntent->id)->first();

        if ($subscription) {
            $subscription->update(['status' => 'failed']);
            
            Log::info('Subscription marked as failed', [
                'subscription_id' => $subscription->id,
                'user_id' => $subscription->user_id
            ]);
        }
    }

    private function handlePaymentCanceled($paymentIntent)
    {
        Log::info('🚫 Payment canceled', ['id' => $paymentIntent->id]);

        $subscription = Subscription::where('stripe_payment_intent_id', $paymentIntent->id)->first();

        if ($subscription) {
            $subscription->update(['status' => 'cancelled']);
            
            Log::info('Subscription marked as cancelled', [
                'subscription_id' => $subscription->id,
                'user_id' => $subscription->user_id
            ]);
        }
    }
}