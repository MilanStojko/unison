<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DateInterval;
use DateTime;
use Illuminate\Support\Facades\Auth;
use App\User;
use Braintree\Configuration;
use App\Sponsorship;


class PaymentsController extends Controller
{
    public function process(User $user){

        $gateway = new \Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);

        $token = $gateway->ClientToken()->generate();
        $sponsorship = Sponsorship::all();

        return view('admin.payment', [
            'token' => $token,
            'user' => $user,
            'sponsorship' => $sponsorship
        ]);
    }

    public function checkout(Request $request, User $user)
    {
        $gateway = new \Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);

        $amount = $request->amount;
        $nonce = $request->payment_method_nonce;
/*         $userInfo = Auth::user();
 */ 
        $result = $gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
            'customer' => [
                'firstName' => $user['name'],
                'lastName' => $user['surname'],
/*                 'email' => $user['email'], */
            ],
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        $request->validate( [
            'sponsorship_id' => 'required|integer|exists:sponsorships,id',
        ]);

        $data = $request->all();

        
        $nuovaSponsorship = new Sponsorship();

        $sponsorshipLength = Sponsorship::where('id', $data['sponsorship_id'])->pluck('length')->first(); // pluck restituisce il solo valore e non anche la chiave! la first va usata perché è [value]
        $start = new DateTime();
        $expiration = $start->add(new DateInterval('PT'.$sponsorshipLength.'H'));  //aggiunte ore della sponsorship

        $user->sponsorships()->attach($data['sponsorship_id'], array('start_date'=>$start,'expiration'=>$expiration));

        if ($result->success) {
            $transaction = $result->transaction;
            // header("Location: transaction.php?id=" . $transaction->id);

            return back()->with('success_message', 'Transaction successful');
        } else {
            $errorString = "";

            foreach ($result->errors->deepAll() as $error) {
                $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
            }

            // $_SESSION["errors"] = $errorString;
            // header("Location: index.php");
            return back()->withErrors('An error occurred with the message: ' . $result->message);
        }


    }


}
