<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Cashier\Http\Controllers\WebhookController as CashierWebhookController;

class WebhookController extends Controller
{
    public function handleWebhook(Request $request)
    {
        // Verify the Stripe webhook signature
        $this->validateStripeWebhook($request);

        // Get the Stripe event type
        $eventType = $request->get('type');

        // Handle specific event types
        switch ($eventType) {
            case 'checkout.session.completed':
                return $this->handleCheckoutSessionCompleted($request);
            case 'invoice.payment_succeeded':
                return $this->handleInvoicePaymentSucceeded($request);
            // Add more cases for other event types as needed
            default:
                // Handle unknown event type
                return $this->handleUnknownEvent($request);
        }
    }

    /**
     * Handle the "checkout.session.completed" event.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function handleCheckoutSessionCompleted(Request $request)
    {
        // Your logic for handling a completed checkout session event
        // Example: Mark the user as subscribed or update your database

        return response('Webhook Handled', 200);
    }

    /**
     * Handle the "invoice.payment_succeeded" event.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function handleInvoicePaymentSucceeded(Request $request)
    {
        // Your logic for handling a successful invoice payment event
        // Example: Update your database or send a confirmation email

        return response('Webhook Handled', 200);
    }

    /**
     * Handle an unknown event type.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function handleUnknownEvent(Request $request)
    {
        // Your logic for handling an unknown event type
        // Example: Log the event for further investigation

        return response('Unknown Event Handled', 200);
    }
}

