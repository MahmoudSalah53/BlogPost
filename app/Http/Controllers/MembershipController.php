<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MembershipController extends Controller
{
    public function index ()
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
        return view('membership.checkout');
    }
}
