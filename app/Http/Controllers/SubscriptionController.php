<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class SubscriptionController extends Controller
{
    public function subscribe(Request $request){
        $creditCardToken=$request->input('stripeToken');
        $user = User::find(1);
        $user->subscription('basic','monthly')->create($creditCardToken);
    }
}
