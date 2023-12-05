<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Charge;
use Stripe\Stripe;

class PaymentController extends Controller
{
    public function processPayment(Request $request)
    {
        $this->validate($request,[
            'amount'=>'required|numeric|min:0.01',
        ]);
        // Postavljanje Stripe API ključa
        Stripe::setApiKey(config('services.stripe.secret'));

        try {
            // Procesiranje plaćanja
            $charge = Charge::create([
                'amount' => $request->input('amount'),
                'currency' => 'usd',
                'source' => $request->input('stripeToken'),
                'description' => 'Pay with card',
            ]);

            // Ako je plaćanje uspešno, možete ovde dodati dodatne korake ili vratiti odgovarajući odgovor
            return response()->json(['success' => true, 'message' => 'Plaćanje uspešno procesirano']);

        } catch (\Exception $e) {
            // Ako dođe do greške prilikom plaćanja, možete ovde obraditi grešku
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}
