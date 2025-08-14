<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Stripe\PaymentIntent;
use Stripe\Stripe;

class MembershipController extends Controller
{
    public function __construct()
    {
        Stripe::setApiKey(config('services.stripe.secret'));
    }

    public function index()
    {
        if(!auth()->check()){
            return redirect()->route('login');
        }
        
        return view('public.membership');
    }

    public function upgrade(Request $request)
    {
        session()->flash('plan', [
            'name' => 'Premium',
            'price' => '9.99'
        ]);

        return redirect()->route('checkout');
    }

    public function checkout()
    {
        if (!session()->has('plan')) {
            return redirect()
                ->route('membership.index')
                ->with('error', 'Please select a plan first.');
        }

        $plan = session('plan');
        return view('checkout', compact('plan'));
    }

    public function processPayment(Request $request)
    {
        $request->validate([
            'payment_method' => 'required|in:stripe,paypal',
            'email' => 'required|email',
            'plan.name' => 'required|string',
            'plan.price' => 'required|numeric',
        ]);

        $plan = $request->plan;
        $user = Auth::user();

        try {
            return $this->processStripePayment($user, $plan, $request);
        } catch (\Exception $e) {
            Log::error('Payment processing error', [
                'user_id' => $user->id,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Payment processing failed. Please try again.'
            ], 500);
        }
    }

    private function processStripePayment($user, $plan, $request)
    {
        $paymentIntent = PaymentIntent::create([
            'amount' => (int) ($plan['price'] * 100),
            'currency' => 'usd',
            'automatic_payment_methods' => [
                'enabled' => true,
            ],
            'metadata' => [
                'user_id' => $user->id,
                'user_name' => $user->name,
                'plan_name' => $plan['name'],
                'email' => $request->email,
            ],
            'description' => "Premium Membership - {$user->name}",
            'receipt_email' => $request->email,
        ]);

        $subscription = Subscription::create([
            'user_id' => $user->id,
            'stripe_payment_intent_id' => $paymentIntent->id,
            'status' => 'pending',
            'amount' => $plan['price'],
            'currency' => 'usd',
            'starts_at' => null, 
            'expires_at' => null, 
            'metadata' => [
                'plan_name' => $plan['name'],
                'email' => $request->email,
                'payment_method' => 'stripe',
            ],
        ]);

        Log::info('Subscription created', [
            'subscription_id' => $subscription->id,
            'user_id' => $user->id,
            'payment_intent_id' => $paymentIntent->id
        ]);

        return response()->json([
            'success' => true,
            'client_secret' => $paymentIntent->client_secret,
            'payment_intent_id' => $paymentIntent->id,
        ]);
    }

    public function paymentSuccess(Request $request)
    {
        $paymentIntentId = $request->get('payment_intent');

        if (!$paymentIntentId) {
            return redirect()->route('membership.index')
                ->with('error', 'Invalid payment session.');
        }

        $subscription = Subscription::where('stripe_payment_intent_id', $paymentIntentId)
            ->where('user_id', Auth::id())
            ->first();

        if (!$subscription) {
            return redirect()->route('membership.index')
                ->with('error', 'Subscription not found.');
        }

        try {
            $paymentIntent = PaymentIntent::retrieve($paymentIntentId);
            
            if ($paymentIntent->status === 'succeeded') {

                $subscription->update([
                    'status' => 'active',
                    'starts_at' => now(),
                    'expires_at' => now()->addDays(30),
                ]);

                Auth::user()->update(['role' => 'author']);

                Log::info('Subscription activated', [
                    'subscription_id' => $subscription->id,
                    'user_id' => Auth::id(),
                    'expires_at' => $subscription->expires_at
                ]);

                session()->forget('plan');

                return redirect(\Filament\Facades\Filament::getPanel('author')->getUrl())
                    ->with('success', 'Welcome to your Premium membership!');
            } else {
                Log::warning('Payment not succeeded', [
                    'payment_intent_id' => $paymentIntentId,
                    'status' => $paymentIntent->status
                ]);

                return redirect()->route('membership.index')
                    ->with('error', 'Payment was not successful.');
            }
        } catch (\Exception $e) {
            Log::error('Error verifying payment', [
                'payment_intent_id' => $paymentIntentId,
                'error' => $e->getMessage()
            ]);

            return redirect()->route('membership.index')
                ->with('error', 'Error verifying payment.');
        }
    }
}
