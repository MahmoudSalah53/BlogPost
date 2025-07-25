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

        session()->reflash();

        return view('checkout');
    }

    public function processPayment(Request $request)
    {
        session()->reflash();

        if (!session()->has('plan')) {
            return response()->json([
                'success' => false,
                'message' => 'No plan selected. Please go back and select a plan.'
            ], 400);
        }

        $request->validate([
            'payment_method' => 'required|in:stripe',
            'email' => 'required|email',
        ]);

        $plan = session('plan');
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
        // Create PaymentIntent
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

        // Create pending subscription record
        $subscription = Subscription::create([
            'user_id' => $user->id,
            'stripe_payment_intent_id' => $paymentIntent->id,
            'status' => 'pending',
            'amount' => $plan['price'],
            'currency' => 'usd',
            'starts_at' => now(),
            'expires_at' => now()->addSeconds(60),
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

        session()->forget('plan');

        if ($subscription->status === 'active') {
            return redirect(\Filament\Facades\Filament::getPanel('author')->getUrl())
                ->with('success', 'Welcome to your Premium membership!');
        }

        return redirect(\Filament\Facades\Filament::getPanel('author')->getUrl())
            ->with('success', 'Welcome to your Premium membership!');
    }
}