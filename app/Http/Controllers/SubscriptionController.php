<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CustomerCard;
use App\Models\Subscription;
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
            $source = \Stripe\Customer::createSource(
                $user->stripe_id,
                ['source' => $token]
            );

            CustomerCard::create([
                'user_id' => $user->id,
                'customer_id' => $user->stripe_id,
                'card_id' => $source->id,
                'last_4' => $source->last4,
                'brand' => $source->brand,
                'fingerprint' => $source->fingerprint,
                'exp_month' => $source->exp_month,
                'exp_year' => $source->exp_year,
            ]);

            $user->newSubscription('test',$input['plane'])
                ->create($paymentMethod, [
                'email' => $user->email,
            ]);

            Mail::to($user->email)->send(new SubscriptionUpdateMail($user, $old_plan, 'パーソナルプラン', $date));

            return redirect()->route('membership-info');
        } catch (Exception $e) {

            return back()->with('error',$e->getMessage());
        }

    }

    public function cancel_subscription(Request $request)
    {
        $user = User::find($request->user_id);

        if($user)
        {
            Subscription::where('user_id', $user->id)->delete();
        }
    }
}
