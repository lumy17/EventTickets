<?php

namespace App\Http\Controllers;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function index() {

    }
    public function checkout(Request $request) {
        $stripe_secret_key = "sk_test_51OEdnGFxamHTV8q7XLqDpVxc2dPW5D0ylJNYqmaHgqwhtJjGgoVeROplgqxVQmF5WGyFdZjpxPJNt0eAEdgPxuYr00a32JX4Ps";
        Stripe::setApiKey($stripe_secret_key);
    
        $total = $request->get('total');
    
        if ($total) {
            $checkout_session = Session::create([
                "mode" => "payment",
                "success_url" => "http://localhost/Proiect2/success.php",
                "cancel_url" => "http://localhost/Proiect2/bilet.php",
                "locale" => "auto",
                "line_items" => [
                    [
                        "quantity" => 1,
                        "price_data" => [
                            "currency" => "ron",
                            "unit_amount" => $total * 100, // Stripe expects the amount in cents
                            "product_data" => [
                                "name" => "Total"
                            ]
                        ]
                    ]
                ]
            ]);
            return redirect($checkout_session->url);
        }
        return response()->json(['error' => 'Invalid request'], 400);

    }
    public function success() {

    }
}
