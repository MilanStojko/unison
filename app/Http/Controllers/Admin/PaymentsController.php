<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DateInterval;
use Illuminate\Validation\Rule;
use DateTime;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Sponsorship;
use Carbon\Carbon;



class PaymentsController extends Controller
{
    public function process(User $user)
    {

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

        $request->validate([
            'sponsorship_id' => 'required|integer|exists:sponsorships,id',
        ]);

        $sponsorship_price = Sponsorship::where('id', $request->sponsorship_id)->pluck('price')->first();

        $gateway = new \Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);

        $amount = $sponsorship_price;
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

        $data = $request->all();


        $start = Carbon::now();


        $loggedUser = User::where('id', $user['id'])->with('sponsorships')->first();


        foreach ($loggedUser->sponsorships as $element) {

            $date_format = DateTime::createFromFormat('Y-m-d H:i:s', $element->pivot->expiration);

            if ($date_format > $start) {
                $start = $date_format;
            }
        }

        $sponsorshipDuration = intval(Sponsorship::where('id', $data['sponsorship_id'])->pluck('duration')->first()); // pluck restituisce il solo valore e non anche la chiave! la first va usata perché è [value]
        $expiration = clone $start;
        $expiration->add(new DateInterval('PT' . $sponsorshipDuration . 'H'));

        $user->sponsorships()->attach($data['sponsorship_id'], array('start_date' => $start, 'expiration' => $expiration));

        if ($result->success) {
            $transaction = $result->transaction;
            // header("Location: transaction.php?id=" . $transaction->id);

            return redirect()->route('admin.home')->with('success_message', 'La transazione ha avuto successo, complimenti!');
        } else {
            $errorString = "";

            foreach ($result->errors->deepAll() as $error) {
                $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
            }

            // $_SESSION["errors"] = $errorString;
            // header("Location: index.php");
            return redirect()->route('admin.home')->with('error_message', 'Non fa');
        }
    }
}
