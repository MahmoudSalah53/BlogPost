<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Stripe\Webhook;


class StripeController extends Controller
{
    public function request(Request $request)
    {
            Log::info('✅ Stripe Webhook Hit');

        $payload = $request->getContent();
        $sigHeader = $request->header('Stripe-Signature');
        $secret = env('STRIPE_WEBHOOK_SECRET');

        try {
            $event = Webhook::constructEvent(
                $payload,
                $sigHeader,
                $secret
            );
        } catch (\UnexpectedValueException $e) {
            // Invalid payload
            return response('Invalid Payload', 400);
        } catch (\Stripe\Exception\SignatureVerificationException $e) {
            // Invalid signature
            return response('Invalid Signature', 400);
        }

        // Example: handle successful payment
        if ($event->type === 'payment_intent.succeeded') {
            $paymentIntent = $event->data->object;
            Log::info('💰 Payment received!', ['id' => $paymentIntent->id]);
        }

        return response('Webhook Handled', 200);
    }
}
