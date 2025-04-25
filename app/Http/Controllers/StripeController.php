<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Http\Request;


class StripeController extends Controller
{
    public function index() {
        return view('index');
    }

    public function session(Request $request) {

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));


        $plan = $request->get('plan');
        $paymentAmount = $request->get('price');

        $session = \Stripe\Checkout\Session::create([
            
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $plan,
                    ],
                    'unit_amount' => $paymentAmount * 100,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('stripe.success'),
            'cancel_url' => route('stripe.checkout'),
        ]);

        return redirect()->away($session->url);
        

        
    }

    public function success() {

        $user_id = Session::get('user_id');

        $user = User::find($user_id);
        if ($user) {
            $user->subscribed = true;
            $user->save();
        }

        Session::remove('subscription');
        Session::put('subscription', true);

        return redirect()->route('gretting')->with('success', 'Merci pour votre paiement !');
    }
}