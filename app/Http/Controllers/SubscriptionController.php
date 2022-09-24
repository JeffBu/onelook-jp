<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Stripe;
use Session;
use Exception;
use Form;
use Mail;
use Illuminate\Support\Carbon;
use App\Mail\SubscriptionUpdateMail;

class SubscriptionController extends Controller
{
    public function index()
    {
        return view('authenticated-user.contents.checkout-test');
    }

    public function subscribe(Request $request)
    {
        $user = auth()->user();
        $input = $request->all();
        $token = $request->stripeToken;
        $paymentMethod = $request->paymentMethod;
        $date = Carbon::now()->format('Y/m/d H:i');
        $old_plan = '';

        try{
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            if (is_null($user->stripe_id)) {
                $stripeCustomer = $user->createAsStripeCustomer();
                $old_plan = 'フリープラン';
            }
            else {
                $old_plan = 'パーソナルプラン';
            }
            \Stripe\Customer::createSource(
                $user->stripe_id,
                ['source' => $token]
            );

            $user->newSubscription('test',$input['plane'])
                ->create($paymentMethod, [
                'email' => $user->email,
            ]);

            Mail::to($user->email)->send(new SubscriptionUpdateMail($user, $old_plan, 'パーソナルプラン', $date));
            return back()->with('success','Subscription is completed.');
        } catch (Exception $e) {

            return back()->with('error',$e->getMessage());
        }

    }
}
