<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
//use Request;

class SubscriptionController extends Controller
{  protected function subscribeToStripe($creditCardToken, User $user)
{
    $user->newSubscription('basic', 'basic')
        ->create($creditCardToken);
}
    protected function registerAndSubscribeToStripe(Request $request) {
        $creditCardToken = $request->input('stripeToken');
        $user = null;
        $this->subscribeToStripe($creditCardToken,$user);
    }
}
