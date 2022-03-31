<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaypalController extends Controller
{
    public function processPaypal(Request $request){
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('processSuccess'),
                "cancel_url" => route('processCancel'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => "100.00"
                    ]
                ]
            ]
        ]);

        if (isset($response['id']) && $response['id'] != null) {
            // Redirect to approve href
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }

            return redirect()
                ->route('createpaypal')
                ->with('error', 'Sorry, something went wrong. Please try again later!');

        } else {
            return redirect()
                ->route('createpaypal')
                ->with('error', 'Sorry, something went wrong. Please try again later!');
        }
    }
    
    public function processSuccess(Request $request){
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);

        dd($response); // All response

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            // Save needed data to database //

            return redirect()
                ->route('createpaypal')
                ->with('success', 'Your transaction is complete!');
        } else {
            return redirect()
                ->route('createpaypal')
                ->with('error', 'Sorry, something went wrong. Please try again later!');
        }
    }
    
    public function processCancel(){
        return redirect()
        ->route('createpaypal')
        ->with('error', 'We are sorry to hear that you canceled your transaction');
    }
}
